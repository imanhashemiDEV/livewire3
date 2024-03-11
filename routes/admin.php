<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Admin\Panel\Index::class)->name('panel');
Route::get('/users', \App\Livewire\Admin\User\UserList::class)->name('users');
Route::get('/categories', \App\Livewire\Admin\Category\Categories::class)->name('categories');
Route::get('/articles', \App\Livewire\Admin\Article\Articles::class)->name('articles');
Route::get('/date_picker', \App\Livewire\Admin\DatePicker\DatePicker::class)->name('date.picker');
Route::get('/create_article', \App\Livewire\Admin\Article\CreateArticle::class)->name('create.article');
//Route::get('/edit_article/{article}', \App\Livewire\Admin\Article\EditArticle::class)->name('edit.article');
Route::get('/edit_article/{id}', \App\Livewire\Admin\Article\EditArticle::class)->name('edit.article');
Route::post('upload_ckeditor_image',[\App\Http\Controllers\Admin\GalleryController::class,'ckeditor_image'])->name('ckeditor.upload');
