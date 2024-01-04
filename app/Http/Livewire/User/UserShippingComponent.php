<?php

namespace App\Http\Livewire\User;

use App\Models\District;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserShippingComponent extends Component
{

    use WithPagination;

    public $address_type;
    public $name;
    public $phone;
    public $email;
    public $city;
    public $post_code;
    public $address;
    public $ids;
    public $user_id;

    public function updated($fields){

        $this->validateOnly($fields,[
            'address_type'=>'required',
            'name'=>'required|string|max:20',
            'phone'=>'required|min:11|max:11',
            'email'=>'required',
            'city'=>'required',
            'post_code'=>'required',
            'address'=>'required',
        ]);
    }

    public function addShipinfo(){
        $this->validate([
            'address_type'=>'required',
            'name'=>'required|string|max:20',
            'phone'=>'required|min:11|max:11',
            'email'=>'required',
            'city'=>'required',
            'post_code'=>'required',
            'address'=>'required',
        ]);

        $shipping=new Shipping();
        $shipping->user_id=Auth::user()->id;
        $shipping->address_type=$this->address_type;
        $shipping->name=$this->name;
        $shipping->phone=$this->phone;
        $shipping->email=$this->email;
        $shipping->city=$this->city;
        $shipping->post_code=$this->post_code;
        $shipping->address=$this->address;
        $shipping->save();
        noty()->closeWith(['click', 'button'])->addInfo('Address has been added successfully');
        $this->reset();
        $this->emit('addShippingAddress');


    }

    public function editShippinfo($id){
        $shipping=Shipping::where('id',$id)->first();
        $this->user_id =$shipping->user_id ;
        $this->address_type =$shipping->address_type ;
        $this->name =$shipping->name ;
        $this->phone=$shipping->phone;
        $this->email=$shipping->email;
        $this->city=$shipping->city;
        $this->post_code=$shipping->post_code;
        $this->address=$shipping->address;
        $this->ids=$shipping->id;
    }

    public function UpdateShipinfo(){

        $this->validate([
            'address_type'=>'required',
            'name'=>'required|string|max:20',
            'phone'=>'required|min:11|max:11',
            'city'=>'required',
            'address'=>'required',
        ]);

        $shipping=Shipping::find($this->ids);
        $shipping->user_id=Auth::user()->id;
        $shipping->address_type=$this->address_type;
        $shipping->name=$this->name;
        $shipping->phone=$this->phone;
        $shipping->email=$this->email;
        $shipping->city=$this->city;
        $shipping->post_code=$this->post_code;
        $shipping->address=$this->address;
        $shipping->save();

        noty()->closeWith(['click', 'button'])->addInfo('Shipping Address has been updated');
        $this->reset();
        $this->emit('editShippingAddress');
    }

    public function render()
    {
        $shippings=Shipping::orderBy('id','desc')->where('user_id',Auth::user()->id)->paginate(10);
        $districts=District::orderBy('name','asc')->get();
        return view('livewire.user.user-shipping-component',['shippings'=>$shippings,'districts'=>$districts]);
    }
}
