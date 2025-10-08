<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function store(Login $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
    }
}
