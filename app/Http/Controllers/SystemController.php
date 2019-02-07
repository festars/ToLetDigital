<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{
    public function index(Request $request)
    {
        return view('main');
    }
    
     public function howitworks(Request $request)
    {
        return view('howitworks');
    }
    
     public function whatyouget(Request $request)
    {
        return view('whatyouget');
    }
    
     public function whyusethesoftware(Request $request)
    {
        return view('whyusethesoftware');
    }

    public function login()
    {
        request()->validate([
            'username' => 'required|email|exists:users,email',
            'password' => 'required',
            'login' => 'required|in:agent,owner,tenant,vendor,demo'
        ]);

        switch (request('login')) {
            default:
                 if (!Auth::attempt(['email' => request('username'), 'password' => request('password')])) {
                     return response()->json(['message' => 'Wrong Password/Email/Login-type combination.'], 401);
                 }
                $url = '/home';
                break;
        }

        return response()->json([
                    'message' => 'Property Owner,Welcome back.',
                    'url' => $url
                ], 200);
    }
}
