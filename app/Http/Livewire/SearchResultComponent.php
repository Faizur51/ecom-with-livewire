<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class SearchResultComponent extends Component
{
    use WithPagination;

    public $pageSize=12;
    public $orderBy='Default Shorting';
    protected $paginationTheme = 'bootstrap';

    public $min_value=100;
    public $max_value=1000;

    public $checkedColor=[];
    public $checkedSize=[];
    public $checkedBrand=[];

    public $q;
    public $search_term;

    public function mount(){
        $this->fill(request()->only('q'));
        $this->search_term='%'.$this->q.'%';
    }

    protected $queryString = [
        'checkedColor'=>['except' => '', 'as' => 'color'],
        'checkedSize'=>['except' => '', 'as' => 'size'],
        'checkedBrand'=>['except' => '', 'as' => 'brand'],
    ];

    public function store($product_id,$product_name,$product_price){
        $cart=Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        $this->emitTo('cart-icon-component','refreshComponent');
        noty()->closeWith(['click', 'button'])->addInfo('Item added into the cart.');
    }

    public function changePageSize($size){
        $this->pageSize=$size;
    }

    public function orderBy($order){
        $this->orderBy=$order;
    }

    public function render()
    {
        if($this->checkedColor){
            $products=Product::when($this->checkedColor,function ($q){
                $q->whereIn('color',$this->checkedColor);
            })->paginate($this->pageSize);
        } else if ($this->checkedSize){
            $products=Product::when($this->checkedSize,function ($q){
                $q->whereIn('size',$this->checkedSize);
            })->paginate($this->pageSize);
        }else if($this->checkedBrand){
            $products=Product::when($this->checkedBrand,function ($q){
                $q->whereIn('brand_id',$this->checkedBrand);
            })->paginate($this->pageSize);
        }
        else{
            if($this->orderBy=='Low to High'){
                $products=Product::where('name','like',$this->search_term)->whereBetween('sale_price',[$this->min_value,$this->max_value])->orderBy('sale_price','asc')->paginate($this->pageSize);
            }else if($this->orderBy=='High to Low'){
                $products=Product::where('name','like',$this->search_term)->whereBetween('sale_price',[$this->min_value,$this->max_value])->orderBy('sale_price','desc')->paginate($this->pageSize);
            }else if($this->orderBy=='New Product'){
                $products=Product::where('name','like',$this->search_term)->whereBetween('sale_price',[$this->min_value,$this->max_value])->orderBy('created_at','desc')->paginate($this->pageSize);
            }else{
                $products=Product::where('name','like',$this->search_term)->whereBetween('sale_price',[$this->min_value,$this->max_value])->paginate($this->pageSize);
            }
        }

        $nproducts=Product::latest()->take(3)->get();
        $categories=Category::orderBy('name','asc')->get();
        $colors=Color::orderBy('id','desc')->get();
        $sizes=Size::orderBy('id','desc')->get();
        $brands=Brand::orderBy('id','desc')->get();
        return view('livewire.search-result-component',['products'=>$products,'nproducts'=>$nproducts,'categories'=>$categories,'colors'=>$colors,'sizes'=>$sizes,'brands'=>$brands]);
    }

}
