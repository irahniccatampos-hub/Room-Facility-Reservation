<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register',[AuthController::class, 'register'])->name('register');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/user-dashboard', [DashboardController::class, 'userDashboardIndex'])->name('user.dashboard.show');