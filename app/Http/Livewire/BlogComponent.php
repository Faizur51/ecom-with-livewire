<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class BlogComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pageSize=10;

    public function render()
    {

        $homeSliders=HomeSlider::orderBy('id','desc')->where('status',1)->get();
        $products=Product::orderBy('id','desc')->where('status',1)->where('stock_status',1)->paginate($this->pageSize);
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
