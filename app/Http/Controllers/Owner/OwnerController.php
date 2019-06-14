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
            $data["listings"] = auth()->user()->listings->count();
            $data["units"] = auth()->user()->units->count();
            $data["complains"] = auth()->user()->complains->count();
            $data["tasks"] = auth()->user()->tasks->count();
            $data["notices"] = auth()->user()->notices->count();
            $data["maintenances"] = auth()->user()->maintenances->count();
            $data["expenses"] =  auth()->user()->expenses->count();
            
        return view('owner.dashboard',compact("data"));
    }

    public function showLogin()
    {
        return view('owner.login');
    }

    public function login()
    {
        if (!Auth::guard('owner')->attempt(['email' => request('username'), 'password' => request('password'),'isApproved' => 1])) {
            return response()->json(['message' => 'Wrong Password/Email combination.'], 401);
        }
        $url = '/owner/dashboard';

        return response()->json(['message' => 'Successful Login','url' => $url]);
    }
    
    
}
