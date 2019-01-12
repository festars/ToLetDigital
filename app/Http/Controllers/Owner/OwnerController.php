<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner', ['except' => ['showLogin','login']]);
    }

    public function index()
    {
        return view('owner.dashboard');
    }

    public function showLogin()
    {
        return view('owner.login');
    }

    public function login()
    {
        if (!Auth::guard('owner')->attempt(['email' => request('username'), 'password' => request('password')])) {
            return response()->json(['message' => 'Wrong Password/Email combination.'], 401);
        }
        $url = '/owner/dashboard';

        return response()->json(['message' => 'Successful Login','url' => $url]);
    }
}
