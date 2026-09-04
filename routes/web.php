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
use App\Http\Controllers\Admin\EditorManagementController;
use App\Http\Controllers\Admin\ModeratorManagementController;


/*
|--------------------------------------------------------------------------
| 1. Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/allevents', [HomeController::class, 'events'])->name('events');

Route::get('/events/{id?}', [HomeController::class, 'eventDetails'])->name('events.details');

Route::get('/cart', function () {
    return view('frontend.cart.cart');
})->name('cart');

Route::get('/viewcart', function () {
    return view('frontend.cart.cart');
})->name('cart.view');

Route::get('/checkout', function () {
    return view('frontend.cart.checkout');
})->name('checkout.view');


/*
|--------------------------------------------------------------------------
| Static Pages
|--------------------------------------------------------------------------
*/

Route::view('/offers', 'frontend.about.offers')->name('offers');

Route::view('/support', 'frontend.about.support')->name('support');

Route::view('/about', 'frontend.about.about')->name('about');

Route::view('/privacy-policy', 'frontend.about.privacy')->name('privacy');

Route::view('/careers', 'frontend.about.careers')->name('careers');

Route::view('/help-centre', 'frontend.about.help-centre')->name('help.centre');

Route::view('/terms', 'frontend.about.terms')->name('terms');

Route::view('/press', 'frontend.about.press')->name('press');


/*
|--------------------------------------------------------------------------
| 2. Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthConntroller::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthConntroller::class, 'loginStore'])
        ->name('login.post');

    Route::get('/register', [AuthConntroller::class, 'register'])
        ->name('register1');

    Route::post('/register/store', [AuthConntroller::class, 'registerStore'])
        ->name('register.store');

});


/*
|--------------------------------------------------------------------------
| 3. Authenticated Regular User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {

        Route::post('/logout', [AuthConntroller::class, 'logout'])->name('logout');
        Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

        Route::put('/profile/update', [HomeController::class, 'updateProfile'])->name('profile.update');
        Route::put('/profile/password', [HomeController::class, 'updatePassword'])->name('password.update');
        Route::get('/tickets', [HomeController::class, 'myTickets'])->name('tickets');
      
        Route::get('/transaction-history', function () { return view('frontend.user.transaction-history');})->name('transaction.history');

    });


/*
|--------------------------------------------------------------------------
| 4. Admin Panel Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'can:admin-access'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | Admin Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {

            return view('backend.dashboard');

        })->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Admin Dashboard & Profile
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {return view('backend.dashboard');})->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');


        /*
        |--------------------------------------------------------------------------
        | Moderator Access
        |--------------------------------------------------------------------------
        */

        Route::get('/moderators',
            [ModeratorManagementController::class, 'index']
        )->name('admins.moderator');

        Route::post('/moderators',
            [ModeratorManagementController::class, 'store']
        )->name('moderators.store');

        Route::put('/moderators/{id}',
            [ModeratorManagementController::class, 'update']
        )->name('moderators.update');

        Route::delete('/moderators/{id}',
            [ModeratorManagementController::class, 'destroy']
        )->name('moderators.destroy');


        /*
        |--------------------------------------------------------------------------
        | Executive Level & Above
        |--------------------------------------------------------------------------
        */

        Route::middleware(['can:is-executive-above'])->group(function () {


            /*
            |--------------------------------------------------------------------------
            | EVENTS
            |--------------------------------------------------------------------------
            */

            // Event List
            Route::get('/events',
                [AdminController::class, 'events']
            )->name('events');


            // Create Event Page
            Route::get('/events/create',
                [AdminController::class, 'createEvent']
            )->name('events.create');


            // Store New Event
            Route::post('/events/store',
                [AdminController::class, 'storeEvent']
            )->name('events.store');


            // UPDATED: Separate Event Edit Page
            Route::get('/events/edit/{id}',
                [AdminController::class, 'editEvent']
            )->name('events.edit');


            // UPDATED: Update Event
            Route::put('/events/update/{id}',
                [AdminController::class, 'updateEvent']
            )->name('events.update');


            // Delete Event
            Route::delete('/events/delete/{id}',
                [AdminController::class, 'destroyEvent']
            )->name('events.delete');


            /*
            |--------------------------------------------------------------------------
            | Organizers & Schedules
            |--------------------------------------------------------------------------
            */

            Route::get('/event-organizers',
                [AdminController::class, 'organizers']
            )->name('event.organizers');


            Route::get('/organizers/create', function () {

                return view('backend.events.add-organizer');

            })->name('organizers.create');


            Route::get('/event-organizers/{id}/details',
                [AdminController::class, 'organizerDetails']
            )->name('organizers.details');


            Route::get('/event-schedules',
                [AdminController::class, 'schedules']
            )->name('event.schedules');


            Route::put('/event-schedules/update/{id}',
                [AdminController::class, 'updateSchedule']
            )->name('schedules.update');


            Route::delete('/event-schedules/delete/{id}',
                [AdminController::class, 'destroySchedule']
            )->name('schedules.delete');


            /*
            |--------------------------------------------------------------------------
            | Bookings
            |--------------------------------------------------------------------------
            */

            Route::get('/bookings',
                [BookingController::class, 'index']
            )->name('bookings');


            Route::delete('/bookings/{id}',
                [BookingController::class, 'destroy']
            )->name('bookings.delete');


            /*
            |--------------------------------------------------------------------------
            | Categories
            |--------------------------------------------------------------------------
            */

            Route::get('/categories',
                [CategoryController::class, 'index']
            )->name('categories');


            Route::post('/categories/store',
                [CategoryController::class, 'store']
            )->name('categories.store');


            Route::put('/categories/update/{id}',
                [CategoryController::class, 'update']
            )->name('categories.update');


            Route::delete('/categories/delete/{id}',
                [CategoryController::class, 'destroy']
            )->name('categories.delete');


            /*
            |--------------------------------------------------------------------------
            | Coupons
            |--------------------------------------------------------------------------
            */

            Route::get('/coupons',
                [CouponController::class, 'index']
            )->name('coupons');


            Route::post('/coupons/store',
                [CouponController::class, 'store']
            )->name('coupons.store');


            Route::delete('/coupons/delete/{id}',
                [CouponController::class, 'destroy']
            )->name('coupons.delete');


            /*
            |--------------------------------------------------------------------------
            | Transactions
            |--------------------------------------------------------------------------
            */

            Route::get('/transactions',
                [TransactionController::class, 'index']
            )->name('transactions');


            /*
            |--------------------------------------------------------------------------
            | Editors
            |--------------------------------------------------------------------------
            */

            Route::get('/editors',
                [EditorManagementController::class, 'index']
            )->name('admins.editor');


            Route::post('/editors',
                [EditorManagementController::class, 'store']
            )->name('editors.store');


            Route::delete('/editors/{id}',
                [EditorManagementController::class, 'destroy']
            )->name('editors.destroy');


            Route::get('/editors/{id}/activity',
                [EditorManagementController::class, 'activityLogs']
            )->name('editors.activity');

        });


        /*
        |--------------------------------------------------------------------------
        | Admin Level & Above
        |--------------------------------------------------------------------------
        */

        Route::middleware(['can:is-admin-above'])->group(function () {

            Route::get('/users',
                [UserController::class, 'index']
            )->name('users');


            Route::put('/users/settings/update',
                [UserController::class, 'updateSettings']
            )->name('users.settings.update');


            Route::put('/users/update/{id}',
                [UserController::class, 'update']
            )->name('users.update');


            Route::delete('/users/delete/{id}',
                [UserController::class, 'destroy']
            )->name('users.delete');


            Route::get('/admins-list',
                [AdminManagementController::class, 'index']
            )->name('admins.index');

        });


        /*
        |--------------------------------------------------------------------------
        | Super Admin Only
        |--------------------------------------------------------------------------
        */

        Route::middleware(['can:is-super-admin'])->group(function () {

            Route::get('/super-admins',
                [AdminManagementController::class, 'superAdmins']
            )->name('admins.super');

        });

    });