<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileInformationController extends Controller
{
    public function edit()
    {

        return view('user.edit', [
            'title' => 'edit'
        ]);
    }

    public function update(Request $request)
    {
        $request->user()->update($request->all());

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
}
