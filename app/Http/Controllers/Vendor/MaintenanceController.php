<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;
use App\Maintenance;
use App\Listing;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances= auth()->user()->maintenances;
      
        return view("vendor.maintenance.index",compact("maintenances"));
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
        
        $data = request()->validate([
            
            'property'=>'required|exists:listings,id',
            'unit'=>'required|exists:rooms,id',
            'duedate'=>'required|date',
            'maintenancetype'=>'required|string|in:Periodic Maintenance,Preventive Maintenance,Emergency Maintenance',
            'cause'=>'required|string|in:Renters Fault,General Fault',
            'notes'=>'required|string',
            'action'=>'required|string',
            'cost'=>'required|numeric',
            'ptype'=>'required|in:Landlord,Owner,Admin',
        ]);
        
        $rental = auth()->user()->listings->where('id',request('property'))->first();
        
        $commentable =  $rental->owner;

        // if (request('ptype') == 'Owner') {
        //     $commentable =  $rental->rentable->listing->owner;
        // }

        $commentable->maintenances()->create([
            'agent_id' => auth()->user()->id,
            'cause'  => request('cause'),
            'duedate'   => request('duedate'),
            'action' => request('action'),
            'property'=>request('property'),
            'unit'=>request('unit'),
            'maintenancetype'=>request('maintenancetype'),
            'notes'=>request('notes'),
            'cost'=>request('cost'),
            
        ]);
        
  
  //upload file
        return response()->json(['success' => true,'message' => 'Maintenance saved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        return view("vendor.maintenance.view",compact("maintenance"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        //
    }
    
    public function approve(Request $request, $id)
    {
        $maintenance=Maintenance::find($id);
        $maintenance->approved = 1;
        $maintenance->approvedon = Carbon::now();
        $maintenance->declinedon = null;
        $maintenance->update();
        Session::flash("msg-success","Maintenance approved");
        return redirect()->back();
    }
    
    public function decline(Request $request,$id)
    {
        $maintenance=Maintenance::find($id);
        $maintenance->approved = 0;
        $maintenance->approvedon = null;
        $maintenance->declinedon = Carbon::now();
        $maintenance->save();
        Session::flash("msg-success","Maintenance declined");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
}
