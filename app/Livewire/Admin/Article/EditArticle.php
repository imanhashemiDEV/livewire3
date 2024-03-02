<?php

namespace App\Livewire\Admin\Article;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EditArticle extends Component
{
    #[Layout('admin.master')]
    public function render()
    {
        return view('livewire.admin.article.edit-article');
    }
}
