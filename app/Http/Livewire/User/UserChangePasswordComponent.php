<?php

namespace App\Http\Livewire\User;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserChangePasswordComponent extends Component
{

    public $current_password;
    public $password;
    public $password_confirmation;


    public function updated($fields){

        $this->validateOnly($fields,[
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password'
        ]);
    }
    public function changePassword(){
        $this->validate([
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password'
        ]);

        if(Hash::check($this->current_password,Auth::user()->password)){
            $user=User::findOrFail(Auth::user()->id);
            $user->password=Hash::make($this->password);
            $user->save();
            noty()->closeWith(['click', 'button'])->addInfo('Password has been change successfully');
            $this->reset();
        }else{
            noty()->closeWith(['click', 'button'])->addInfo('Password does not match');
        }


    }








    public function render()
    {
        return view('livewire.user.user-change-password-component');
    }
}
