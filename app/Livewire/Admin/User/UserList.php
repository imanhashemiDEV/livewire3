<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Js;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UserList extends Component
{

    public $search;

    public function updated($property)
    {
        if ($property === 'search') {
            $this->dispatch('textSearched', $this->search);
        }
    }

    #[Js]
    public function resetSearch()
    {
        return <<<'JS'

         $wire.search='';

        JS;
    }

    #[Layout('admin.master')]
    public function render()
    {
//        sleep(3);
        //$this->js("alert('page reloaded')");

        return view('livewire.admin.user.user-list');
    }
}
