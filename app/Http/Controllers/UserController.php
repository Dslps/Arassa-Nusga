<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'floating_email' => 'required|email',
            'floating_password' => 'required',
        ]);

        // Попытка авторизации
        if (Auth::attempt(['email' => $credentials['floating_email'], 'password' => $credentials['floating_password']])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard.index'); 
        }

        // Если авторизация не удалась
        return back()->withErrors([
            'floating_email' => 'Invalid email or password.',
        ]);
    }
    public function index()
    {
        return view('dashboard.index'); 
    }
}
