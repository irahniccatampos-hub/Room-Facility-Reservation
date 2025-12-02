<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'nullable|string|in:user,admin',
            'password' => 'required|string|min:5|confirmed'
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role'     => $validated['role'] ?? 'user',   
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return view('partials.dashboard')->with('success', 'Account Created...');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if($user->role === 'user'){
                return redirect()->route('user.dashboard.show')->with('success', 'AUthenticated...');
            } else {
                return redirect()->route('admin.dashboard.show')->with('success', 'AUthenticated...');
            }
            
        }

        return back()->with('error', 'Wrong Credentials...');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('components.layout')->with('success', 'User Logged out...');
    }
}
