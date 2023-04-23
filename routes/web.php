<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Profile\ProjectController as ProfileProject;
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

    Route::resource('users', UserController::class);

    Route::resource('tasks', TaskController::class);

    Route::get('/userTasks', [TaskController::class, 'userTasks'])->name('user-tasks');

    Route::get('/activeTasks', [TaskController::class, 'activeTasks'])->name('active-tasks');

    Route::get('/progressTasks', [TaskController::class, 'progressTasks'])->name('progress-tasks');

    Route::get('/closedTasks', [TaskController::class, 'closedTasks'])->name('closed-tasks');

    Route::prefix('profile')->name('profile.')->group(function () {

       Route::get('projects', ProfileProject::class)->name('projects');

       Route::get('/', ProfileController::class)->name('user');
    });
});


/*
 * Login and Register Routes
 */
Route::get('login', [LoginController::class, 'login'])->name('login');

Route::post('login', [LoginController::class, 'authentication'])->name('authentication');

