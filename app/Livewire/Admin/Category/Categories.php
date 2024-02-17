<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    #[Rule('required')]
    public $title;
    public $search;

    public function createCategory()
    {
        $this->validate();
        Category::query()->create([
            'title'=>$this->title
        ]);
        $this->reset('title');
        session()->flash('message','دسته بندی جدید ذخیره شد');
    }

    #[Layout('admin.master')]
    public function render()
    {
        $categories = Category::query()
            ->where('title','like','%'.$this->search.'%')
            ->paginate(5);
        return view('livewire.admin.category.categories',compact('categories'));
    }
}
