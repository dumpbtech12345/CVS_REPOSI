<?php

namespace App\Http\Controllers;

use App\Models\UserSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Show the custom login form.
     */
    public function loginForm()
    {
        return view('auth.login_form'); // View for login
    }
  
    /**
     * Handle login submission.
     */
    public function processLogin(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Find the user
        $user = UserSystem::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Store user in session
            Session::put('logged_in_user', $user);
            return redirect()->route('dashboard.page')->with('success', 'Welcome back, ' . $user->firstname . '!');
        }

        // If login fails
        return back()->withErrors(['login_error' => 'Invalid credentials.']);
    }

    /**
     * Logout the user.
     */
    public function logoutUser()
    {
        Session::forget('logged_in_user'); // Clear session
        return redirect()->route('auth.login_form')->with('success', 'Logged out successfully.');
    }
}
