<?php

namespace App\Livewire\Admin\Alpinejs;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class XFor extends Component
{
    #[Layout('admin.master')]
    public function render()
    {
        $users = User::query()->get();
        return view('livewire.admin.alpinejs.x-for', compact('users'));
    }
}
