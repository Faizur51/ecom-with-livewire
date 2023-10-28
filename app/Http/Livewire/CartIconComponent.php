<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CartIconComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-component','refreshComponent');
        noty()->closeWith(['click', 'button'])->addInfo('Cart item deleted success');
    }

    public function render()
    {
        return view('livewire.cart-icon-component');
    }
}
