<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Computed;
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
//    public $users;
    public $user_id=1;
    protected $paginationTheme = "bootstrap";

//    public function mount()
//    {
//        $this->users = User::query()->orderBy('id', $this->sortId ? "ASC" : "DESC")
//            ->where('name','like','%'.$this->search.'%')
//            ->orWhere('email','like','%'.$this->search.'%')
//            ->orWhere('mobile','like','%'.$this->search.'%')
//            ->paginate(5);
//    }

    //  livewire Hooks
//    public function mount()
//    {
//        dump('mount');
//    }

//    public function boot()
//    {
//        dump('boot');
//    }

//    public function hydrate()
//    {
//        dump('hydrate');
//    }

//    public function dehydrate()
//    {
//        dump('dehydrate');
//    }

    public function editRow($user_id)
    {
        $this->editUserIndex=$user_id;
        $this->dispatch('editRow',$user_id);
    }

    public function updateRow($user_id)
    {
        $this->dispatch('updateRow', $user_id);
    }

    #[Js]
    public function pollRefresh()
    {
        return <<<'JS'

         console.log('poll')

        JS;
    }

    #[On('user-created')]
    public function userCreated()
    {
        unset($this->users);
    }

    #[On('user-updated')]
    public function userUpdated()
    {
        $this->editUserIndex=null;
    }

    public function placeholder()
    {
        return view('livewire.admin.lazy');
    }

    #[Computed(persist: true,seconds: 3600)]
    public function user()
    {
        User::query()->find($this->user_id);
    }

    #[Computed()]
    public function users()
    {
        return User::query()->orderBy('id', $this->sortId ? "ASC" : "DESC")
            ->where('name','like','%'.$this->search.'%')
            ->orWhere('email','like','%'.$this->search.'%')
            ->orWhere('mobile','like','%'.$this->search.'%')
            ->paginate(5);
    }

//    public function foo()
//    {
//        $users = $this->users;
//    }
    #[On('textSearched')]
    public function textSearched($search)
    {
       $this->search = $search;
    }

    public function render()
    {
       // sleep(3);
//        $users =
        return view('livewire.admin.user.users');
    }
}
