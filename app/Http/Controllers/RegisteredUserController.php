<?php

namespace App\Http\Controllers;

use App\Models\RegisteredUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //authorize

        //validate
        $attributes = $request->validate([
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(3), 'confirmed']
        ]);

        //create session
        $user = User::create($attributes);

        //log in user
        Auth::login($user);

        //redirect
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(RegisteredUser $registeredUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegisteredUser $registeredUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegisteredUser $registeredUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegisteredUser $registeredUser)
    {
        //
    }
}
