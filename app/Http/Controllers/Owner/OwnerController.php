<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

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
        
        $admin=auth()->user();

        $admin->password = Hash::make(request('password'));
       

        if($admin->isDirty()){
            $admin->update();
        }
        Session::flash("msg-success","Password changed successfully");
        return redirect("/owner/dashboard"); 
    }
    
    
}
