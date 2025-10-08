<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function registerPage()
    {
        return view('auth.register');
    }

    public function store(UserRegistration $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return response()->json([
            'message' => 'Registration successful',
            'redirect' => route('dashboard'),
        ], 201);
    }
}
