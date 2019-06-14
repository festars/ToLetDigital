<?php

namespace App\Http\Controllers\Tenant;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

class TenantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:tenant', ['except' => ['showLogin','login']]);
    }
        

    public function index()
    {
        $rentals = auth()->user()->rentals;
        return view('tenant.dashboard', compact('rentals'));
    }

    public function show(Room $room)
    {
        $allinvoices = $room->rentals->pluck('invoices')->collapse();

        $invoices =  $allinvoices->filter(function($invoice){
            return $invoice->tenant_id == Auth::user()->id;
        });

        return view('tenant.rooms.view', compact('room','invoices'));
    }

    public function showLogin()
    {
        return view('tenant.login');
    }

    public function login()
    {
        if (!Auth::guard('tenant')->attempt(['email' => request('username'), 'password' => request('password'),'isApproved' => 1])) {
            return response()->json(['message' => 'Wrong Password/Email combination.'], 401);
        }
        $url = '/tenant/dashboard';

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
        return redirect("/tenant/profile"); 
    }
}
