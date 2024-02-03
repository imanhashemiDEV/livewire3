<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme = "bootstrap";

    public $image;
    public $search;
    public $editUserIndex=null;

    public function editRow($user_id)
    {
        $this->editUserIndex=$user_id;

        $user = User::query()->find($user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
    }

    public function updateRow($user_id)
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$user_id,
            'mobile'=>'required|unique:users,mobile,'.$user_id,
        ]);

        $user = User::query()->find($user_id);

        if($this->image != null){
            $name = time() .'.'.$this->image->getClientOriginalExtension();
            $this->image->storeAs('photos',$name,'public');
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

        $this->editUserIndex=null;

        session()->flash('message','کاربر ویرایش شد');

    }



    #[Layout('admin.master')]
    public function render()
    {
        sleep(3);
        $users = User::query()
            ->where('name','like','%'.$this->search.'%')
            ->orWhere('email','like','%'.$this->search.'%')
            ->orWhere('mobile','like','%'.$this->search.'%')
            ->paginate(5);
        return view('livewire.admin.user.user-list',compact('users'));
    }
}
