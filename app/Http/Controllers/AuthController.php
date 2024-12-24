<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
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
    
        // Проверка существования email
        $user = User::where('email', $credentials['floating_email'])->first();
        if (!$user) {
            return back()->withErrors([
                'floating_email' => 'Email does not exist.',
            ]);
        }
    
        // Проверка пароля
        if (!Auth::attempt(['email' => $credentials['floating_email'], 'password' => $credentials['floating_password']])) {
            return back()->withErrors([
                'floating_password' => 'Password mismatch.',
            ]);
        }
    
        // Успешный логин
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'You have been logged out.');
    }
}
