<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    #[Rule('required')]
    public $title;
    public $search;
    public $selected_category;
    public $category_title;

    public function createCategory()
    {
        $this->validate();
        Category::query()->create([
            'title'=>$this->title
        ]);
        $this->reset('title');
        session()->flash('message','دسته بندی جدید ذخیره شد');
    }

    public function editCategory($category_id)
    {
        $this->selected_category = Category::query()->find($category_id);
        $this->category_title = $this->selected_category->title;
    }

    public function updateCategory()
    {
       $this->selected_category->update([
           'title'=> $this->category_title
       ]);
        $this->dispatch('closeCategoryModal');
    }

    public function editRow($category_id)
    {
        $this->selectedCategoryIndex=$category_id;
        $this->title = Category::query()->find($category_id)->title;
    }

    public function updateRow($category_id)
    {
        Category::query()->find($category_id)->update([
            'title'=>$this->title
        ]);
        $this->selectedCategoryIndex=null;
    }

    #[On('refreshCategories')]
  
    #[Layout('admin.master')]
    public function render()
    {
        $categories = Category::query()
            ->where('title','like','%'.$this->search.'%')
            ->paginate(5);
        return view('livewire.admin.category.categories',compact('categories'));
    }
}
