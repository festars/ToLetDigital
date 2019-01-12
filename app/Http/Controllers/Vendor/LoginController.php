<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:vendor');
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

        if(!Auth::guard('vendor')->attempt($credentials)){
            return response()->json(['message' => 'Wrong Password/Email/Login-type combination.'],401);
        }

        return response()->json([
                'message' => 'Welcome back.',
                'url' => route('vendor.dashboard')
            ],200);
    }
}
