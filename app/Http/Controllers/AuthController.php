<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();


            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('editor')) {
                return redirect()->route('editor.dashboard');
            } elseif ($user->hasRole('reviewer')) {
                return redirect()->route('reviewer.dashboard');
            }

            return redirect()->route('dashboard2');
        }

        return back()->withErrors([
            'email' => 'Неверный email или пароль.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login2');
    }
    public function profile()
    {
        $user = auth()->user();
        $editorials = $user->editorials()->latest()->get(); // assuming relationship exists
        return view('profile', compact('user', 'editorials'));
    }
}
