<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function listUsers(){
        $users = User::all();
        if(!$users){
            return response()->json([
                'message' => 'No users found.'
            ],404);
        }
        return response()->json([
            'users' => $users
        ],200);
    }

    public function addUser(Request $request){
        // Validate input data
        $validator = Validator::make($request->all(), [
            'username' => [
                'required', 'alpha_num',
                Rule::unique('users')->whereNull('deleted_at'),
            ],
            'userTitle' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Hash the password
        $validatedData = $validator->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create the user
        $user = User::create($validatedData);

        if ($user) {
            return response()->json([
                'message' => 'User successfully created.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to create user. Something went wrong.'
            ], 500);
        }
    }

    public function editUser(Request $request, $id) {
        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found.'
            ], 404);
        }

        // Validate input data
        $validator = Validator::make($request->all(), [
            'username' => 'required|alpha_num|unique:users,username,' . $id,
            'userTitle' => 'required',
            'password' => 'min:6|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Update the user with the validated data
        $user->update($validator->validated());

        return response()->json([
            'message' => 'User has been successfully updated.'
        ], 200);
    }

    public function deleteUser($id){
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'message' => 'User not found!'
            ],404);
        }

        $user->delete();
        return response()->json([
            'message' => 'User has been successfully deleted.'
        ],200);
    }   

}