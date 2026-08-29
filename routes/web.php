<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthConntroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\EventController;

Route::get('/login', [AuthConntroller::class, 'login'])->name('login');
Route::post('/login', [AuthConntroller::class, 'loginStore'])->name('login.post');

Route::get('/register', [AuthConntroller::class, 'register'])->name('register');
Route::post('/register/store', [AuthConntroller::class, 'registerStore'])->name('register.store');

Route::get('/admin/dashboard', function () { return view('backend.dashboard'); })->name('admin.dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin/login', function () { return view('backend.layout.master'); })->name('admin.login');

Route::get('/allevents', [HomeController::class, 'events'])->name('events');

Route::get('/cart', function () { return view('frontend.cart.cart'); })->name('cart');
Route::view('/offers', 'frontend.about.offers')->name('offers');
Route::view('/support', 'frontend.about.support')->name('support');
Route::get('/events/{id?}', [HomeController::class, 'eventDetails'])->name('events.details');
Route::get('/viewcart', function () { return view('frontend.cart.cart'); })->name('cart.view');
Route::get('/checkout', function () { return view('frontend.cart.checkout'); })->name('checkout.view');

Route::view('/about', 'frontend.about.about')->name('about');
Route::view('/privacy-policy', 'frontend.about.privacy')->name('privacy');
Route::view('/careers', 'frontend.about.careers')->name('careers');
Route::view('/help-centre', 'frontend.about.help-centre')->name('help.centre');
Route::view('/terms', 'frontend.about.terms')->name('terms');
Route::view('/press', 'frontend.about.press')->name('press');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events');
    
    Route::post('/events/store', [AdminController::class, 'storeEvent'])->name('events.store');
    Route::put('/events/update/{id}', [AdminController::class, 'updateEvent'])->name('events.update'); // অথবা আপনার কন্ট্রোলার অনুযায়ী
    Route::delete('/events/delete/{id}', [AdminController::class, 'destroyEvent'])->name('events.delete');
    
    Route::get('/event-organizers', [EventController::class, 'organizers'])->name('event.organizers');
    Route::get('/event-schedules', [EventController::class, 'schedules'])->name('event.schedules');
    Route::get('/event-venues', [EventController::class, 'venues'])->name('event.venues');
});