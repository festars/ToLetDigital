<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.types.index');
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
            'name' => 'required',
            'description' => 'nullable|string'
        ]);
        $ptype = PropertyType::create([
            'name' => request('name'),
            'description' => request('description')
        ]);

        return response()->json([
                'success' => true,
                'message' => 'Property type saved successfully.'
                    ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyType $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyType $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyType $type)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'nullable|string'
        ]);

        $type->name = request('name');

        $type->description = request('description');

        if(!$type->isDirty()) return response()->json(['message' => 'No changes done.'], 200);

        $type->update();

        return response()->json(['message' => 'Updated Successfully.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyType $type)
    {
        $type->delete();

        return response()->json([] ,200);
    }

    public function json()
    {
        $ptypes = PropertyType::paginate();

        return response()->json([
            'success' => true,
            'ptypes' => $ptypes
        ], 200);
    }
}
