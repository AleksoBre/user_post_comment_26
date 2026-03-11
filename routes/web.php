<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/users', function () {
    return view('users');
});
Route::get('/posts', function () {
    return view('posts');
});


// TO DO:
// - create models


//1 user hasMany posts
//1 post belongsTo 1 user

//1 user hasMany comments
//1 comment belongsTo 1 user

//1 post hasMany comments
//1 comment belongsTo 1 post

//1 tag belongsToMany posts
//1 post belongsToMany tags OVDE JE PIVOT TABLE



