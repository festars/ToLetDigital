<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Owner;

class OwnerController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $owners = Owner::all();
        
        //dd($Owners);
        
        return view('admin.owners',compact('owners'));
    }
    
    public function approve($id){
        
       $Owner = Owner::findOrFail($id);
       
       $Owner->isApproved = 1;
       
       $Owner->update();
      
       
       return redirect()->back()->with('success','Item created successfully!');
        
    }
    
    public function decline($id){
        
       $Owner = Owner::findOrFail($id);
       
       $Owner->isApproved = null;
       
       $Owner->update();
       
       return redirect()->back()->with('success','Item created successfully!');
        
    }
    
    public function suspend($id){
        
       $Owner = Owner::findOrFail($id);
       
       $Owner->suspended = 1;
       
       $Owner->update();
      
       
       return redirect()->back()->with('success','Owner has been suspended successfully!');
        
    }
    
    public function unsuspend($id){
        
       $Owner = Owner::findOrFail($id);
       
       $Owner->suspended = null;
       
       $Owner->update();
       
       return redirect()->back()->with('success','Owner has been unsuspended successfully!');
        
    }
}
