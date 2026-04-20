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

//Resource
Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);
Route::resource('tags', TagController::class);

Route::get('/posts/{post}/comment', [CommentController::class, 'create']);
Route::post('/posts/{post}/comment', [CommentController::class, 'store']);
Route::get('/comments/{comment}', [CommentController::class, 'edit'])->name('comments.edit');
Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/posts/{post}/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

//To do:
//show buttons to edit or delete only if i'm the user/author of post/author of comment
    //gates
    //edit_user & delete_user (can do only if i'm that user)
    //edit_post & delete_post & create_post (can do only if i'm the author)
    //edit_comment & delete_comment & create_post (can do only if i'm the author)

//authorization for users, posts, comments