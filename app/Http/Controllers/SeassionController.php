<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeassionController extends Controller
{
    function index()
    {
        return view('login', [
            'title' => 'login' 
        ]);

    }
    function login(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required'=>'Username wajib diisi!',
            'password.required'=>'Password wajib diisi!'
        ]);

        $infologin = [
            'username'=>$request->username,
            'password'=>$request->passowrd
        ];

        if(Auth::attempt($infologin)){
            return 'sukses';
        } else{
            return 'gagal';
        }
    }

}
