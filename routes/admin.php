<?php

use Illuminate\Support\Facades\Route;



Route::get('/', \App\Livewire\Admin\Panel\Index::class)->name('panel');
Route::get('/users', \App\Livewire\Admin\User\UserList::class)->name('users');
Route::get('/categories', \App\Livewire\Admin\Category\Categories::class)->name('categories');
