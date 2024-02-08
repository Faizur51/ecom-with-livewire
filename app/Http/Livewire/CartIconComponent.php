<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
class CartIconComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];


    public function checkout(){
        if(Auth::check()){
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login');
        }
    }



    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-component','refreshComponent');
        noty()->closeWith(['click', 'button'])->addInfo('Cart item deleted success');
    }

    public function render()
    {
        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.cart-icon-component');
    }
}
