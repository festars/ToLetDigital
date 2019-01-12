<?php

namespace App\Http\Controllers\Tenant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Tenant;
class SettingsController extends Controller
{
    public function profile(){
        $user=auth()->user();
        $entity='tenant';
        return view("tenant.settings.profile",compact('user','entity'));
    }
    public function uploadpic(Request $request)
    {
      //dd(storage_path());
       // $path = Storage::putFile('tenantppic', $request->file('profilepic'), $request->user()->id.".".$request->file('profilepic')->extension()
       // );
        $path = Storage::putFileAs(
    'tenantppic', $request->file('profilepic'), $request->user()->id.".".$request->file('profilepic')->extension()
);
 
       
       $item = Tenant::findOrFail($request->user()->id);
       $item->profilepic = $request->root()."/storage/".$path;
       $item->update();
       return redirect()->back();
    }
}
