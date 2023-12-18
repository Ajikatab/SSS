<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('user.home', [
            'title' => 'Home USER',
        ]);
    }
}
