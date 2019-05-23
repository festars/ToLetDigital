<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Listing;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }
    
    public function index(){
        $listings = auth()->user()->listings;
        
        return view("owner.listings.index",compact("listings"));
    }
    
    public function units($id){
        
        $units = Listing::find($id)->rooms;
        //dd($units);
        return view("owner.listings.units",compact("units"));
    }
    
     public function show(Listing $listing)
    {
        return view("owner.listings.view",compact("listing"));
    }
    
}