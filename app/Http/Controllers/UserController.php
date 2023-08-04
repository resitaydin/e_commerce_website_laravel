<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function checkLogin(Request $request){
        $credentials = $request->validate([
            'username'      => 'required|alphaNum',
            'password'      => 'required|min:6',
        ],
        [
            'username.required' => 'Please enter a username.',
            'password.required' => 'Please enter your password.'
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
}
