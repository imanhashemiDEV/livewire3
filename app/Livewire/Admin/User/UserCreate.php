<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserCreate extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $name;
    #[Rule('required|unique:users,email')]
    public $email;
    #[Rule('required')]
    public $mobile;
    #[Rule('required|unique:users,mobile')]
    public $password;
    #[Rule('nullable|sometimes|max:2048')]
    public  $image;
    public $editUserIndex=null;

    public function createUser()
    {
        $this->validate();

        if($this->image !== null){
            $name = time().'.'.$this->image->getClientOriginalExtension();
            $this->image->storeAs('photos/users',$name,'public');
        }else{
            $name=null;
        }

        $user = User::query()->create([
            'name'=>$this->name,
            'email'=>$this->email,
            'mobile'=>$this->mobile,
            'password'=>Hash::make($this->password),
            'image'=>$name
        ]);

        $this->reset('name', 'email','mobile','image','password');
        session()->flash('message','کاربر جدید ذخیره شد');
    }


    public function render()
    {
        return view('livewire.admin.user.user-create');
    }
}
