<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;

Route::get('/', HomeController::class);

Route::view('services', 'services')->name('services');
Route::view('about', 'about')->name('about');
Route::view('contact', 'contact')->name('contact');

Route::get('properties', [PropertyController::class, 'index'])->name('properties');
