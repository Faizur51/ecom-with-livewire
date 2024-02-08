<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
class WishlistProductComponent extends Component
{

    public function removeFromWishlist($rowId){

        /* foreach(Cart::instance('wishlist')->content() as $witem){
             if($witem->id==$product_id){
                 Cart::instance('wishlist')->remove($witem->rowId);
                 $this->emitTo('wishlist-icon-component','refreshComponent');
             }
         }*/

        Cart::instance('wishlist')->remove($rowId);
        $this->emitTo('wishlist-icon-component','refreshComponent');
    }

    public function moveProductFromWishlistToCart($rowId){
        $item=Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-icon-component','refreshComponent');
        $this->emitTo('cart-icon-component','refreshComponent');
        noty()->closeWith(['click', 'button'])->addInfo('Item Added into the Cart');
    }



    public function render()
    {
        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        return view('livewire.user.wishlist-product-component');
    }















}
