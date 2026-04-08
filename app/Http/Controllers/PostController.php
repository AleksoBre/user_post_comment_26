<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $query = Post::latest()->withCount('comments')->with('user:id,username', 'tags:id,name');

        if(request()->query('filter') === 'has_comments') {
            $query = $query->has('comments');
        }

        return view('posts.index',['posts' => $query->simplePaginate(10)]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //validate
        $validated = $request->validate([
            'content' => ['required', 'min:3']
        ]);

        //create post
        Post::create([
            'user_id' => 5,
            'content' => $validated['content']
        ]);

        //redirect
        return redirect('/');
        
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post->load('user:id,username,email', 'comments.user:id,username', 'tags:id,name')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
