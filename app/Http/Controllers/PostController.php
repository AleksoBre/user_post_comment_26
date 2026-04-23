<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('posts.create', ['tags' => Tag::all()]);
    }

    public function store(Request $request)
    {
        //validate
        $validated = $request->validate([
            'content' => ['required', 'min:3']
        ]);

        //create post
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'content' => $validated['content']
        ]);

        //add post_tag
        if($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }


        //redirect
        return redirect('/posts');
        
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post->load('user:id,username,email', 'comments.user:id,username', 'tags:id,name')]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {

        $attributes = $request->validate([
            'content' => ['required', 'min:3']
        ]);

        $post->update($attributes);

        return redirect("/posts/{$post->id}");
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }
}
