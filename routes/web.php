<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\UserController;
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

Route::get('/', function () {
    return view('home');
})->Middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')
    ->controller(UserController::class)
    ->middleware('can:admin')
    ->group(function () {
        Route::get('/gestionUser', 'index')->name('gestionUser');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
        Route::get('/edit/{user}', 'edit')->name('edit');
        Route::post('/update/{user}', 'update')->name('update');



    });

Route::prefix('task')
    ->controller(TaskController::class)
    ->name('task.')
    ->group(function () {
        Route::get('/task/{task}', 'show')->name('show');

        Route::get('/', 'index')->name('index');
        Route::get('/assigned', 'MysTask')->name('MysTask');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/edit/{task}', 'edit')->name('edit');
        Route::post('/edit/{task}', 'update')->name('update');
        Route::get('/remove/{task}', 'remove')->name('remove');

        Route::get('/assign/{task}', 'assignedView')->name('assignedView');
        Route::post('/assign/{task}', 'assigne')->name('assign');

        Route::post('/startTask/{task}', 'startTask')->name('startTask');
        Route::post('/maskAsTermined/{task}', 'maskAsTermined')->name('maskAsTermined');



    });




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});

require __DIR__ . '/auth.php';
