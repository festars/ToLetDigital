<?php

namespace App\Http\Controllers\Auth;

use App\Agent;
use App\Http\Controllers\Controller;
use App\Owner;
use App\Tenant;
use App\User;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\AgentWelcomeMail;
use App\Mail\Registration;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required'
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        Agent::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        
        $agent=Agent::where("email",$data["email"])->first();

        
         //Mail::to( $data['email'])->send(new Registration ($agent));
        
        
        // } catch (\Exception $exception) {
        //     logger()->error($exception);
        //     return redirect()->back()->with('message', 'Unable to create new user.');
        // }
       
        return $user;

        
    }

    protected function registered($request, $user)
    {
    
       return redirect('/');
    }

    public function redirectPath()
    {
        return redirect('/');
    }
}
