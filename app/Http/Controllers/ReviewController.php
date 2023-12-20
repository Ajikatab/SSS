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

    public function create()
    {
        return view('posts.create');
    }

    // Store a new post
    public function store(Request $request)
    {
        // Validate the form data
        // $request->validate([
        //     'username' => 'required|string|max:255',
        //     'comment' => 'required|string',
        //     'review_date' => 'required|date',
        //     'rating' => 'required|numeric|min:1|max:5',
        //     'image' => 'required|url',
        // ]);

        // Create a new post
        $reviews = new Review();
        $reviews->username = $request->username;
        $reviews->comment = $request->comment;
        $reviews->review_date = $request->review_date;
        $reviews->rating = $request->rating;
        $reviews->image = $request->image;
        $reviews->save();

        // Redirect to a success page or any other page
        return redirect('user/community')->with('success', 'Post created successfully');
    }
}
