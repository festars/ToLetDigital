<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Task;
use App\Agent;
use App\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where("created_by",Auth::user()->email)->get();
        
        return view('tenant.tasks.index', compact('tasks'));
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
        //dd($request->file('file'));
        
        $data = request()->validate([
            'property'=>'required|exists:rentals,id',
            'tasktype'=>'required|string',
            'duedate'=>'required|date',
            'priortylevel'=>'required|string|in:Normal,Medium,High',
            'details'=>'required|string',
            'file'=>'max:10000',
            'ptype'=>'required|in:Agent,Owner,Admin',
        ]);
        
        $rental = auth()->user()->rentals->where('id',request('property'))->first();
        
        $commentable =  $rental->agent;

        if (request('ptype') == 'Owner') {
            $commentable =  $rental->rentable->listing->owner;
        }

        $commentable->tasks()->create([
            'tenant_id' => auth()->user()->id,
            'complain'  => request('description'),
            'duedate'   => request('duedate'),
            'created_by' => auth()->user()->email,
            'property'=>request('property'),
            'tasktype'=>request('tasktype'),
            'priortylevel'=>request('priortylevel'),
            'details'=>request('details'),
            'file'=>request('file'),
        ]);
  
  //upload file
        return response()->json(['success' => true,'message' => 'Task saved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tenant.tasks.show',compact('task'));
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
      //upload file
      //update assigned to
        $data = request()->validate([
            'property'=>'required|exists:rentals,id',
            'tasktype'=>'required|string',
            'duedate'=>'required|date',
            'priortylevel'=>'required|string|in:Normal,Medium,High',
            'details'=>'required|string',
           
        ]);

        $item = Task::findOrFail($id);

        $item->property = request('property');
        $item->tasktype = request('tasktype');
        $item->duedate = request('duedate');
        $item->priortylevel = request('priortylevel');
        $item->details = request('details');
        
        if(!$item->isDirty())return response()->json([]);

        $item->update();

        return response()->json([
            'success' => true,
            'message' => 'Updated Successfully.'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
       //dd($owner);
        $task->delete();

        return response()->json(['success' => true,
                                'message' => 'Task deleted successfully.'] );
    }
    
}
