<?php

namespace App\Livewire\Admin\Alpinejs;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Alpinejs extends Component
{

    #[Layout('admin.master')]
    public function render()
    {
        return view('livewire.admin.alpinejs.alpinejs');
    }
}
