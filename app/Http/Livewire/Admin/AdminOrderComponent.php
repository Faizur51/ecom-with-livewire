<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
class AdminOrderComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $search;

    protected $paginationTheme = 'bootstrap';

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }




    public function updateOrderStatus($order_id,$status){
        $order=Order::find($order_id);
        $order->status=$status;

        if($status=='cancel'){
            $order->cancel_date=DB::raw('CURRENT_DATE');
        }
        else if($status=='processed'){
            $order->processed_date=DB::raw('CURRENT_DATE');
        }
        else if($status=='shipping'){
            $order->shipping_date=DB::raw('CURRENT_DATE');
        }
        else if($status=='delivery'){
            $order->delivery_date=DB::raw('CURRENT_DATE');
        }
        $order->save();

        noty()->progressBar(false)->layout('topRight')->addInfo('Order status has been updated successfully.');
    }







    public function render()
    {
        $search = '%' . $this->search . '%';
        $orders=Order::orderBy('id','desc')
                ->where('processed_date', 'LIKE', $search)
                ->orWhere('status', 'LIKE', $search)
                ->paginate($this->pageSize);
        return view('livewire.admin.admin-order-component',['orders'=>$orders]);
    }
}
