<?php

namespace App\Http\Controllers\Tenant;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Traits\Mail;
use Session;

class TenantController extends Controller
{
    use Mail;
    
    public function __construct()
    {
        
        $this->middleware('auth:tenant', ['except' => ['showLogin','login','forgotPassword','resetforgotPassword','forgotPass','validatePass']]);
    }
        

    public function index()
    {
        $rentals = auth()->user()->rentals;
        dd(auth()->user()->rentals->first()->rentable->listing->name);
        return view('tenant.dashboard', compact('rentals'));
    }

    public function show(Room $room)
    {
        $allinvoices = $room->rentals->pluck('invoices')->collapse();

        $invoices =  $allinvoices->filter(function($invoice){
            return $invoice->tenant_id == Auth::user()->id;
        });

        return view('tenant.rooms.view', compact('room','invoices'));
    }

    public function showLogin()
    {
        return view('tenant.login');
    }

    public function login()
    {
        if (!Auth::guard('tenant')->attempt(['email' => request('username'), 'password' => request('password'),'isApproved' => 1])) {
            return response()->json(['message' => 'Wrong Password/Email combination.'], 401);
        }
        $url = '/tenant/dashboard';

        return response()->json(['message' => 'Successful Login','url' => $url]);
    }
        
      public function resetPassword(){
        $user=auth()->user();
       // dd($user);
        return view("auth.passwords.reset",compact('user'));
    }
    
     public function password (Request $request)
    {
        
        
        request()->validate([
             'password' => 'required|string|min:6|confirmed'
        ]);
        
        $admin=auth()->user();

        $admin->password = Hash::make(request('password'));
       

        if($admin->isDirty()){
            $admin->update();
        }
        Session::flash("msg-success","Password changed successfully");
        return redirect("/tenant/profile"); 
    }
    
    public function test(){
        
        $this->sendMassMail();
    }
    public function forgotPass(Request $request){

        $this->reset($request);
        Session::flash('msg-success','Success! Check email to finish resetting your password');

        return redirect("/agent/login");

    }

    public function forgotPassword(){

        return view("auth.passwords.forgot");

    }

    public function resetforgotPassword(){
      //$email=;
      $email=urldecode(decrypt($_GET["email"]));
     return view('auth.reset',compact('email'));
    }

    public function validatePass(Request $request){
        $prefix=str_replace("/", "", $request->route()->getPrefix());
        $auth = $this->validatePassword($request);
        if($auth){
          Session::flash('msg-success','Password Reset successful');
          return redirect($prefix."/login");
      }
      else {
         Session::flash('msg-error','Something went wrong');
         return redirect($prefix."/login");
      }
    }
}
