<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Listing;

class ListingController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $listings = Listing::whereNull("status")->get();
        
        //dd($Listings);
        
        return view('admin.listing',compact('listings'));
    }
    
    public function approve($id){
        
       $listings = Listing::findOrFail($id);
       
       $listings->status = 1;
       
       $listings->update();
      
       
       return redirect()->back()->with('msg-success','Item created successfully!');
        
    }
    
    public function decline($id){
        
       $listings = Listing::findOrFail($id);
       
       $listings->status = null;
       
       $listings->update();
       
       return redirect()->back()->with('success','Item created successfully!');
        
    }
    
    public function suspend($id){
        
       $listings = Listing::findOrFail($id);
       
       $listings->suspended = 1;
       
       $listings->update();
      
       
       return redirect()->back()->with('success','Listing has been suspended successfully!');
        
    }
    
    public function unsuspend($id){
        
       $listings = Listing::findOrFail($id);
       
       $listings->suspended = null;
       
       $listings->update();
       
       return redirect()->back()->with('success','Listing has been unsuspended successfully!');
        
    }
}
