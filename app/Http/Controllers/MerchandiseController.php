<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use Illuminate\Http\Request;

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
}
