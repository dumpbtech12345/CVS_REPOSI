<?php

namespace App\Http\Controllers;

use App\Models\UserSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserSystemController extends Controller
{
    // Registration methods (unchanged)
    public function create()
    {
        return view('register');
    }

    // Registration methods (unchanged)
    public function createCv()
    {
        return view('create_cv');
    }



    

    public function register_users(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user_system,username',
            'password' => 'required|string|min:8',
            'email' => 'required|email|max:255|unique:user_system,email',
            'number' => 'required|string|max:15',
            'role' => 'required|string|in:admin,user', 
        ]);

        UserSystem::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'number' => $request->number,
            'role' => $request->role, 
        ]);

        return redirect()->route('register_user_view')->with('success', 'User registered successfully!');
    }

    // Login methods
    public function loginForm()
    {
        return view('login');
    }

    public function processLogin(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Find the user by username
    $user = UserSystem::where('username', $request->username)->first();

    // Check if user exists and password is correct
    if ($user && Hash::check($request->password, $user->password)) {
        // Store user data in session
        Session::put('user', [
            'id' => $user->id,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'role' => $user->role,
        ]);

        // Redirect based on role
        if ($user->role === 'admin') {
            return redirect()->route('dashboard')->with('success', 'Welcome back, ' . $user->firstname . '!');
        } elseif ($user->role === 'user') {
            return redirect()->route('userdashboard')->with('success', 'Welcome back, ' . $user->firstname . '!');
        }
    }

    // Login failed
    return back()->withErrors(['login_error' => 'Invalid username or password.']);
}


public function logout()
{
    Session::forget('user');
    return redirect()->route('user.loginForm')->with('success', 'Logged out successfully!');
}

public function monitorAccountsss()
{
    $users = UserSystem::all(); // Fetch all users
    return view('monitor-accounts', compact('users')); // Correct Blade file name
}
public function updateRole(Request $request, $id)
{
    $request->validate([
        'role' => 'required|string|in:admin,user',
    ]);

    $user = UserSystem::findOrFail($id);
    $user->role = $request->role;
    $user->save();

    return redirect()->route('monitor')->with('success', 'Role updated successfully!');
}

public function deleteUser($id)
{
    $user = UserSystem::findOrFail($id);
    $user->delete();

    return redirect()->route('monitor')->with('success', 'User deleted successfully!');
}


}
