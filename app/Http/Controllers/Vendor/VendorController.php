<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor', ['except' => ['showLogin','login']]);
    }

    public function index()
    {
        $data["maintenances"]=auth()->user()->maintenances->count();
        $data["tasks"]=auth()->user()->tasks->count();
        $data["maintenances"]=auth()->user()->maintenances->count();
        return view('vendor.dashboard',compact("data"));
    }

    public function showLogin()
    {
        return view('vendor.login');
    }

    public function login()
    {
        
        request()->validate([
            'username' => 'required|email',
            'password' => 'required',
        ]);

        $credentials =  [
            'email' => request('username'),
            'password' => request('password')
            // 'approved' => 1
         ];
        
        if (Auth::guard('vendor')->attempt($credentials)) {
            $url = '/vendor/dashboard';
            return response()->json(['message' => 'Successful Login','url' => $url]);
        }
        
        // dd("gtf");
        
        return response()->json([
            'message' => 'Wrong Password/Email combination.',
            'error' => request()->all()
        ], 401);
    }
}
