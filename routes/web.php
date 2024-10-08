<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProjectController;

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

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function(){
        // TUTTE LE ROTTE DI Admin
        Route::get('/', [DashboardController::class, 'index'])->name('home');
    });

Route::middleware(['auth', 'verified'])
    ->prefix('projects')
    ->name('projects.')
    ->group(function(){
        // TUTTE LE ROTTE DI Admin
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/', [ProjectController::class, 'store'])->name('store');
        Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/update/{project}', [ProjectController::class, 'update'])->name('update');
        Route::get('/{project}', [ProjectController::class, 'show'])->name('show');
        Route::delete('/{project}/delete', [ProjectController::class, 'delete'])->name('delete');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PageController::class, 'index'])->name('guest');

require __DIR__.'/auth.php';
