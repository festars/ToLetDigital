<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use App\Mail\VendorWelcome;
use Mail;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors=Vendor::all();
        
        //$vendors = is_null($vendors) ? [] : $vendors;
        
        return view("admin.vendor.index",compact("vendors"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:vendors,email|max:255',
            'altemail' => 'nullable|email|max:255',
            'phone' => 'required|numeric',
            'location' => 'required',
            'type' => 'required',
            'serviceoffered' => 'required',
            'country' => 'required'
        ]);
        
      
        $tenant = Vendor::create([
            'name'  => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'alternativephone' => request('altemail'),
            'location' => request('location'),
            'country' => request('country'),
            'type' => request('type'),
            'serviceoffered' => request('serviceoffered'),
            'agent_id' => auth()->user()->id
            //'password' => Hash::make($pass),
        ]);
        
        
        return response()->json([
            'success' => true,
            'message' => 'Vendor Saved successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
          request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:vendors,email|max:255',
            'aemail' => 'nullable|email|max:255',
            'phone' => 'required|numeric',
            'aphone' => 'nullable|numeric',
            'type' => 'required',
            'serviceoffered' => 'required',
            'country' => 'required',
            'location' => 'required'
        ]);
        
   
        $vendor->name = request('name');
        $vendor->email = request('email');
        $vendor->aemail = request('aemail');
        $vendor->phone = request('phone');
        $vendor->aphone = request('aphone');
        $vendor->type = request('type');
        $vendor->serviceoffered = request('serviceoffered');
        $vendor->country = request('country');
        $vendor->location = request('location');


        if($vendor->isDirty()){
            $vendor->update();
        }

        return response()->json([
            'success' => true,
            'message' => 'Vendor updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vendor deleted successfully.'
            ]);
    }
    
     public function approve($id){
        
       $pass=str_random(10);
       
       $vendor = Vendor::findOrFail($id);
       
       $vendor->password = bcrypt ($pass);
       
       $vendor->approved = 1;
       
       $vendor->update();
       
       Mail::to($vendor->email)->send(new VendorWelcome($vendor,$pass));
      
       
       return redirect()->back()->with('success','Item created successfully!');
        
    }
    
    public function decline($id){
        
       $agent = Vendor::findOrFail($id);
       
       $agent->approved = null;
       
       $agent->update();
       
       return redirect()->back()->with('success','Item created successfully!');
        
    }
}
