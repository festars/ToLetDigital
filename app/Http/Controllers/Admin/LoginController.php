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
     public function resetPassword(){
        $user=auth()->user();
       // dd($user);
        return view("auth.passwords.reset",compact('user'));
    }
    
     public function password (Request $request)
    {
        
        
        request()->validate([
             'password' => 'required|string|min:6|confirmed'
        ]);
        
        $agent=auth()->user();

        $agent->password = Hash::make(request('password'));
       

        if($agent->isDirty()){
            $agent->update();
        }
        Session::flash("msg-success","Password changed successfully");
        return redirect("/"); 
    }
}
