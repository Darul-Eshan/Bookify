<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthConntroller extends Controller
{
    function login()
    {
        return view('frontend.auth.login');
    }
    function register()
    {
        return view('frontend.auth.register');
    }

    public function registerStore(Request $request)
    {
        // 1. Validation Logic
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'phone_number'  => 'required|string|max:15',
            'password'      => 'required|string|min:8|confirmed',
        ]);

        // 2. User Create Logic
        User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'password'     => Hash::make($request->password),
        ]);

        // 3. Redirect after success
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
