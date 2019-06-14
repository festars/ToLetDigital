<?php

namespace App\Http\Controllers\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Agent;
class SettingsController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth:agent');
    }
    
    public function profile(){
        $user=auth()->user();
        $entity='agent';
        return view("agent.settings.profile",compact('user','entity'));
    }
    public function uploadpic(Request $request)
    {
      //dd(storage_path());
       // $path = Storage::putFile('tenantppic', $request->file('profilepic'), $request->user()->id.".".$request->file('profilepic')->extension()
       // );
        $path = Storage::putFileAs(
    'agentppic', $request->file('profilepic'), $request->user()->id.".".$request->file('profilepic')->extension()
);
 
       
       $item = Agent::findOrFail($request->user()->id);
       $item->profilepic = $request->root()."/storage/".$path;
       $item->update();
       return redirect()->back();
    }
}
