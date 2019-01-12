<?php

namespace App\Http\Controllers\Tenant;
use App\Complain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplainsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:tenant');
    }

    public function index()
    {
        $complains = auth()->user()->complains;
        return view('tenant.complains.index', compact('complains'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'description' => 'required|string',
            'ptype' => 'required|in:Agent,Owner,Admin',
            'room'  => 'required',
            'duedate'  => 'required|date',
        ]);
        
        $rental = auth()->user()->rentals->where('id',request('room'))->first();
        
        $commentable =  $rental->agent;

        if (request('ptype') == 'Owner') {
            $commentable =  $rental->rentable->listing->owner;
        }

        $commentable->complains()->create([
            'tenant_id' => auth()->user()->id,
            'complain'  => request('description'),
            'duedate'   => request('duedate')
        ]);
        
       return response()->json(['success' => true,
                                'message' => 'Complain created successfully.'] );
    }
    public function destroy(Complain $complain)
    {
       //dd($owner);
        $complain->delete();

        return response()->json(['success' => true,
                                'message' => 'Complain deleted successfully.'] );
    }
}
