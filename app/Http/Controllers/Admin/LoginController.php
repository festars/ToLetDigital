<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function show()
    {
        return view('admin.login');
    }

    public function login()
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials =  [
            'email' => request('email'),
            'password' => request('password')
         ];

        if (!Auth::guard('admin')->attempt($credentials)) {
            return response()->json(['message' => 'Wrong Password/Email/Login-type combination.'], 401);
        }

        return response()->json([
                'message' => 'Welcome back.',
                'url' => route('admin.dashboard')
        ], 200);
    }
}
