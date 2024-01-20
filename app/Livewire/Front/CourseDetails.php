<?php

namespace App\Livewire\Front;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CourseDetails extends Component
{

    #[Layout('front.master')]
    public function render()
    {
        return view('livewire.front.course-details');
    }
}
