<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Admin\Panel\Index::class)->name('panel');
Route::get('/users', \App\Livewire\Admin\User\UserList::class)->name('users');
Route::get('/checkbox_users', \App\Livewire\Admin\User\CheckboxUsers::class)->name('checkbox_users');
Route::get('/categories', \App\Livewire\Admin\Category\Categories::class)->name('categories');
Route::get('/articles', \App\Livewire\Admin\Article\Articles::class)->name('articles');
Route::get('/videos', \App\Livewire\Admin\Videos\Videos::class)->name('videos');
Route::get('/date_picker', \App\Livewire\Admin\DatePicker\DatePicker::class)->name('date.picker');
Route::get('/create_article', \App\Livewire\Admin\Article\CreateArticle::class)->name('create.article');
//Route::get('/edit_article/{article}', \App\Livewire\Admin\Article\EditArticle::class)->name('edit.article');
Route::get('/edit_article/{id}', \App\Livewire\Admin\Article\EditArticle::class)->name('edit.article');
Route::post('upload_ckeditor_image',[\App\Http\Controllers\Admin\GalleryController::class,'ckeditor_image'])->name('ckeditor.upload');
Route::get('/adv_divar', \App\Livewire\Admin\Adv\Divar::class)->name('adv.divar');
Route::get('/alpinejs', \App\Livewire\Admin\Alpinejs\Alpinejs::class)->name('alpinejs');
Route::get('/x-data/x-text/x-html', \App\Livewire\Admin\Alpinejs\XData::class)->name('x-data');
Route::get('/x-on', \App\Livewire\Admin\Alpinejs\XOn::class)->name('x-on');
Route::get('/x-init', \App\Livewire\Admin\Alpinejs\XInit::class)->name('x-init');
Route::get('/x-show', \App\Livewire\Admin\Alpinejs\XShow::class)->name('x-show');
Route::get('/x-bind', \App\Livewire\Admin\Alpinejs\XBind::class)->name('x-bind');
Route::get('/x-model', \App\Livewire\Admin\Alpinejs\XModel::class)->name('x-model');
Route::get('/x-modelable', \App\Livewire\Admin\Alpinejs\XModelable::class)->name('x-modelable');
Route::get('/x-transition', \App\Livewire\Admin\Alpinejs\XTransition::class)->name('x-transition');
Route::get('/x-for', \App\Livewire\Admin\Alpinejs\XFor::class)->name('x-for');
Route::get('/x-if', \App\Livewire\Admin\Alpinejs\XIf::class)->name('x-if');
Route::get('/x-effect', \App\Livewire\Admin\Alpinejs\XEffect::class)->name('x-effect');
Route::get('/x-cloak', \App\Livewire\Admin\Alpinejs\XCloak::class)->name('x-cloak');

