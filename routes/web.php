<?php

use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeManagement\ProjectDetailController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/dashboard', [ProjectDetailController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
require __DIR__.'/Admin/auth.php';


use App\Http\Controllers\Auth\OtpVerificationController;

Route::get('auth/otp/verify', [OtpVerificationController::class, 'show'])->name('auth.otp.verify');
Route::post('auth/otp/verify', [OtpVerificationController::class, 'verify']);
Route::post('auth/otp/resend', [OtpVerificationController::class, 'resend'])->name('auth.otp.resend');



Route::middleware(['auth'])->group(function () {

    Route::get('/projects', [ProjectDetailController::class, 'index'])->name('project.index');

    Route::get('/project/create', [ProjectDetailController::class, 'create'])->name('project.create');
    Route::post('/project/store', [ProjectDetailController::class, 'store'])->name('project.store');

     Route::get('/projects/{project}/edit', [ProjectDetailController::class, 'edit'])->name('project.edit');
    Route::put('/projects/{project}', [ProjectDetailController::class, 'update'])->name('project.update');

    // Export
    Route::get('/projects/export/excel', [ProjectDetailController::class, 'exportExcel'])->name('project.export.excel');
    Route::get('/projects/{id}/export/excel', [ProjectDetailController::class, 'exportSingleProject'])->name('project.export.single');
});


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);