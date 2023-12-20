<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        return view('home', [
            'title' => 'Home',

        ]);
    }
    public function userHome()
    {
        $user = Auth::user();
        return view('user.home', [
            'title' => 'Home',
            'user' => $user,
        ]);
    }
}
