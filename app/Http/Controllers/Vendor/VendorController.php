<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor', ['except' => ['showLogin','login']]);
    }

    public function index()
    {
        return view('vendor.dashboard');
    }

    public function showLogin()
    {
        return view('vendor.login');
    }

    public function login()
    {
        if (!Auth::guard('vendor')->attempt(['email' => request('username'), 'password' => request('password')])) {
            return response()->json(['message' => 'Wrong Password/Email combination.'], 401);
        }
        $url = '/vendor/dashboard';

        return response()->json(['message' => 'Successful Login','url' => $url]);
    }
}
