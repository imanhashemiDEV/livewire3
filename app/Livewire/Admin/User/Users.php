<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination,WithFileUploads;

    public $sortId=true;
    public $editUserIndex=null;
    public $search="";
    protected $paginationTheme = "bootstrap";

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

    public function render()
    {
        $users = User::query()->orderBy('id', $this->sortId ? "ASC" : "DESC")
            ->where('name','like','%'.$this->search.'%')
            ->orWhere('email','like','%'.$this->search.'%')
            ->orWhere('mobile','like','%'.$this->search.'%')
            ->paginate(5);
        return view('livewire.admin.user.users',compact('users'));
    }
}