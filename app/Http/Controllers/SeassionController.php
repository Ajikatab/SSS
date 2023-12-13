<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeassionController extends Controller
{
    public function login()
    {
        return view('login', [
            'title' => 'login',
            'active' => 'login'

        ]);
    }

}
