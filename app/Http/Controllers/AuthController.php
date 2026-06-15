<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;

class AuthController extends Controller
{
    public function showformlogin()
    {
        return view('auth.login');
    }

    public function proseslogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
                return redirect()->intended('/dashboard')->with('success', 'You have Successfully logged in');
        }

        return back()->withErrors('Opps! You have entered invalid credentials');
    }

    public function dashboard()
    {
        return view('auth.dashboard');
    }

    
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

}

