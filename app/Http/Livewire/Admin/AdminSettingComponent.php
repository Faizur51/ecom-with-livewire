<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
class AdminSettingComponent extends Component
{
    use WithFileUploads;
    public $phone;
    public $mobile;
    public $email;
    public $address;
    public $facebook;
    public $youtube;
    public $twitter;
    public $instagram;
    public $image;
   public $old_image;

    public function mount(){
        $setting=Setting::find(1);
        if($setting){
            $this->phone=$setting->phone;
            $this->mobile=$setting->mobile;
            $this->email=$setting->email;
            $this->address=$setting->address;
            $this->facebook=$setting->facebook;
            $this->youtube=$setting->youtube;
            $this->twitter=$setting->twitter;
            $this->instagram=$setting->instagram;
            if($this->image){
                $this->image=$setting->image;
            }else{
                $this->old_image=$setting->image;
            }
        }
    }

public function updated($fields){
        $this->validateOnly($fields,[
            'phone' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
        ]);
}

    public function addSetting()
    {
        $this->validate([
            'phone' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',


        ]);

        $setting=Setting::find(1);
        if(!$setting){
            $setting=new Setting();
        }

        $setting->phone = $this->phone;
        $setting->mobile = $this->mobile;
        $setting->email = $this->email;
        $setting->address = $this->address;
        $setting->facebook = $this->facebook;
        $setting->youtube = $this->youtube;
        $setting->twitter = $this->twitter;
        $setting->instagram = $this->instagram;
        if ($this->image) {
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $img = Image::make($this->image);
            $img->resize(738, 177);
            $img->save('frontend/assets/images/setting/'.$imageName);
            $setting->image = $imageName;
        }

        $setting->save();
        noty()->closeWith(['click', 'button'])->addInfo('Setting has been added');
        $this->reset();
        $this->emit('addSetting');

        session()->flash('message', 'Setting has been added successfully');

    }

    public function render()
    {
        $settings=Setting::get();
        return view('livewire.admin.admin-setting-component',['settings'=>$settings]);
    }
}
