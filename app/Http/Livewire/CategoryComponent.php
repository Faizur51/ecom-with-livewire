<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public function render()
    {
        $categories=Category::orderBy('id','desc')->get();
        return view('livewire.category-component',['categories'=>$categories]);
    }
}
