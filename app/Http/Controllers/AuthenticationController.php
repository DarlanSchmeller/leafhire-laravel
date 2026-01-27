<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthenticationController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function auth(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|min:5',
            'password' => 'required|string|min:5'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('jobs.index')->with('success', 'You are now logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect'
        ])->onlyInput('email');
    }
}
