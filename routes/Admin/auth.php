<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    // Public admin routes
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.attempt');
    Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AdminAuthController::class, 'register'])->name('register.submit');
    Route::get('otp/verify', [AdminAuthController::class, 'showOtpForm'])->name('otp.form');
    Route::post('otp/verify', [AdminAuthController::class, 'verifyOtp'])->name('otp.verify');
    Route::post('otp/resend', [AdminAuthController::class, 'resendOtp'])->name('otp.resend');

    // Protected admin routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('users', [AdminController::class, 'users'])->name('users');
        Route::get('users/{user}/projects', [AdminController::class, 'userProjects'])->name('users.projects');
        Route::delete('users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
    });
});
