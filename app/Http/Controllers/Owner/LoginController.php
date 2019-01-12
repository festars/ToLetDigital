<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:owner');
    }

    public function login()
    {
        request()->validate([
            'username' => 'required|email',
            'password' => 'required'
        ]);

        $credentials =  [
            'email' => request('username'),
            'password' => request('password')
         ];

        if(!Auth::guard('owner')->attempt($credentials)){
            return response()->json(['message' => 'Wrong Password/Email/Login-type combination.'],401);
        }

        return response()->json([
                'message' => 'Welcome back.',
                'url' => route('owner.dashboard')
            ],200);
    }
}
