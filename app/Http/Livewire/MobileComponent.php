<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class MobileComponent extends Component
{
    public function render()
    {
        $categories=Category::orderBy('name','asc')->get();
        return view('livewire.mobile-component',['categories'=>$categories]);
    }
}
