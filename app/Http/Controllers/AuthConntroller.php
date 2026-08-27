<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthConntroller extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }
    
    public function register()
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

    public function loginStore(Request $request)
    {
        // ফর্ম ভ্যালিডেশন
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

       
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

           
            if (Auth::user()->email === 'admin@gmail.com') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('home');
        }

    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}