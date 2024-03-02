<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Articles extends Component
{
    public $search;

    #[Layout('admin.master')]
    public function render()
    {
        $articles = Article::query()
            ->where('title','like','%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.admin.article.articles',compact('articles'));
    }
}
