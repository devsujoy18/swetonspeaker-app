<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function process_login(Request $request)
    {
        $request->validate([
            'email' =>  'required|email',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            request()->session()->regenerate();
            return redirect()->route('user.dashboard');
        }

        return redirect('login')->with('error', 'Login details are not valid');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }
}
