<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
class HomeComponent extends Component
{

    public $count=12;

    public function loadMore(){
        $this->count+=12;
    }


    public function store($product_id,$product_name,$product_price){
        $cart=Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        $this->emitTo('cart-icon-component','refreshComponent');
        noty()->closeWith(['click', 'button'])->addInfo('Item added into the cart.');
    }





    public function render()
    {
        $homeSliders=HomeSlider::orderBy('id','desc')->where('status',1)->get();
        $products=Product::orderBy('id','desc')->where('status',1)->where('stock_status',1)->take($this->count)->get();
        $categories=Category::orderBy('id','desc')->where('status',1)->get();
        $nproducts=Product::orderBy('id','desc')->where('status',1)->latest()->take(8)->get();
        $brands=Brand::orderBy('id','desc')->where('status',1)->get();

        if(Auth::check()){
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }

        return view('livewire.home-component',['homeSliders'=>$homeSliders,'products'=>$products,'categories'=>$categories,'nproducts'=>$nproducts,'brands'=>$brands]);
    }
}
