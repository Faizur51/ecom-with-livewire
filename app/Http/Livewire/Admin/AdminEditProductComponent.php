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
class AdminEditProductComponent extends Component
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
    public $product_id;


    public $new_image;
    public $new_images;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function mount($product_slug)
    {
        $product=Product::where('slug',$product_slug)->first();
        $this->name=$product->name;
        $this->slug=$product->slug;
        $this->short_description=$product->short_description;
        $this->long_description=$product->long_description;
        $this->sku_code=$product->sku_code;
        $this->stock_status=$product->stock_status;
        $this->regular_price=$product->regular_price;
        $this->sale_price=$product->sale_price;
        $this->quantity=$product->quantity;
        $this->color=json_decode($product->color);
        $this->size=json_decode($product->size);
        $this->image=$product->image;
        //$this->images=explode(',',$product->images);
        $this->images=json_decode($product->images);
        $this->category_id=$product->category_id;
        $this->subcategory_id=$product->subcategory_id;
        $this->brand_id=$product->brand_id;
        $this->status=$product->status;
        $this->product_id=$product->id;
    }


    public function editProduct(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'sku_code' => 'required',
            'stock_status' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'color' => 'required',
            'size' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'status' => 'required',
        ]);


        if($this->new_image){
            $this->validate([
                'image' => 'required',
            ]);
        }

        $product =Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->long_description = $this->long_description;
        $product->sku_code = $this->sku_code;
        $product->stock_status = $this->stock_status;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->quantity = $this->quantity;
        $product->color =json_encode($this->color);
        $product->size = json_encode($this->size);
        $product->category_id = $this->category_id;
        $product->subcategory_id = $this->subcategory_id;
        $product->brand_id = $this->brand_id;
        $product->status = $this->status;
//single image
        if($this->new_image){
            unlink('frontend/assets/images/product/'.$product->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->new_image->extension();
            //$this->newimage->storeAs('product', $imageName);
            $img = Image::make($this->new_image);
            $img->resize(1100,1100);
            $img->save('frontend/assets/images/product/'.$imageName);
            $product->image = $imageName;
        }

//Galary image
        if($this->new_images){
            if($product->images){
                $images=json_decode($product->images);
                foreach ($images as $image){
                    if($image){
                        unlink('frontend/assets/images/product/'.$image);
                    }
                }
            }
            $imagesname=[];
            foreach ($this->new_images as $key=>$image){
                $imgName = Carbon::now()->timestamp . $key.'.'. $image->extension();
                $img = Image::make($image);
                $img->resize(600,600);
                $img->save('frontend/assets/images/product/'.$imgName);
                array_push($imagesname,$imgName);
            }
            $product->images=json_encode($imagesname);

        }
        $product->save();

        noty()->closeWith(['click', 'button'])->addInfo('Product has been updated successfully');

        return redirect()->route('admin.manage.product');
    }



    public function render()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $scategories=Subcategory::where('category_id',$this->category_id)->get();
        $brands = Brand::orderBy('created_at', 'desc')->get();
        $colors = Color::orderBy('created_at', 'desc')->get();
        $sizes = Size::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories,'scategories'=>$scategories,'brands'=>$brands,'colors'=>$colors,'sizes'=>$sizes]);
    }
}
