<?php

namespace App\Http\Controllers\Tenant;
use App\Notice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $notices=auth()->user()->notices;
     
       return view("tenant.notices.index",compact("notices"));
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
            'reason' => 'required|string',
            'ptype' => 'required|in:Agent,Owner,Admin',
            'room'  => 'required',
            'movedate'  => 'required|date',
            'comment' => 'required',
            'deposit'=>'accepted',
        ]);
        
        $rental = auth()->user()->rentals->where('id',request('room'))->first();
        
        $commentable =  $rental->agent;

        if (request('ptype') == 'Owner') {
            $commentable =  $rental->rentable->listing->owner;
        }

        $commentable->notices()->create([
            'tenant_id' => auth()->user()->id,
            'reason'  => request('reason'),
            'move_date'   => request('movedate'),
            'comment'=>request('comment'),
            'nodeposit'=>request('deposit'),
            'file'=>request('file'),
        ]);
        
        return $request->all();
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy(Notice $notice)
    {
        $notice->delete();

        return response()->json(['success' => true,
                                'message' => 'Notice deleted successfully.'] );
    }
}
