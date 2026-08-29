<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthConntroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\AdminManagementController;



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
  
    Route::get('/events', [AdminController::class, 'events'])->name('events');
    
    Route::post('/events/store', [AdminController::class, 'storeEvent'])->name('events.store');
    Route::put('/events/update/{id}', [AdminController::class, 'updateEvent'])->name('events.update'); 
    Route::delete('/events/delete/{id}', [AdminController::class, 'destroyEvent'])->name('events.delete');
    
    Route::get('/event-organizers', [AdminController::class, 'organizers'])->name('event.organizers');
    Route::get('/event-schedules', [EventController::class, 'schedules'])->name('event.schedules');

    // Add Organizer Page Route
    Route::get('/organizers/create', function () {return view('backend.events.add-organizer');})->name('organizers.create');
    Route::get('/event-organizers/{id}/details', [AdminController::class, 'organizerDetails'])->name('organizers.details');

    Route::get('/event-schedules', [AdminController::class, 'schedules'])->name('event.schedules');
    Route::put('/event-schedules/update/{id}', [AdminController::class, 'updateSchedule'])->name('schedules.update');
    Route::delete('/event-schedules/delete/{id}', [AdminController::class, 'destroySchedule'])->name('schedules.delete');

    // Admin Bookings Route
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.delete');

    // User List page
    Route::get('/users', [UserController::class, 'index'])->name('users');
    

    Route::put('/users/settings/update', [UserController::class, 'updateSettings'])->name('users.settings.update');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');


    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

    Route::get('/coupons', [CouponController::class, 'index'])->name('coupons');
    Route::post('/coupons/store', [CouponController::class, 'store'])->name('coupons.store');
    Route::delete('/coupons/delete/{id}', [CouponController::class, 'destroy'])->name('coupons.delete');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');


    Route::get('/admins-list', [AdminManagementController::class, 'index'])->name('admins.index');
  



    });