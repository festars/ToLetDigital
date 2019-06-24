<?php

namespace App\Http\Controllers\Owner;

use App\Room;
use App\Tenant;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\TenantCreated;
use App\Events\TenantAdjustedEvent;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentals = Auth::user()->rentals->map(function ($rental) {
            if (!empty($rental->tenant_id)) {
                return $rental->tenant;
            }
        });
        
       // dd($rentals);

        return view('owner.tenant.index', compact('rentals'));
    }

    public function search()
    {
        $q = request('q');

        $tenant = Tenant::where('email', 'like', $q.'%')->get();

        return response()->json($tenant);
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
            'idnumber' => 'required|numeric',
            'email' => 'required|email|unique:tenants,email|max:255',
            'aemail' => 'nullable|email|max:255',
            'phone' => 'required|numeric',
            'aphone' => 'nullable|numeric',
            'unit' => 'required|numeric'
        ]);
        
        $pass = Str::random(9);

        $tenant = Tenant::create([
            'name'  => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'aemail' => request('aemail'),
            'aphone' => request('aphone'),
            'country' => request('country'),
            'idnumber' => request('idnumber'),
            'room' => request('unit'),
            'password' => Hash::make($pass),
        ]);

        

        $room = Room::findOrFail(request('unit'));

        $room->rentals()->create([
            'tenant_id' => $tenant->id,
            'owner_id' => auth()->user()->id
        ]);

        event(new TenantCreated($tenant, $pass, auth()->user(), $room));

        return response()->json([
            'success' => true,
            'message' => 'Occupant Saved successfully.'
        ]);
    }

    public function assign(Request $request, Room $room, Tenant $tenant)
    {
        if (!$room->rentals->pluck('tenant_id')->contains($tenant->id)) {
            $room->rentals()->create([
                'tenant_id' => $tenant->id,
                'owner_id' => auth()->user()->id
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Action completed successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        return view('owner.tenant.show',compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        request()->validate([
            'name' => 'required|max:255',
            'idnumber' => 'required|numeric',
            'email' => 'required|email|max:255',
            'aemail' => 'nullable|email|max:255',
            'phone' => 'required|numeric',
            'aphone' => 'nullable|numeric',
        ]);

        $tenant->name = request('name');
        $tenant->email = request('email');
        $tenant->phone = request('phone');
        $tenant->aemail = request('aemail');
        $tenant->aphone = request('aphone');
        $tenant->country = request('country');
        $tenant->idnumber = request('idnumber');

        if($tenant->isDirty()){
            $tenant->update();
        }

        return response()->json([
            'success' => true,
            'message' => 'Action completed successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        $room = $tenant->rentals->where('rentable_id', request('unit'))->first();
        $room->tenants_id =$tenant->id;
        $room->tenant_id = null;
        $room->rental_to = Carbon::now();

        $room->update();

        return response()->json([
            'success' => true,
            'message' => 'Action completed successfully.'
        ]);
    }
    
    public function uploadpic(Request $request,$id)
    {
      //dd(storage_path());
       // $path = Storage::putFile('tenantppic', $request->file('profilepic'), $request->user()->id.".".$request->file('profilepic')->extension()
       // );
        $path = Storage::putFileAs(
    'tenantppic', $request->file('profilepic'), $id.".".$request->file('profilepic')->extension()
);
 
       
       $item = Tenant::findOrFail($id);
       $item->profilepic = $request->root()."/storage/".$path;
       $item->update();
       return redirect()->back();
    }
}
