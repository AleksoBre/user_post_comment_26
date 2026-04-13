<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create() {
        return view('auth.login');
    }
    public function store(Request $request) {
        //validate
        $attributes = $request->validate([
            'email' => ['required', 'min:3', 'email'],
            'password' => ['required', Password::min(3)]
        ]);


        //attempt to log in user
        if(!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'password' => "Couldn't find user with those credentials!"
            ]);
        }

        //regenerate session
        $request->session()->regenerate();

        //redirect
        return redirect('/');
    }

   public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
