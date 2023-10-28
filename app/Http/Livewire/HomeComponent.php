<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $homeSliders=HomeSlider::orderBy('id','desc')->where('status',1)->get();
        $products=Product::orderBy('id','desc')->where('status',1)->where('stock_status','instock')->get();
        $categories=Category::orderBy('id','desc')->where('status',1)->get();
        $brands=Brand::orderBy('id','desc')->where('status',1)->get();
        return view('livewire.home-component',['homeSliders'=>$homeSliders,'products'=>$products,'categories'=>$categories,'brands'=>$brands]);
    }
}
