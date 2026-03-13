<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/users', function () {
    return view('users', ['users' => User::withCount('posts', 'comments')->paginate(5)]);
});

// moram nekako da prikazem i tagove
Route::get('/posts', function () {
    return view('posts',['posts' => Post::with('user:id,username')->withCount('comments')->paginate(10)]);
});

