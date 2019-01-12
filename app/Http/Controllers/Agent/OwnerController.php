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
    public function index()
    {
        $owner_ids = auth()->user()->listings->pluck('owner_id');

        $owners = Owner::find($owner_ids);

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
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:owners',
            'phone' => 'required|string'
        ]);

         Owner::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
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
