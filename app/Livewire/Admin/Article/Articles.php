<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Articles extends Component
{

//    #[Url(as: 'q')]
//    #[Url(keep: true)]
    #[Url(history: true)]
    public $search="";

    public function deleteArticle($article_id)
    {
        $this->dispatch('article-delete', article_id:$article_id);
     }


     #[On('article-destroy')]
     public function destroyArticle($article_id)
     {
         dd($article_id);
        // Article::destroy($article_id);
     }

    #[Layout('admin.master')]
    public function render()
    {
        $articles = Article::query()
            ->where('title','like','%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.admin.article.articles',compact('articles'));
    }
}
