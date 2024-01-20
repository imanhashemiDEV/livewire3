<?php

namespace App\Livewire\Admin\Panel;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('admin.master')]
    public function render()
    {
        return view('livewire.admin.panel.index');
    }
}
