<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class addUserController extends Controller
{
    public function addUser(Request $request){
       
        $validated = $request->validate([
            'username'      => 'required|alphaNum | unique:users',  // must be unique for 'users' database to avoid duplication.
            'userTitle'     => 'required',
            'password'      => 'required|min:6',
        ],
        [
            'username.required' => 'Please enter a username.',
            'userTitle.required' => 'Please enter an user title.',
            'password.required' => 'Please enter your password.'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        if(!$user){
            return back()->withErrors('e');
        }
        return redirect()->route('main')->with('success', 'User has been successfully added.');
    }
}
