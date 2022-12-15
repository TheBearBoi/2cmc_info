<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
/**
* Handle an authentication attempt.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\RedirectResponse
 */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect()->intended('cube_list');
        }

        return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
