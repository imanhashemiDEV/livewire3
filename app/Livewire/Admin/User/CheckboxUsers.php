<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class CheckboxUsers extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $checkbox=[];
    public $multicheckbox=[];
    public $checkText;

    public $selectedUsers=[];


    #[Computed()]
    public function users()
    {
        return User::query()->paginate(5);
    }

    #[Layout('admin.master')]
    public function render()
    {
       //$this->checkText = $this->checkbox ? 'checked' : 'notchecked';
        return view('livewire.admin.user.checkbox-users');
    }
}
