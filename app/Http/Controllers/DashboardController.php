<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        // dd($users);
        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'users' => $users,
        ]);
    }
}
