<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ThankyouComponent extends Component
{
    public function render()
    {

            $order=Order::where('user_id',Auth::user()->id)->get()->last();
            return view('livewire.thankyou-component',['order'=>$order]);

    }
}
