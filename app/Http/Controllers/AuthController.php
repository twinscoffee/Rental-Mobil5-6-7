<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('aut.login');
    }

    public function post(Request $request)
    {
        // dd(request()->all());
        $cre = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (aut::attemp($cre)) {
            session()->regenerate();
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('warning', 'username atau password anda salah!');
        }
    }

    public function register()
    {
        return view('auth.register');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
}
