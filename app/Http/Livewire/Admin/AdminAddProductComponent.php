<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $long_description;

    public $sku_code;
    public $stock_status;
    public $regular_price;
    public $sale_price;
    public $quantity;


    public $color=[];
    public $size=[];
    public $image;
    public $images=[];
    public $category_id;
    public $subcategory_id;
    public $brand_id;
    public $status;


    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }


    public function updated($fields){

        $this->validateOnly($fields,[
            'name'=>'required|unique:products,name,'.$this->id,
            'slug'=>'required',
            'short_description'=>'required|max:250',
            'long_description'=>'required|max:10000',
            'regular_price'=>'required|numeric',
            'sale_price'=>'required|numeric',
            'sku_code'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',

        ]);
    }

    public function addProduct(){

        $this->validate([
            'name'=>'required|unique:products,name,'.$this->id,
            'slug'=>'required',
            'short_description'=>'required|max:250',
            'long_description'=>'required|max:10000',
            'regular_price'=>'required|numeric|between:100,1000',
            'sale_price'=>'required|numeric|between:100,1000',
            'sku_code'=>'required|min:1|max:10',
            'stock_status'=>'required',
            'quantity'=>'required|numeric|between:1,500',
            'image'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
        ]);


        $product=new Product();
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->short_description;
        $product->long_description=$this->long_description;
        $product->regular_price=$this->regular_price;
        $product->sale_price=$this->sale_price;
        $product->sku_code=$this->sku_code;
        $product->stock_status=$this->stock_status;
        $product->quantity=$this->quantity;
        $product->color=json_encode($this->color);
        $product->size=json_encode($this->size);
        $product->category_id=$this->category_id;
        $product->brand_id=$this->brand_id;

        if($this->subcategory_id){
            $product->subcategory_id=$this->subcategory_id;

        }

        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        //$this->image->storeAs('product',$imageName);
        $img = Image::make($this->image);
        $img->resize(1100,1100);
        $img->save('frontend/assets/images/product/'.$imageName);
        $product->image=$imageName;

        if($this->images){
            $imagesname=[];
            foreach($this->images as $key=>$image){
                $imgName=Carbon::now()->timestamp.$key.'.'.$image->extension();
                //$image->storeAs('product',$imgName);

                $img = Image::make($image);
                $img->resize(1100,1100);
                $img->save('frontend/assets/images/product/'.$imgName);
                //$imagesname=$imagesname.','.$imgName;
                array_push($imagesname,$imgName);
            }
            $product->images=json_encode($imagesname);
        }

        $product->save();

        noty()->closeWith(['click', 'button'])->addInfo('Product has been created successfully');
        $this->reset();
        $this->emit('addProduct');
        $this->dispatchBrowserEvent('resetEvent');

    }

    public function render()
    {
        $sizes=Size::orderBy('id','asc')->get();
        $colors=Color::orderBy('id','asc')->get();
        $categories=Category::orderBy('created_at','desc')->get();
        $scategories=Subcategory::where('category_id',$this->category_id)->get();
        $brands=Brand::orderBy('created_at','desc')->get();

        return view('livewire.admin.admin-add-product-component',['sizes'=>$sizes,'colors'=>$colors,'categories'=>$categories,'scategories'=>$scategories,'brands'=>$brands]);
    }
}
