<?php

namespace App\Livewire\Admin\Alpinejs;

use Livewire\Attributes\Layout;
use Livewire\Component;

class XOn extends Component
{
    #[Layout('admin.master')]
    public function render()
    {
        return view('livewire.admin.alpinejs.x-on');
    }
}
