<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealetController;

// Route::get('/', function () {
//     return view('test');
// });
Route::get('home',[HealetController::class,('home')])->name('home');
Route::get('about',[HealetController::class,('about')])->name('about');
Route::get('blog',[HealetController::class,('blog')])->name('blog');
Route::get('shop',[HealetController::class,('shop')])->name('shop');
