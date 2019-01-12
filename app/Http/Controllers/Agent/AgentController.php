<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agent;
use DB;


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
        if (!Auth::guard('agent')->attempt(['email' => request('username'), 'password' => request('password')])) {
            return response()->json(['message' => 'Wrong Password/Email combination.'], 401);
        }
        $url = '/agent/dashboard';

        return response()->json(['message' => 'Successful Login','url' => $url]);
    }
    
    public function resetPassword(){
        return view("auth.passwords.reset");
    }
}
