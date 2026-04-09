<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/register', 'auth.register');

Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);
Route::resource('tags', TagController::class);