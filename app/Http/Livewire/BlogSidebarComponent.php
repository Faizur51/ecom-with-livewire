<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class BlogSidebarComponent extends Component
{
    public function render()
    {
        $categories=Category::orderBy('id','desc')->where('status',1)->get();
        $nproducts=Product::orderBy('id','desc')->where('status',1)->latest()->take(8)->get();
        return view('livewire.blog-sidebar-component',['categories'=>$categories,'nproducts'=>$nproducts]);
    }
}
