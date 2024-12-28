<?php

// app/Http/Controllers/AdminLoginController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function dashboard()
    {
    // Fetch artists and their songs
    $artists = DB::table('songs')
        ->select('Artist', DB::raw('GROUP_CONCAT(Song SEPARATOR ", ") as Songs'))
        ->groupBy('Artist')
        ->get();

    return view('admin.dashboard', compact('artists'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
