<?php

namespace App\Http\Controllers\Agent;
use App\Http\Controllers\Controller;
use App\Maintenance;
use App\Listing;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
      public function __construct()
    {
        $this->middleware('auth:agent');
    }
    
    public function index()
    {
        $maintenances= Maintenance::where("agent_id",auth()->user()->id)->get();
       
        return view("agent.maintenance.index",compact("maintenances"));
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
        //
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
