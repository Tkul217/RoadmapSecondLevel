<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
 * Login and Register Routes
 */
Route::get('login', [LoginController::class, 'login'])->name('login');

Route::post('login', [LoginController::class, 'authentication'])->name('authentication');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

