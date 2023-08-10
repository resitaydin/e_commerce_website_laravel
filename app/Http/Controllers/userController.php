<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;

use App\Models\User;

class UserController extends Controller
{

    // Adds user to database.
    public function addUser(Request $request){
       
        $validated = $request->validate([
            'username' => [
                'required', 'alpha_num',
                Rule::unique('users')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],  // must be unique for 'users' database to avoid duplication.
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

    public function showAddUserPage() {
        return view('user/addUser');
    }

    public function listUsers(){
        $allUsers = User::all();
        return view('user/listUsers', ['users' => $allUsers]);
    }

    public function showEditUserPage($id){
        $user = User::find($id);
        return view('user/editUser', ['user' => $user]);
    }

    // Edits user and updates it on the database.
    public function editUser(Request $request, $id){
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

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect('userList')->with('success', 'User has been successfully deleted.');
    }           

    // Soft deletes many users at once.
    public function deleteUsers(Request $request){
     
        $selectedUsers = $request->input('selectedUsers', []);

        User::whereIn('id', $selectedUsers)->delete();

       return redirect()->back();

    }
}