<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Profile\ProjectController as ProfileProjectController;

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

    Route::view('/', 'welcome')->name('dashboard');

    Route::resource('clients', ClientController::class);

    Route::resource('projects', ProjectController::class);

    Route::resource('users', UserController::class)->only(['index', 'show']);

    Route::resource('tasks', TaskController::class);

    Route::prefix('profile')->name('profile.')->group(function () {
       Route::get('/', [ProfileController::class, 'index'])->name('user');

        Route::post('/save', [ProfileController::class, 'save'])->name('save');

       Route::get('projects', ProfileProjectController::class)->name('projects');
    });

    Route::prefix('notifications')->name('notifications.')->group(function (){
        Route::get('/', [NotificationController::class, 'index'])->name('index');
        Route::post('/readNotifications', [NotificationController::class, 'readNotifications'])->name('read-notifications');
    });
});

require __DIR__ . '/auth.php';
