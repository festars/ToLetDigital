<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Session;
use App\Traits\Mail;

class VendorController extends Controller
{
    use Mail;
    public function __construct()
    {
        $this->middleware('auth:vendor', ['except' => ['showLogin','login','forgotPassword','resetforgotPassword','forgotPass','validatePass']]);
    }

    public function index()
    {
        $data["maintenances"]=auth()->user()->maintenances->count();
        $data["tasks"]=auth()->user()->tasks->count();
        $data["maintenances"]=auth()->user()->maintenances->count();
        return view('vendor.dashboard',compact("data"));
    }

    public function showLogin()
    {
        return view('vendor.login');
    }

    public function login()
    {
        
        request()->validate([
            'username' => 'required|email',
            'password' => 'required',
        ]);

        $credentials =  [
            'email' => request('username'),
            'password' => request('password'),
            'approved' => 1
         ];
        
        if (Auth::guard('vendor')->attempt($credentials)) {
            $url = '/vendor/dashboard';
            return response()->json(['message' => 'Successful Login','url' => $url]);
        }
        
        // dd("gtf");
        
        return response()->json([
            'message' => 'Wrong Password/Email combination.',
            'error' => request()->all()
        ], 401);
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
        return redirect("/vendor/dashboard"); 
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
