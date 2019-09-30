<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Listing;
use App\Owner;
use App\PropertyType;
use App\PaymentOptions;
use App\PaymentTypes;
use Illuminate\Http\Request;

class ListingController extends Controller
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
        $listings      = auth()->user()->listings;
        $owner_ids     = auth()->user()->listings->pluck('owner_id');
        $pmodes        = PaymentOptions::all();
        $payment_types = PaymentTypes::all();
        $owners      = Owner::where("agent_id",auth()->user()->id)->get();
       // $owners        = Owner::all();
        $ptypes        = PropertyType::get();
        
      // dd($listings);

        return view('agent.listings.index', compact('listings','owners','ptypes','pmodes','payment_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners=Owner::all();
        dd($owners);
        return view('agent.listings.create', compact('owners','ptypes'));
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
            'owner'       => 'required|exists:owners,id',
            'country'     => 'required',
            'ptype'       => 'required|exists:property_types,id',
            //'pmode'       => 'required|exists:payment_modes,id',
            'name'        => 'required|string|max:255',
            'land'        => 'nullable|string|max:255',
            'color'       => 'nullable|string|max:255',
            'description' => 'nullable|string'
        ]);

        $listing = auth()->user()->listings()->create([
            'owner_id'           => request('owner'),
            'property_type_id'   => request('ptype'),
            'name'               => request('name'),
           // 'payment_options_id' => request('pmode'),
            'land'               => request('land'),
            'color'              => request('color'),
            'description'        => request('description'),
            'country'            => request('country')
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Property saved successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        request()->validate([
            'owner' => 'required|exists:owners,id',
            'ptype' => 'required|exists:property_types,id',
            'name' => 'required|string|max:255',
            'land' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'country' => 'nullable|string'
        ]);

        $listing->name = request('name');
        $listing->land = request('land');
        $listing->color = request('color');
        $listing->description = request('description');
        $listing->property_type_id = request('ptype');
        $listing->owner_id = request('owner');
        $listing->location = request('location');
        $listing->country = request('country');


        if($listing->isDirty()){
            $listing->update();
        }

        return response()->json([
            'success' => true,
            'message' => 'Property updated successfully.'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return response()->json([]);
    }
}
