<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BlogComponent extends Component
{
    public $count=12;

    public function loadMore(){
        $this->count+=12;
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

        return view('livewire.blog-component',['homeSliders'=>$homeSliders,'products'=>$products,'categories'=>$categories,'nproducts'=>$nproducts,'brands'=>$brands]);

    }
}
