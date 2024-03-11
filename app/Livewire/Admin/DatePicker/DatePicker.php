<?php

namespace App\Livewire\Admin\DatePicker;

use Livewire\Attributes\Layout;
use Livewire\Component;

class DatePicker extends Component
{
    #[Layout('admin.master')]
    public function render()
    {
        return view('livewire.admin.date-picker.date-picker');
    }
}
