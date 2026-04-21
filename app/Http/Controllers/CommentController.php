<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function create(Post $post) {
        return view('comments.create', ['post' => $post]);
    }
    public function store(Request $request, Post $post)
    {
        //validate
        $attributes = $request->validate([
            'content' => ['required', 'min:2']
        ]);

        //create comment
        $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $attributes['content']
        ]);

        //redirect
        return redirect("/posts/{$post->id}");
    }
    public function edit(Comment $comment) {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate(['content' => ['required', 'min:3']]);

        $comment->update(['content' => $request['content']]);

        return redirect("/posts/{$comment->post->id}");
    }

    public function destroy(Comment $comment)
    {

        $post_id = $comment->post->id;

        $comment->delete();

        return redirect("/posts/{$post_id}");
    }
}
