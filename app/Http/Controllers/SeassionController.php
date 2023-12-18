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
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        dd('berhasil login');
    }

}
