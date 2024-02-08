<?php

namespace App\Http\Livewire\Admin;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;
class AdminReviewComponent extends Component
{
    use WithPagination;


    public $status;
    public $ids;

    protected $paginationTheme = 'bootstrap';


    public function editReviewStatus($id){
        $review=Review::where('id',$id)->first();
        $this->status=$review->status;
        $this->ids=$review->id;

    }

    public function editReview(){
        $this->validate([
            'status'=>'required',
        ]);

        $review=Review::find($this->ids);
        $review->status=$this->status;
        $review->save();
        noty()->closeWith(['click', 'button'])->addInfo('Review Status has been updated');
    }



    public function render()
    {
        $reviews=Review::orderBy('id','desc')->paginate(10);
        return view('livewire.admin.admin-review-component',['reviews'=>$reviews]);
    }
}
