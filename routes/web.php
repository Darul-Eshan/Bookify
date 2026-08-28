<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthConntroller;


Route::get('/login', [AuthConntroller::class, 'login'])->name('login');


Route::post('/login', [AuthConntroller::class, 'loginStore'])->name('login.post');

Route::get('/register', [AuthConntroller::class, 'register'])->name('register');
Route::post('/register/store', [AuthConntroller::class, 'registerStore'])->name('register.store');
Route::get('/admin/dashboard', function () {return view('backend.layout.master'); })->name('admin.dashboard');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin/login', function () {return view('backend.layout.master'); })->name('admin.login');
Route::get('/events', [App\Http\Controllers\HomeController::class, 'events'])->name('events');
Route::get('/cart', function () {return view('frontend.cart');})->name('cart');
Route::view('/offers', 'frontend.offers')->name('offers');
Route::view('/support', 'frontend.support')->name('support');
Route::get('/events/{id}', [App\Http\Controllers\HomeController::class, 'eventDetails'])->name('events.details');


Route::view('/about', 'frontend.about')->name('about');
Route::view('/privacy-policy', 'frontend.privacy')->name('privacy');
Route::view('/careers', 'frontend.careers')->name('careers');
Route::view('/help-centre', 'frontend.help-centre')->name('help.centre');
Route::view('/terms', 'frontend.terms')->name('terms');

Route::view('/press', 'frontend.press')->name('press');