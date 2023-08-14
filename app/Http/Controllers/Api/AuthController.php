<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function checkLogin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required|alpha_num',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        if (Auth::attempt($validator->validated())) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'message' => 'Login successful.',
                'api_token' => $token,
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid username or password.'
        ], 401);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        // Revoke the user's current token
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ], 200);
    }
}
