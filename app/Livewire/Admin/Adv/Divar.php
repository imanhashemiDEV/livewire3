<?php

namespace App\Livewire\Admin\Adv;

use App\Models\Advertise;
use App\Models\Article;
use App\Models\Gallery;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Divar extends Component
{
    use WithFileUploads;

    public $title;
    public $images=[];
    public $loop=1;
    public function createAdv1()
    {
        $advertise = Advertise::query()->create([
            'title'=>$this->title,
        ]);

        foreach ($this->images as $image){
           // $name = time().'.'.$image->getClientOriginalExtension();
             $result = $image->store('photos/adv','public');
             $array = explode('/',$result);
             $name = array_splice($array,-1)[0];
            Gallery::query()->create([
                'advertise_id'=>$advertise->id,
                'name'=>$name
            ]);
        }

        $this->reset('title');
        session()->flash('message','آگهی جدید ذخیره شد');
//


    }

    public function addLoop()
    {
        $this->loop++;
    }
    #[Layout('admin.master')]
    public function render()
    {
        return view('livewire.admin.adv.divar');
    }
}
