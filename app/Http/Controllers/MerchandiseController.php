<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchandiseController extends Controller
{
    public function index()
    {
        $stores = Merchandise::all();
        return view('store', [
            'title' => 'Store',
            'stores' => $stores
        ]);
    }
    public function userHome()
    {
        $stores = Merchandise::all();
        $user = Auth::user();
        return view('user.store', [
            'title' => 'Store',
            'user' => $user,
            'stores' => $stores
        ]);
    }
}
