<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    // regisration 
    public function register() {
        return view('register');
    }

    // submit registration
    public function submitRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:friends,email',
            'password' => 'required|min:6',
        ]);

        // Hash the password before saving
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create the user
        $friend = Friend::create($validatedData);

        // Fire the built-in Registered event to send the email verification link
        event(new Registered($friend));

        // Log the user in (optional but common)
        auth()->login($friend);

        // Redirect to a "verify your email" notice page
        return redirect()->route('verification.notice')->with('success', 'We have sent you an email verification link. Please check your inbox.');
    }
}
