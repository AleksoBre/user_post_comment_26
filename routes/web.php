<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/users', function () {
    return view('users.index', ['users' => User::withCount('posts', 'comments')->paginate(5)]);
});
Route::get('/users/{user}', function($user) {
    return view('users.show', ['user' => User::with('posts.tags')->withCount('comments')->findOrFail($user)]);
});


// moram nekako da prikazem i tagove
Route::get('/posts', function () {
    return view('posts.index',[
        'posts' => Post::withCount('comments')->with('user:id,username', 'tags:id,name')->paginate(10)

        ]);
});
Route::get('/posts/{post}', function($post) {
    return view('posts.show', ['post' => Post::with('user:id,username,email', 'comments.user:id,username', 'tags:id,name')->findOrFail($post)]);
});