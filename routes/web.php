<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'layouts.home')->name('home');
Route::view('about', 'layouts.about')->name('about');
Route::view('contact', 'layouts.contact')->name('contact');
Route::redirect('contacts', '/contact');
