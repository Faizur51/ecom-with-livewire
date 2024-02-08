<?php

namespace App\Http\Livewire\User;

use App\Models\Review;
use Livewire\Component;

class UserReviewComponent extends Component
{
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $reviews=Review::where('user_id',auth()->user()->id)->orderBy('id','desc')->paginate(12);
        return view('livewire.user.user-review-component',['reviews'=>$reviews]);
    }
}
