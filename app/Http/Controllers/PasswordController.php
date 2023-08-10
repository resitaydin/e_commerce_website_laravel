<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PasswordController extends Controller
{
    public function showForgetPasswordPage()
    {
        return view('auth/forgetPassword');
    }

    public function forgetPassword(Request $request)
    {
        session(['username' => $request->username]);
        
        $request->validate([
            'email' => 'required|email',
            'username' => 'required|exists:users',
        ]);

        $token = Str::random(64); // generating random 64 bit token.

        DB::table('password_resets')->insert([
            'username' => $request->username,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('emails/forgetPasswordEmail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Reset Password');
        });

        return redirect()->route('showForgetPasswordPage')
            ->with('success', 'We have sent an email to reset the password.');
    }

    public function resetPassword(Request $request)
    {
        $username =  session('username');

        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'username' => $username,
                'token' => $request->token,
            ])->first();

        if (!$updatePassword) {
            return redirect()->route('showResetPasswordPage', ['token' => $token])
                ->with('error', 'Invalid.');
        }

        User::where('username', $username) // hashing the password and updating it.
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets') // deleting existing record of user's password reset in db.
            ->where('username', $username)
            ->delete();

        return redirect()->route('showLoginPage')
            ->with('success', 'Password reset success.');
    }

    public function showResetPasswordPage($token)
    {
        return view('auth/resetPassword', compact('token'));
    }

        // password can be resetted without entering username so no need for this anymore.
        // $userToken = DB::table('password_resets') //fetchin user token from db.
        //     ->where('username', $username)
        //     ->value('token');

        // if ($userToken !== $request->token) { // checking if the user tries to change someone else's password.
        //     return back()->with('error', 'Username is wrong.');
        // }
}
