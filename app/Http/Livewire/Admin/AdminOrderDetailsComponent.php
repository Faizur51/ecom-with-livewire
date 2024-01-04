<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminOrderDetailsComponent extends Component
{

    public $orderMy_id;

    public function mount($order_id){
        $this->orderMy_id=$order_id;

    }

    public function render()
    {
        $order=Order::find($this->orderMy_id);
        return view('livewire.admin.admin-order-details-component',['order'=>$order]);
    }
}
