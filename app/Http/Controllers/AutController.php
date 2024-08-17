<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutController extends Controller
{
    function index()
    {
        return view("Auth.login");
    }

    function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ], [
            'username.required' => 'Masukkan username',
            'password.required' => 'Masukkan password',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $credentials = $request->only('username', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();

            // Redirect to intended page or dashboard
            return redirect()->intended('/dashboard');
        } else {
            // If login fails, redirect back with input and an error message
            return back()->withErrors([
                'username' => 'Username atau password salah',
            ])->withInput($request->only('username'));
        }
    }
    public function logout(Request $request)
    {
        // Log the user out of the application
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to login page with a success message
        return redirect('/login')->with('success', 'Logout sukses');
    }
}
