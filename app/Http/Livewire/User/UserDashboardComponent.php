<?php

namespace App\Http\Livewire\User;


use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Image;
class UserDashboardComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name;
    public $phone;
    public $email;
    public $gender;
    public $birth_date;
    public $occupation;
    public $image;
    public $old_image;

    public function editProfile(){
        $user=User::find(Auth::user()->id);
        $this->name =$user->name ;
        $this->email =$user->email ;
        $this->phone =$user->profile->phone ;
        $this->gender =$user->profile->gender ;
        $this->birth_date =$user->profile->birth_date ;
        $this->occupation =$user->profile->occupation ;
    }

    public function UpdateProfile(){

        $user=User::find(Auth::user()->id);
        $user->name=$this->name;
        $user->save();

       $user->profile->phone=$this->phone;
       $user->profile->gender=$this->gender;
       $user->profile->birth_date=$this->birth_date;
       $user->profile->occupation=$this->occupation;

        $user->profile->save();
        noty()->closeWith(['click', 'button'])->addInfo('Profile has been updated');
        $this->reset();
        $this->emit('editProfileinfo');
    }

    public function editPicture(){
        $user=User::find(Auth::user()->id);
        $this->old_image=$user->profile->image;
    }


   public function UpdatePicture(){
        $user=User::find(Auth::user()->id);
       $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
       $img = Image::make($this->image);
       $img->resize(200,200);
       $img->save('frontend/assets/images/profile/'.$imageName);
       $user->profile->image=$imageName;
       $user->profile->save();
       noty()->closeWith(['click', 'button'])->addInfo('Picture has been Updated');
       $this->reset();
       $this->emit('updatePicture');
   }

    public function render()
    {
        $userProfile=Profile::where('user_id',Auth::user()->id)->first();
        if(!$userProfile){
           $profile=new Profile();
           $profile->user_id=Auth::user()->id;
           $profile->save();
        }
        $user=User::find(Auth::user()->id);
        return view('livewire.user.user-dashboard-component',['user'=>$user]);
    }
}
