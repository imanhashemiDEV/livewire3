<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


Route::get('/',\App\Livewire\Front\Home::class)->name('home');
Route::get('/courses',\App\Livewire\Front\Courses::class)->name('courses');
Route::get('/course_details',\App\Livewire\Front\CourseDetails::class)->name('course.details');


