<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('jobs.index'));

Route::resource('jobs', JobController::class)
    ->only(['index', 'show']);

Route::get('search/', [JobController::class, 'search'])->name('search');