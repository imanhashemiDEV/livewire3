<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
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

        User::query()->create([
            'name'=>$this->name,
            'email'=>$this->email,
            'mobile'=>$this->mobile,
            'password'=>Hash::make($this->password),
            'image'=>$name
        ]);

        $this->reset('name', 'email','mobile','image','password');
        session()->flash('message','کاربر جدید ذخیره شد');
        $this->dispatch('user-created');
    }

    #[On('editRow')]
    public function editRow($user_id)
    {
        $user = User::query()->find($user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->editUserIndex=$user_id;
    }

    #[On('updateRow')]
    public function updateRow($user_id)
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$user_id,
            'mobile'=>'required|unique:users,mobile,'.$user_id,
        ]);

        $user = User::query()->find($user_id);

        if($this->image !== null){
            $name = time() .'.'.$this->image->getClientOriginalExtension();
            $this->image->storeAs('photos/users',$name,'public');
        }else{
            $name=$user->image;
        }

        $user->update([
            'name'=>$this->name,
            'email'=>$this->email,
            'mobile'=>$this->mobile,
            'password'=> $this->password ? Hash::make($this->password) : $user->password  ,
            'image'=>$name,
        ]);

        $this->reset('name', 'email','mobile','image','password');
        session()->flash('message','کاربر ویرایش شد');
        $this->editUserIndex=null;
        $this->dispatch('user-updated');
    }

    public function render()
    {
        return view('livewire.admin.user.user-create');
    }
}
