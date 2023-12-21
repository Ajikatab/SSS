<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller

{
    public function index()
    {
        return view('register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|min:8|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:20'
        ]);

        User::create($validateData);

        return redirect('/login')->with('status', 'Registrasi Berhasil, Silahkan Login');
    }
}
