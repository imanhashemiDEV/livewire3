<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditArticle extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $category_id;
    #[Rule('required')]
    public $body;
    public $image;
   // public Article $article;
    public $article;

    #[Locked]
    public $id;
    public function mount($id)
    {
        $this->article = Article::query()->find($id);
        $this->title = $this->article->title;
        $this->category_id = $this->article->category_id;
        $this->body = $this->article->body;

        $this->id = $id;
    }

//    public function mount($article)
//    {
//      $this->article = $article;
//      $this->title = $article->title;
//      $this->category_id = $article->category_id;
//      $this->body = $article->body;
//    }


    #[On('setBody')]
    public function setBody($body)
    {
        $this->body = $body;
    }
    public function updateArticle()
    {
        $this->validate();

        if($this->image){
            $name = time().'.'.$this->image->getClientOriginalExtension();
            $this->image->storeAs('photos/articles',$name,'public');
        }


        $this->article->update([
            'title'=>$this->title,
            'body'=>$this->body,
            'category_id'=>$this->category_id,
            'image'=>$this->image ? $name : $this->article->image,
        ]);

        $this->reset('title', 'body','image');
        session()->flash('message','مقاله ویرایش شد');
        $this->redirectRoute('articles');

    }

    #[Layout('admin.master')]
    public function render()
    {
        $categories = Category::query()->pluck('title','id');
        return view('livewire.admin.article.edit-article',compact('categories'));
    }
}
