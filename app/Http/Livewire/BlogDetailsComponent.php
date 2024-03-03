<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class BlogDetailsComponent extends Component
{

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }


    public function render()
    {
        $categories=Category::orderBy('id','desc')->where('status',1)->get();
        $product = Product::where('slug', $this->slug)->first();
        $nproducts=Product::orderBy('id','desc')->where('status',1)->latest()->take(8)->get();

        $rproducts = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(6)->get();

        return view('livewire.blog-details-component',['categories' => $categories, 'product' => $product,'nproducts'=>$nproducts,'rproducts'=>$rproducts]);
    }
}
