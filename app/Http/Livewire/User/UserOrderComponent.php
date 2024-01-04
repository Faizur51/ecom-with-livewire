<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
class UserOrderComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $orders=Order::orderBy('id','desc')->where('user_id',Auth::user()->id)->paginate(10);
        return view('livewire.user.user-order-component',['orders'=>$orders]);
    }
}
