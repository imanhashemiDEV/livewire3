<?php

namespace App\Livewire\Admin\Videos;

use App\Models\Article;
use App\Models\Video;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Videos extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $title;
    #[Rule('required|max:100000')]
    public $video;
    public function createRow()
    {
        $this->validate();

        $name = time().'.'.$this->video->getClientOriginalExtension();
        $this->video->storeAs('videos',$name,'public');

        Video::query()->create([
            'title'=>$this->title,
            'video'=>$name,
        ]);

        $this->reset('title', 'video');
        session()->flash('message','ویدئو جدید ذخیره شد');

    }

    #[Layout('admin.master')]
    public function render()
    {
        return view('livewire.admin.videos.videos');
    }
}
