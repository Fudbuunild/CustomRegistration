<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function save(Request $request) {
        if (Auth::check()) {
            return redirect()->to('user.private');
        }

        $validateFields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        $validateFields['password'] = Hash::make($validateFields['password']);

        $user = User::create($validateFields);

        if ($user) {
            Auth::login($user);
            return redirect()->to(route('user.private'));
        }

        return back()->withErrors(['formError' => 'Error when saving user in the database']);
    }
}
