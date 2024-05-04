<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditCategoryModal extends Component
{
    #[Rule('required')]
    public $title;
    public $selected_category;
    public $category_title;


    #[On('editCategory')]
    public function editCategory($id)
    {
        $this->selected_category = Category::query()->find($id);
        $this->category_title = $this->selected_category->title;
    }

    public function updateCategory()
    {
        $this->selected_category->update([
            'title'=> $this->category_title
        ]);
        $this->dispatch('closeCategoryModal2');
        $this->dispatch('refreshCategories');
    }

    public function render()
    {
        return view('livewire.admin.category.edit-category-modal');
    }
}
