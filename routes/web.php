<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;


Route::get('/', function () {
    return view('auth.landing');
});
Route::get('/redirect-after-login', [CustomLoginController::class, 'redirectAfterLogin'])->middleware('auth');

Route::middleware(['auth', 'student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});




