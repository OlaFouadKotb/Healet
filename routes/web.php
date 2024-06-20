<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Mail;
use App\Mail\HealetMail;
use App\Mail\ContactMail;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
// Welcome route
Route::get('/welcome', function () {
    return view('welcome');
});
//####login ###(Route to display the login form)
Route::get('/login1', [LoginController::class, 'showLoginForm'])->name('login');

// Route to handle login form submission
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Route to handle logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//####register#####
Route::get('/register1', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Contact form routes
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// Test email route
Route::get('/send-test-email', function () {
    $data = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'subject' => 'Test Subject',
        'message' => 'This is a test message.'
    ];

    Mail::to('your-email@example.com')->send(new HealetMail($data));

    return 'Test email sent!';
});

// HealetController routes
Route::get('home', [HealetController::class, 'home'])->name('home');
Route::get('about', [HealetController::class, 'about'])->name('about');
Route::get('blog', [HealetController::class, 'blog'])->name('blog');
Route::get('shop', [HealetController::class, 'shop'])->name('shop');



// Authentication routes
Auth::routes(['verify' => true]);

// Verified middleware route
Route::get('/a', [HomeController::class, 'index'])->middleware('verified')->name('a');
