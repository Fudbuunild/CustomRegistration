<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        if (Auth::check()) {
            return redirect()->intended(route('user.private'));
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $formFields = $request->only(['email', 'password']);

        if (Auth::attempt($formFields)) {
            return redirect()->intended(route('user.private'));
        }

        return back()->withErrors(['formError' => 'Invalid email or password']);
    }
}
