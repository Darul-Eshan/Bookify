<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthConntroller;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', [AuthConntroller::class, 'login'])->name('login');
Route::get('/register', [AuthConntroller::class, 'register'])->name('register');
Route::post('/register/store', [AuthConntroller::class, 'registerStore'])->name('register.store');
Route::get('/', [HomeController::class, 'index'])->name('home');

    