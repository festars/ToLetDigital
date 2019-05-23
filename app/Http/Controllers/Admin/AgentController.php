<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agent;

class AgentController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $agents = Agent::all();
        
        //dd($agents);
        
        return view('admin.agents',compact('agents'));
    }
    
    public function approve($id){
        
       $agent = Agent::findOrFail($id);
       
       $agent->isApproved = 1;
       
       $agent->update();
      
       
       return redirect()->back()->with('success','Item created successfully!');
        
    }
    
    public function decline($id){
        
       $agent = Agent::findOrFail($id);
       
       $agent->isApproved = null;
       
       $agent->update();
       
       return redirect()->back()->with('success','Item created successfully!');
        
    }
    
    public function suspend($id){
        
       $agent = Agent::findOrFail($id);
       
       $agent->suspended = 1;
       
       $agent->update();
      
       
       return redirect()->back()->with('success','Agent has been suspended successfully!');
        
    }
    
    public function unsuspend($id){
        
       $agent = Agent::findOrFail($id);
       
       $agent->suspended = null;
       
       $agent->update();
       
       return redirect()->back()->with('success','Agent has been unsuspended successfully!');
        
    }
}
