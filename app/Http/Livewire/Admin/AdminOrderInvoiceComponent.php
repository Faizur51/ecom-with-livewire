<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class AdminOrderInvoiceComponent extends Component
{

    public $orderMy_id;

    public function mount($order_id){
        $this->orderMy_id=$order_id;

    }



    public function render()
    {
        $order=Order::find($this->orderMy_id);
        return view('livewire.admin.admin-order-invoice-component',['order'=>$order]);
    }
}
