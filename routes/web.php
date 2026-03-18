<?php

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/users', function () {
    return view('users.index', ['users' => User::withCount('posts', 'comments')->paginate(5)]);
});
Route::get('/users/{user}', function(User $user) {
    return view('users.show', ['user' => $user->load('posts.tags')->loadCount('comments')]);
});

Route::get('/posts', function () {
    return view('posts.index',[
        'posts' => Post::latest()->withCount('comments')->with('user:id,username', 'tags:id,name')->simplePaginate(10)
        ]);
});
Route::get('/posts/{post}', function(Post $post) {
    return view('posts.show', ['post' => $post->load('user:id,username,email', 'comments.user:id,username', 'tags:id,name')]);
});

Route::get('/tags/{tag}', function(Tag $tag) {
    return view('tags.show', [
        'tag' => $tag->load([
            'posts' => fn($query) => $query->with('user')->withCount('comments')
        ])
    ]);
});

// To do: 
// - only show posts with comments
// - sort posts by newest