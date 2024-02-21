<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
class ProductDetailsComponent extends Component
{



    public $slug;

    public $qty;

    public $colorme;
    public $sizeme;



    public function mount($slug){
        $this->slug=$slug;
        $this->qty=1;
    }

    public function store($product_id,$product_name,$product_price){
        $cart=Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price,['color'=>$this->colorme,'size'=>$this->sizeme])->associate('\App\Models\Product');
        $this->emitTo('cart-icon-component','refreshComponent');
        noty()->closeWith(['click', 'button'])->addInfo('Item added into the cart.');
    }



    public function increaseQuantity(){
        $this->qty++;
    }

    public function decreaseQuantity(){
       if($this->qty>1){
           $this->qty--;
       }
    }



public function quickView($id){
        dd($id);
}

public function showColor($value){
   $this->colorme=$value;
}



    public function showSize($value){
        $this->sizeme=$value;
    }



    public function render()
    {

        $categories=Category::orderBy('name','asc')->get();
        $product=Product::where('slug',$this->slug)->first();

        $images = json_decode($product->images);
        array_splice($images, 0, 0, $product->image);


        $rproducts=Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
        $nproducts=Product::latest()->take(3)->get();

        return view('livewire.product-details-component',['categories'=>$categories,'product'=>$product,'rproducts'=>$rproducts,'nproducts'=>$nproducts,'images'=>$images]);
    }
}
