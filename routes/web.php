<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');

    Route::resource('clients', ClientController::class)->except('show');

    Route::resource('projects', ProjectController::class);

    Route::resource('users', UserController::class)->only(['index', 'show']);

    Route::resource('tasks', TaskController::class);

    Route::prefix('profile')->name('profile.')->group(function () {
       Route::get('/', ProfileController::class)->name('user');

       Route::get('projects', function () {
           dd(auth()->user()->projects);
       })->name('projects');
    });
});

require_once __DIR__ . '/auth.php';
