<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class userController extends Controller
{

    public function addUser(Request $request){
       
        $validated = $request->validate([
            'username'      => 'required|alphaNum | unique:users',  // must be unique for 'users' database to avoid duplication.
            'userTitle'     => 'required',
            'password'      => 'required|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        if(!$user){
            return back()->withErrors('e');
        }
        return redirect()->route('main')->with('success', 'User has been successfully added.');
    }

    public function listUsers(){
        $allUsers = User::all();
        return view('listUsers', ['users' => $allUsers]);
    }

    public function editUser($id){
        $user = User::find($id);
        return view('editUser', ['user' => $user]);
    }

    public function deleteUser(){
        return view('deleteUser');
    }

    public function updateUser(Request $request, $id){
        $user = User::find($id);

        $validated = $request->validate([
            'username' => 'required|alphaNum|unique:users,username,'.$id,
            'userTitle' => 'required',
            'password' => 'min:6 | nullable',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        // Update the user with the validated data
        $user->update($validated);
        // Redirect back to the user list page with a success message
        return redirect('userList')->with('success', 'User has been successfully updated.');
    }

    public function deleteUsers(Request $request){
     
        $selectedUsers = $request->input('selectedUsers', []);

        User::whereIn('id', $selectedUsers)->delete();

       return redirect()->back();

    }
}