<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\MyJobApplicationsController;
use App\Http\Middleware\Employer;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthenticationController::class, 'register'])->name('register');
    Route::get('login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AuthenticationController::class, 'auth'])->name('login.auth');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::resource('job.application', JobApplicationController::class)
        ->only(['create', 'store']);

    Route::resource('my-job-applications', MyJobApplicationsController::class)->only(['index', 'destroy']);

    Route::resource('employer', EmployerController::class)->only(['index', 'create', 'store']);
});

Route::get('/', fn() => redirect()->route('jobs.index'));

Route::resource('jobs', JobListingController::class)
    ->only(['index', 'create', 'show', 'store', 'edit', 'update']);

Route::get('search', [JobListingController::class, 'search'])->name('search');
