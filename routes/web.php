<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ChatController;

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
        Route::get('/admin/create-user', [AdminController::class, 'createUserForm'])->name('admin.user.create');
        Route::post('/admin/create-user', [AdminController::class, 'storeUser'])->name('admin.user.store');
        

    });

    Route::middleware('auth')->group(function () {
        Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
        Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
        Route::get('/chat/messages/{user}', [ChatController::class, 'messages'])->name('chat.messages');
    });
    


    Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
    Route::post('/contact', [ContactController::class, 'submitForm']);
    Route::post('/news/{news}/comment', [NewsController::class, 'storeComment'])->name('news.comment');

    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::post('/news/{news}/comment', [NewsController::class, 'storeComment'])->name('news.comment.store');
    Route::post('/comments/{id}/reply', [NewsController::class, 'replyToComment'])->name('comments.reply');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/public/{id}', [ProfileController::class, 'show'])->name('profile.public');


    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

    Route::middleware('auth')->group(function () {
        Route::get('/admin/faq/category/create', [FaqController::class, 'createCategory'])->name('faq.category.create');
        Route::post('/admin/faq/category', [FaqController::class, 'storeCategory'])->name('faq.category.store');
        Route::get('/admin/faq/question/create', [FaqController::class, 'createQuestion'])->name('faq.question.create');
        Route::post('/admin/faq/question', [FaqController::class, 'storeQuestion'])->name('faq.question.store');
        Route::get('/faq/edit', [FaqController::class, 'editFaq'])->name('faq.edit');
        Route::get('/faq/edit/category/{id}', [FaqController::class, 'editCategory'])->name('faq.category.edit');
        Route::patch('/faq/category/{id}', [FaqController::class, 'updateCategory'])->name('faq.category.update');
        Route::patch('/faq/question/{id}', [FaqController::class, 'updateQuestion'])->name('faq.question.update');
        Route::delete('/faq/category/{id}', [FaqController::class, 'deleteCategory'])->name('faq.category.delete');
        Route::delete('/faq/question/{id}', [FaqController::class, 'deleteQuestion'])->name('faq.question.delete');
    });

require __DIR__.'/auth.php';
