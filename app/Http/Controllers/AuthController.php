<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view("auth.login");
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "username" => ["required"],
            "password" => ["required"],
        ]);
        if (Auth::attempt($credentials, $request->boolean("remember"))) {
            $request->session()->regenerate();
            return redirect()->route("dashboard");
        }

        throw ValidationException::withMessages([
            "username" => "The provided credentials do not match our records.",
        ]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("login");
    }
}
