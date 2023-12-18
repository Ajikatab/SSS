<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeassionController extends Controller
{
    public function login()
    {
        return view('login', [
            'title' => 'login',
            'active' => 'login'

        ]);
    }
    public function authenticate(request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:8',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('dashboard.dashboard'); // Redirect to admin dashboard
            } elseif ($user->role === 'user') {
                return redirect()->route('user.home'); // Redirect to user home page
            }
        }

        return back()->withErrors(['username' => 'Invalid username or password']);
    }
    public function logout()
    {
        auth()->logout();

        return redirect('/'); // Ganti dengan rute yang sesuai setelah logout
    }
}
