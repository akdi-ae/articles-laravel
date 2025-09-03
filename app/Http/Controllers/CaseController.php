<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CaseController extends Controller
{
    public function  create()
    {
        return view("login2");
    }
    public function  store(Request $request)
    {
        $request->validate([
            "email" => ["required", 'string', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard2'));
        }
        // return back()->withErrors(['email'=> 'Қате пароль'])->onlyInput('email');

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans('Қате email')]);
    }
    public function register(Request $request)
    {
        $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "string", "email", "unique:users"],
            "password" => ["required", "string", "min:6"],
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password, // пароль сразу хэшируется
        ]);

        Auth::login($user);

        return redirect()->route("dashboard2");
    }
    public function showLoginForm()
    {
        return view('login2');
    }
}
