<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminCustomerComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public $pageSize=12;
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
        $customers=User::where('name','LIKE',$search)
            ->orWhere('email','LIKE',$search)
            ->orderBy('id','desc')->paginate($this->pageSize);

        return view('livewire.admin.admin-customer-component',['customers'=>$customers]);
    }
}
