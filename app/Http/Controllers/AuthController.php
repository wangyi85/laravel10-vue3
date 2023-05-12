<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request) {        
        $email = $request->input('email');

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = DB::table('users')->where('email', $email)->get();
            if (count($user) == 0) {
                return response()->json([
                    'status' => 'no user',
                    'comment' => 'No user that has such an email and password.'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'info' => array(
                    'name' => $user[0]->name,
                    'email' => $user[0]->email,
                    'password' => $user[0]->password
                )
            ]);   
        }

        return response()->json([
            'status' => 'failed',
            'comment' => 'Invalid email or password'
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function dashboard() {
        if (Auth::check()) {
            return redirect('dashboard');
        }

        return redirect('login')->withSuccess('You are not allowed to access.');
    }
}
