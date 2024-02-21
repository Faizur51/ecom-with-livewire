<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public function render()
    {
        $categories=Category::orderBy('name','asc')->where('status',1)->get();
        return view('livewire.category-component',['categories'=>$categories]);
    }
}
