<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme = "bootstrap";

    public  $image;
    public $search;
    public $editUserIndex=null;
    public $sortId=true;

    public function editRow($user_id)
    {
        $this->editUserIndex=$user_id;
        $this->dispatch('editRow',$user_id);
    }

    public function updateRow($user_id)
    {
        $this->dispatch('updateRow', $user_id);
    }

    #[On('user-created')]
//    public function userCreated()
//    {
//
//    }

    #[On('user-updated')]
    public function userUpdated()
    {
        $this->editUserIndex=null;
    }

    #[Layout('admin.master')]
    public function render()
    {
//        sleep(3);
        $users = User::query()->orderBy('id', $this->sortId ? "ASC" : "DESC")
            ->where('name','like','%'.$this->search.'%')
            ->orWhere('email','like','%'.$this->search.'%')
            ->orWhere('mobile','like','%'.$this->search.'%')
            ->paginate(5);
        return view('livewire.admin.user.user-list',compact('users'));
    }
}
