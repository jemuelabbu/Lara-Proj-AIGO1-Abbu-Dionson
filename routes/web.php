<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'layouts.home')->name('home');

Route::get('/about', function () {
    return view('layouts.about');
})->name('about');


Route::get('/contact', function () {
    return view('layouts.contact');
})->name('contact');

Route::redirect('contacts', '/contact');
