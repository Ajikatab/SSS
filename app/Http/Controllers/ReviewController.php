<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('community', [
            'title' => 'Community',
            'reviews' => $reviews
        ]);
    }
    public function userHome()
    {
        $reviews = Review::all();
        $user = Auth::user();
        return view('user.community', [
            'title' => 'Community',
            'user' => $user,
            'reviews' => $reviews
        ]);
    }
}
