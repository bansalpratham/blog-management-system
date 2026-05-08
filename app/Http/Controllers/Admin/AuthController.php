<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Manual hardcoded validation
    if ($request->email === 'admin@gmail.com' && $request->password === 'password123') 
    {
        // This manually logs in the user with ID 1 so the middleware works
        $user = \App\Models\User::first(); 
        
        if ($user) {
            Auth::login($user);
            return redirect('/admin/dashboard');
        } else {
            return back()->with('error', 'Database user not found. Please visit /force-create-admin first.');
        }
    }

    return back()->with('error', 'Invalid Credentials');
}

    public function logout()
    {
        Auth::logout();

        return redirect('/admin/login');
    }
}