<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\NewsController;
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/makeAdmin/{id}', [AdminController::class, 'makeAdmin'])->name('admin.makeAdmin');
        Route::patch('/removeAdmin/{id}', [AdminController::class, 'removeAdmin'])->name('admin.removeAdmin');
        Route::delete('/delUser/{id}', [AdminController::class, 'delUser'])->name('admin.delUser');

        
        Route::get('/news', [NewsController::class, 'showNewsForm'])->name('admin.news.form');
        Route::post('/news', [NewsController::class, 'storeNews'])->name('admin.news.store');
        Route::get('/news', [NewsController::class, 'showNewsForm'])->name('admin.news.form');
        Route::post('/news', [NewsController::class, 'storeNews'])->name('admin.news.store');
        Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit'); 
        Route::patch('/news/{news}', [NewsController::class, 'update'])->name('admin.news.update'); 
        Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('admin.news.destroy'); 
    });


    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

require __DIR__.'/auth.php';
