<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Image;
class AdminManageSliderComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';


    public $top_title;
    public $slug;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $image;

    public $status;
    public $ids;
    public $old_image;
    public $new_image;
    public $deleteId='';

    public $search;

    public $pageSize=10;


    public function deleteId($id){
        $this->deleteId=$id;
    }

 /*   public function delete(){
        $slider=HomeSlider::find($this->deleteId);
        unlink('frontend/assets/images/slider/'.$slider->image);
        $slider->delete();
        noty()->closeWith(['click', 'button'])->addInfo('Slider has been deleted successfully');
    }*/

    public function deleteTemporary(){
        $slider=HomeSlider::find($this->deleteId);
        $slider->delete();
        noty()->closeWith(['click', 'button'])->addInfo('Slider has been deleted successfully');
    }

    public function deletePermanent(){
        $slider=HomeSlider::withTrashed()->find($this->deleteId);
        unlink('frontend/assets/images/slider/'.$slider->image);
        $slider->forceDelete();
        noty()->closeWith(['click', 'button'])->addInfo('Slider permanently deleted successfully');
    }

    public function restore(){
        HomeSlider::withTrashed()->find($this->deleteId)->restore();
        noty()->closeWith(['click', 'button'])->addInfo('Slider restored successfully');
    }

    public function generateSlug(){
        $this->slug=Str::slug($this->top_title);
    }



    public function updated($fields){

        $this->validateOnly($fields,[
            'top_title'=>'required|string|max:20',
            'title'=>'required|string|max:20',
            'sub_title'=>'required|string|max:20',
            'offer'=>'required',
            'link'=>'required|string',
            'image'=>'required',
            'status'=>'required',
        ]);
    }

    public function addSlider(){

        $this->validate([
            'top_title'=>'required|string',
            'title'=>'required|string',
            'sub_title'=>'required|string',
            'offer'=>'required',
            'link'=>'required|string',
            'image'=>'required',
            'status'=>'required',
        ]);


        $slider=new HomeSlider();
        $slider->top_title=$this->top_title;
        $slider->slug=$this->slug;
        $slider->title=$this->title;
        $slider->sub_title=$this->sub_title;
        $slider->offer=$this->offer;
        $slider->link=$this->link;
        $slider->status=$this->status;

        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        //$this->image->storeAs('slider',$imageName);
        $img = Image::make($this->image);
        $img->resize(1200,735);
        $img->save('frontend/assets/images/slider/'.$imageName);
        $slider->image=$imageName;
        $slider->save();
        noty()->closeWith(['click', 'button'])->addInfo('Slider has been added');
        $this->reset();
        $this->emit('addSliderQuick');

    }


    public function edit($id){
        $slider=HomeSlider::where('id',$id)->first();
        $this->top_title=$slider->top_title;
        $this->slug=$slider->slug;
        $this->title=$slider->title;
        $this->sub_title=$slider->sub_title;
        $this->offer=$slider->offer;
        $this->link=$slider->link;
        $this->old_image=$slider->image;
        $this->status=$slider->status;
        $this->ids=$slider->id;
    }


    public function editSlider(){

        $this->validate([
            'top_title'=>'required',
            'title'=>'required',
            'sub_title'=>'required',
            'offer'=>'required',
            'link'=>'required',
            'status'=>'required',
        ]);

        $slider=HomeSlider::find($this->ids);
        $slider->top_title=$this->top_title;
        $slider->slug=$this->slug;
        $slider->title=$this->title;
        $slider->sub_title=$this->sub_title;
        $slider->offer=$this->offer;
        $slider->link=$this->link;
        $slider->status=$this->status;

        if($this->new_image){
            unlink('frontend/assets/images/slider/'.$slider->image);
            $imageName=Carbon::now()->timestamp.'.'.$this->new_image->extension();
            //$this->newimage->storeAs('slider',$imageName);

            $img = Image::make($this->new_image);
            $img->resize(1200,735);
            $img->save('frontend/assets/images/slider/'.$imageName);
            $slider->image=$imageName;
        }

        $slider->save();

        noty()->closeWith(['click', 'button'])->addInfo('Slider has been updated');
        $this->reset();
        $this->emit('editSlider');


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
        $sliders=HomeSlider::where('top_title','LIKE',$search)
            ->orWhere('title','LIKE',$search)
            ->orWhere('sub_title','LIKE',$search)
            ->orderBy('created_at','desc')->withTrashed()->paginate($this->pageSize);
        return view('livewire.admin.admin-manage-slider-component',['sliders'=>$sliders]);
    }


}
