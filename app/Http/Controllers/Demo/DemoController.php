<?php

namespace App\Http\Controllers\Demo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:demo', ['except' => ['showLogin','login']]);
    }

    public function index()
    {
        return view('demo.dashboard');
    }

    public function showLogin()
    {
        return view('demo.login');
    }

    public function login()
    {
        if (!Auth::guard('demo')->attempt(['email' => request('username'), 'password' => request('password')])) {
            return response()->json(['message' => 'Wrong Password/Email combination.'], 401);
        }
        $url = '/demo/dashboard';

        return response()->json(['message' => 'Successful Login','url' => $url]);
    }
}
