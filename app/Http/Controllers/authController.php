<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function checkLogin(Request $request){
        $credentials = $request->validate([
            'username'      => 'required|alphaNum',
            'password'      => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('main')->with('login','success');
        }
        return back()->withErrors('Invalid username or password.');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showLoginPage(){
        return view('auth/login');
    }
}
