<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CheckboxUsers extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $pageNumber;
    public $checkbox=[];
    public $multicheckbox=[];
    public $checkText;

    public $selectedUsers=[];

    public function updatedPage($page)
    {
       $this->selectedUsers =[];
    }

    public function CheckAll()
    {
        $this->selectedUsers = User::query()->orderByDesc('id')
            ->offset(($this->pageNumber -1 )*5)->limit(5)->pluck('id');
    }

    #[Computed()]
    public function users()
    {
        return User::query()->orderByDesc('id')->paginate(5);
    }

    #[Layout('admin.master')]
    public function render()
    {
        $this->pageNumber = $this->users()->currentPage();
       //$this->checkText = $this->checkbox ? 'checked' : 'notchecked';
        return view('livewire.admin.user.checkbox-users');
    }
}
