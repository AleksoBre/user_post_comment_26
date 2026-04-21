<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('users.index', ['users' => User::withCount('posts', 'comments')->paginate(5)]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user->load('posts.tags')->loadCount('comments')]);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        //validate
        $request->validate([
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email']
        ]);

        //change
        $user->update([
            'username' => $request['username'],
            'email' => $request['email']
        ]);

        return redirect("/users/{$user->id}");
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users');
    }
}
