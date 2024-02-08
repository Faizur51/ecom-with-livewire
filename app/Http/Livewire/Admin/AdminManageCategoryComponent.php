<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Image;
class AdminManageCategoryComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';


    public $name;
    public $slug;
    public $image;
    public $status;
    public $ids;
    public $old_image;
    public $new_image;
    public $deleteId='';
    public $deleteSubId='';

    public $search;

    public $pageSize=8;

    public $category_id;


    public $checked=[];
    public function deleteId($id){
        $this->deleteId=$id;
    }

    public function delete(){
        $category=Category::find($this->deleteId);
        unlink('frontend/assets/images/category/'.$category->image);
        $category->delete();
        noty()->closeWith(['click', 'button'])->addInfo('Category has been deleted successfully');

    }

    public function deleteRecords(){
         $category=Category::whereKey($this->checked);
         //unlink('frontend/assets/images/category/'.$category->image);
         $category->delete();
        noty()->closeWith(['click', 'button'])->addInfo('Category has been deleted successfully');
    }


  public function isChecked($categoryId){
        return in_array($categoryId,$this->checked) ? 'bg-light':'';
  }

public function changeActiveStatus($id){

    foreach ($this->checked as $item){
        $category=Category::find($item);
        $category->status=$id;
        $category->save();
        $this->checked=[];

    }

    noty()->closeWith(['click', 'button'])->addInfo('Category status has been updated');

}


    public function changeInActiveStatus($id){

        foreach ($this->checked as $item){
            $category=Category::find($item);
            $category->status=$id;
            $category->save();
            $this->checked=[];

        }

        noty()->closeWith(['click', 'button'])->addInfo('Category status has been updated');

    }




    public function deleteSubcatId($id){
        $this->deleteSubId=$id;
    }
    public function deleteSubcategory(){
        $scategory=Subcategory::find($this->deleteSubId);
        unlink('frontend/assets/images/category/'.$scategory->image);
        $scategory->delete();
        noty()->closeWith(['click', 'button'])->addInfo('SubCategory has been deleted successfully');
    }

    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }
    public function updated($fields){

        $this->validateOnly($fields,[
            'name'=>'required|string|max:20',
            'image'=>'required',
            'status'=>'required',
        ]);
    }

    public function addCategory(){

        $this->validate([
            'name'=>'required|string',
            'image'=>'required',
            'status'=>'required',
        ]);

      if($this->category_id){
          $scategory=new Subcategory();
          $scategory->name=$this->name;
          $scategory->slug=$this->slug;
          $scategory->category_id=$this->category_id;

          $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
          //$this->image->storeAs('slider',$imageName);
          $img = Image::make($this->image);
          $img->resize(440,440);
          $img->save('frontend/assets/images/category/'.$imageName);
          $scategory->image=$imageName;
          $scategory->save();

      }else{
          $category=new Category();
          $category->name=$this->name;
          $category->slug=$this->slug;
          $category->status=$this->status;

          $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
          //$this->image->storeAs('slider',$imageName);
          $img = Image::make($this->image);
          $img->resize(440,440);
          $img->save('frontend/assets/images/category/'.$imageName);
          $category->image=$imageName;
          $category->save();
      }

        noty()->closeWith(['click', 'button'])->addInfo('Category has been added');
        $this->reset();
        $this->emit('addCategory');

    }


    public function edit($id){
        $category=Category::where('id',$id)->first();
        $this->name=$category->name;
        $this->slug=$category->slug;
        $this->old_image=$category->image;
        $this->ids=$category->id;
    }


    public function editCategory(){

        $this->validate([
            'name'=>'required',
        ]);

        $category=Category::find($this->ids);
        $category->name=$this->name;
        $category->slug=$this->slug;

        if($this->new_image){
            if(!$category->image){
                unlink('frontend/assets/images/category/'.$category->image);
            }

            $imageName=Carbon::now()->timestamp.'.'.$this->new_image->extension();
            //$this->newimage->storeAs('slider',$imageName);

            $img = Image::make($this->new_image);
            $img->resize(440,440);
            $img->save('frontend/assets/images/category/'.$imageName);
            $category->image=$imageName;
        }

        $category->save();

        noty()->closeWith(['click', 'button'])->addInfo('Category has been updated');
        $this->reset();
        $this->emit('editCategory');


    }

    public function editSubcategory($id){
        $scategory=Subcategory::where('id',$id)->first();
        $this->name=$scategory->name;
        $this->slug=$scategory->slug;
        $this->old_image=$scategory->image;
        $this->category_id=$scategory->category_id;
        $this->ids=$scategory->id;
    }

    public function updateSubcategory(){

        $this->validate([
            'name'=>'required',
        ]);

        $scategory=Subcategory::find($this->ids);
        $scategory->name=$this->name;
        $scategory->slug=$this->slug;
        $scategory->category_id=$this->category_id;

        if($this->new_image){
            unlink('frontend/assets/images/category/'.$scategory->image);
            $imageName=Carbon::now()->timestamp.'.'.$this->new_image->extension();
            $img = Image::make($this->new_image);
            $img->resize(440,440);
            $img->save('frontend/assets/images/category/'.$imageName);
            $scategory->image=$imageName;
        }

        $scategory->save();

        noty()->closeWith(['click', 'button'])->addInfo('SubCategory has been updated');
        $this->reset();
        $this->emit('editSubcategory');

    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function changePageSize($size){
        $this->pageSize=$size;
    }


    public function render()
    {
        $search='%'. $this->search .'%';
        $categories=Category::where('name','LIKE',$search)
            ->orderBy('id','asc')->paginate($this->pageSize);
        $category=Category::orderBy('created_at','desc')->get();

        return view('livewire.admin.admin-manage-category-component',['categories'=>$categories,'category'=>$category]);
    }
}
