<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Listing;
use App\Room;
use App\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
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
        $property = null;

        $properties = auth()->user()->listings;

        $types = RoomType::all();

        $rooms = auth()->user()->rooms;

        return view('agent.rooms.index', compact('rooms','property','properties','types'));
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
            'listing' => 'required|exists:listings,id',
            'type' => 'required|exists:room_types,id',
            'name' => 'required|string|max:255',
            'size' => 'string'
        ]);

        $listing = Listing::findOrFail(request('listing'));

        $listing->rooms()->create([
            'room_types_id' => request('type'),
            'name' => request('name'),
            'size' => request('size')
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Item Saved Successfully.'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $invoices = $room->rentals->pluck('invoices')->collapse();
        $properties = $room->listing;

        $listing = array($properties["id"]=>$properties["name"]);
       
        return view('agent.rooms.view',compact('room','invoices','properties','listing'));
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
          request()->validate([
            'listing' => 'required|exists:listings,id',
            'type' => 'required|exists:room_types,id',
            'name' => 'required|string|max:255',
            'size' => 'string'
        ]);

        $room = Room::findOrFail($id);
        $room->listing_id = request('listing');
        $room->room_types_id = request('type');
        $room->name = request('name');
        $room->size = request('size');

        if($room->isDirty()){
            $room->update();
        }

        return response()->json([
            'success' => true,
            'message' => 'Property Unit updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        $room->rentals->each->delete();

        $room->accounts->each->delete();

        $room->delete();



        return response()->json([]);
    }
}
