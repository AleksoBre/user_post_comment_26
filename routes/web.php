<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

//Auth
Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
    Route::get('/login', [SessionController::class, 'create'])->name('login.create');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');
    });
Route::delete('/session', [SessionController::class, 'destroy'])->middleware('auth');
    

Route::controller(UserController::class)->group(function() {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/{user}', 'show')->name('users.show');

    Route::middleware('auth')->group(function () {
        Route::get('/users/{user}/edit', 'edit')->can('edit-user', 'user')->name('users.edit');
        Route::patch('/users/{user}', 'update')->can('edit-user', 'user')->name('users.update');
        Route::delete('/users/{user}', 'destroy')->can('delete-user', 'user')->name('users.destroy');
    });
});

Route::controller(PostController::class)->group(function() {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    
    Route::middleware('auth')->group(function () {
        Route::get('/posts/create', 'create')->name('posts.create');
        Route::post('/posts', 'store')->name('posts.store');

        Route::get('/posts/{post}/edit', 'edit')->can('edit-post', 'post')->name('posts.edit');
        Route::patch('/posts/{post}', 'update')->can('edit-post', 'post')->name('posts.update');
        Route::delete('/posts/{post}', 'destroy')->can('delete-post', 'post')->name('posts.destroy');
    });
});

Route::controller(CommentController::class)->group(function() {
    Route::middleware('auth')->group(function () {
        Route::get('/posts/{post}/comment', 'create')->name('comments.create');
        Route::post('/posts/{post}/comment', 'store')->name('comments.store');

        Route::get('/comments/{comment}', 'edit')->can('edit-comment', 'comment')->name('comments.edit');
        Route::patch('/comments/{comment}', 'update')->can('edit-comment', 'comment')->name('comments.update');
        Route::delete('/comments/{comment}', 'destroy')->can('delete-comment', 'comment')->name('comments.destroy');
    });
});

Route::resource('tags', TagController::class);


//To do:

//authorization for users, posts, comments
//crud for tags