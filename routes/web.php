<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);
Route::resource('tags', TagController::class);