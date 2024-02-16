<?php

namespace App\Http\Livewire\Admin;

use App\Exports\OrdersExport;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class AdminOrderComponent extends Component
{
    use WithPagination;
    public $pageSize = 10;
    public $search;


    public $orderId;
    public $orderStatus;
    protected $paginationTheme = 'bootstrap';

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }



    public function updateOrderIdStatus($id,$status){
        $this->orderId=$id;
        $this->orderStatus=$status;
    }


    public function updateOrderStatus(){
        $order=Order::find($this->orderId);
        $order->status=$this->orderStatus;

        if($order->status=='cancel'){
            $order->cancel_date=DB::raw('CURRENT_DATE');
        }
        else if($order->status=='processed'){
            $order->processed_date=DB::raw('CURRENT_DATE');
        }
        else if($order->status=='shipping'){
            $order->shipping_date=DB::raw('CURRENT_DATE');
        }
        else if($order->status=='delivery'){
            $order->delivery_date=DB::raw('CURRENT_DATE');
        }
        $order->save();

        noty()->progressBar(false)->layout('topRight')->addInfo('Order status has been updated successfully.');
    }



public function excelDownload(){
    return Excel::download(new OrdersExport(), 'orders.xlsx');

}

    public function render()
    {
        $search = '%' . $this->search . '%';
        $orders=Order::orderBy('id','desc')
                ->where('name', 'LIKE', $search)
                ->orWhere('email', 'LIKE', $search)
                ->orWhere('phone', 'LIKE', $search)
                ->orWhere('city', 'LIKE', $search)
                ->orWhere('address', 'LIKE', $search)
                ->orWhere('status', 'LIKE', $search)
                ->paginate($this->pageSize);
        return view('livewire.admin.admin-order-component',['orders'=>$orders]);
    }
}
