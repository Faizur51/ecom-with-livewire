<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
class ProductOfferComponent extends Component
{

    public $count=12;
    protected $listeners=['load-more'=>'loadMore'];

    public function loadMore(){
        //$this->count+=12;
        $this->count=$this->count+4;
    }


    public function store($product_id,$product_name,$product_price){
        $cart=Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        $this->emitTo('cart-icon-component','refreshComponent');
        noty()->closeWith(['click', 'button'])->addInfo('Item added into the cart.');
    }



    public function render()
    {

        //$products=Product::orderBy('id','desc')->where('status',1)->where('stock_status',1)->get();
        //$products=Product::orderBy('id','desc')->take($this->count)->get();
        $products=Product::orderBy('id','desc')->paginate($this->count);

        if(Auth::check()){
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }

        return view('livewire.product-offer-component',['products'=>$products]);
    }
}
