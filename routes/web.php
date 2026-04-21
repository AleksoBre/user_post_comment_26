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
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
Route::get('/login', [SessionController::class, 'create'])->name('login.create');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::delete('/session', [SessionController::class, 'destroy']);


Route::controller(UserController::class)->group(function() {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/{user}', 'show')->name('users.show');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit')->can('edit_user','user');
    Route::patch('/users/{user}', 'update')->name('users.update')->can('edit_user', 'user');
    Route::delete('/users/{user}', 'destroy')->name('users.destroy')->can('delete_user', 'user');
});

Route::controller(PostController::class)->group(function() {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::post('/posts/{post}', 'store')->name('posts.store');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
    Route::patch('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');
});

Route::resource('tags', TagController::class);

Route::controller(CommentController::class)->group(function() {
    Route::get('/posts/{post}/comment', 'create')->name('comments.create');
    Route::post('/posts/{post}/comment', 'store')->name('comments.store');
    Route::get('/comments/{comment}', 'edit')->name('comments.edit');
    Route::patch('/comments/{comment}', 'update')->name('comments.update');
    Route::delete('/posts/{post}/{comment}', 'destroy')->name('comments.destroy');

});

//To do:

//authorization for users, posts, comments
//crud for tags