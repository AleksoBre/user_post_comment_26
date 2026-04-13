<?php

namespace App\Http\Controllers;

use App\Models\RegisteredUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        //validate
        $attributes = $request->validate([
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(3), 'confirmed'],
        ],
        [
            'password.confirmed' => "Passwords don't match"
        ]);

        //create session
        $user = User::create($attributes);

        //log in user
        Auth::login($user);

        //redirect
        return redirect('/');
    }
}
