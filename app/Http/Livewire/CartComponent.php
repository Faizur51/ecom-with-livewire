<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CartComponent extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.cart-component');
    }


    public function increaseQuantity($rowId){
       $product=Cart::instance('cart')->get($rowId);
       $qty=$product->qty+1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component','refreshComponent');
    }

    public function decreaseQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        if($product->qty>1){
            $qty=$product->qty-1;
            Cart::instance('cart')->update($rowId, $qty);
            $this->emitTo('cart-icon-component','refreshComponent');
        }
    }

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-icon-component','refreshComponent');
        noty()->closeWith(['click', 'button'])->addInfo('Cart item deleted success');
    }

    public  function clearAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-icon-component','refreshComponent');
        noty()->closeWith(['click', 'button'])->addInfo('All Cart item deleted success');
    }

}
