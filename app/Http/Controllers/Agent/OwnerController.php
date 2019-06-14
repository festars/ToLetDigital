<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Listing;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\OwnerWelcomeMail;

class OwnerController extends Controller
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
        // $listings = auth()->user()->listings->where("agent_id",auth()->user()->id);
        // dd($listings);
        // $owners=[];
        // foreach($listings as $listing){
        //     array_push($owners,$listing->owner);
        // }
        

        $owners = Owner::all();

        return view('agent.owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:owners',
            'aemail' => 'required|string|email|max:255',
            'phone' => 'required|string',
            'altphone' => 'required|string'
        ]);

         Owner::create([
            'name' => request('name'),
            'email' => request('email'),
            'alternative_email' => request('aemail'),
            'phone' => request('phone'),
            'alternative_phone' => request('altphone'),
            'password' => Hash::make('secret'),
            'country'  => request('country'),
        ]);
        
        $owner = Owner::where("email",request('email'))->first();
        
        //send email with user credentails
        Mail::to(request('email'))->send(new OwnerWelcomeMail ($owner));

         return response()->json([
            'success' => true,
            'message' => 'Owner saved successfully.'
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
    public function update(Request $request, Owner $owner)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:owners',
        ]);

        $owner->name = request('name');

        $owner->email = request('email');

        if(!$owner->isDirty()) return response()->json(['message' => 'No changes done.'], 200);

        $owner->update();

        return response()->json(['message' => 'Updated Successfully.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
       //dd($owner);
        $owner->delete();

        return response()->json(['success' => true,
                                'message' => 'Owner deleted successfully.'] );
    }
    
   
}
