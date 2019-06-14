<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Agent;
use DB;
use Session;


class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:agent', ['except' => ['showLogin','login','resetPassword']]);
    }

    public function index()
    {
        $data=Agent::where('email',Auth::user()->email)->withCount(["complains","rooms", 
        'invoices AS paid_invoices' => function ($query) {
                 $query->where('paid', true);
             },
        'invoices AS unpaid_invoices' => function ($query) {
                 $query->where('paid', false);
             },
        'rooms AS rent_total' => function ($query) {
            $query->select(DB::raw("SUM(total) as paidsum"));
        }])->first();
  
        return view('agent.dashboard',compact("data"));
    }

    public function showLogin()
    {
        return view('agent.login');
    }

    public function login()
    {
        if (!Auth::guard('agent')->attempt(['email' => request('username'), 'password' => request('password'),'isApproved'=>1])) {
            return response()->json(['message' => 'Wrong Password/Email combination.'], 401);
        }
        $url = '/agent/dashboard';

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
        
        $agent=auth()->user();

        $agent->password = Hash::make(request('password'));
       

        if($agent->isDirty()){
            $agent->update();
        }
        Session::flash("msg-success","Password changed successfully");
        return redirect("agent/profile"); 
    }
}
