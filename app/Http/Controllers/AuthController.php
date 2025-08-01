<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView() {
        return view('pages.auth.login');
    }

    public function login(Request $request) {

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
     
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('/');
            }
     
            return back()->withErrors([
                'email' => 'akun anda sedang diproses admin.',
            ])->onlyInput('email');
        }

        public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
      return redirect('/login');
        }
    }
