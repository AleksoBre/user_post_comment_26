<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/users', function () {
    return view('users', ['users' => User::withCount('posts', 'comments')->paginate(5)]);
});
Route::get('/posts', function () {
    return view('posts');
});

//loading usera 