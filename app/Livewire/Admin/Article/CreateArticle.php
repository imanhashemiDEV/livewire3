<?php

namespace App\Livewire\Admin\Article;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticle extends Component
{
    use WithFileUploads;

    #[Layout('admin.master')]
    public function render()
    {
        $categories = Category::query()->pluck('title','id');
        return view('livewire.admin.article.create-article',compact('categories'));
    }
}
