<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticle extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $category_id;
    #[Rule('required')]
    public $body;
    #[Rule('required')]
    public $image;

    #[On('setBody')]
    public function setBody($body)
    {
        $this->body = $body;
    }
    public function createArticle()
    {
        $this->validate();

        $name = time().'.'.$this->image->getClientOriginalExtension();
        $this->image->storeAs('photos/articles',$name,'public');

        Article::query()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'category_id'=>$this->category_id,
            'image'=>$name,
        ]);

        $this->reset('title', 'body','image');
        session()->flash('message','مقاله جدید ذخیره شد');

        $this->redirectRoute('articles');

    }

    #[Layout('admin.master')]
    public function render()
    {
        $categories = Category::query()->pluck('title','id');
        return view('livewire.admin.article.create-article',compact('categories'));
    }
}
