<?php

namespace App\Traits;
use Illuminate\Support\Facades\Hash;
use App\Tenant;
use Mailgun\Mailgun;
use DB;
use Session;

use Validator;
/**
 * Keeps a record of methods to generate varous random strings.
 */
trait Mail
{
    /**
     * summary
     */

    public function sendMassMail($labels,$request)
    {
            $names=[];
            $emails=[];
              
              
            
            
            foreach ($labels as $label)
            {

              $email=$label->email;
            
              if(strlen(trim($email)) > 0 && filter_var($email, FILTER_VALIDATE_EMAIL)){
               $names[trim($email)] = [ 
                
                'name'=>ucfirst($label->name),
                
                ];
            
                array_push($emails, $email);
            
                
            }
            }
            
            
            $chuncked_data = array_chunk($names,900,true);
            
            $mgClient = new Mailgun(env("MAILGUN_SECRET"));
            $domain = env("MAILGUN_DOMAIN");
            
            
            foreach ($chuncked_data as $key => $data) {
            
                $result = $mgClient->sendMessage($domain, array(
                    'from' => 'ToletDigital <info@toletdigital.com>',
                    'to' => array_keys($data),
                    'subject' => $request->subject,
                    'html' => $request->message,
                    'recipient-variables' => json_encode($data)
                ));
            
              
               
            }
            


    }

    public function reset($request){
        $prefix=str_replace("/", "", $request->route()->getPrefix()).'s';
         $rules = [  
                          
                'email' => 'required|email|max:30|exists:'.$prefix,
                        
            ];
        $inputs = $request->all();

         $validator = Validator::make($inputs,$rules);

         if($validator->fails()){
            $errors = $validator->messages();
            
             return redirect()->back()->with('errors', $errors);
         }

        $email=$request->input('email');
        $confirmation_code=str_random(30); 

        $user=DB::table($prefix)->where('email',$email)->first();
        if(is_null($user)){

          Session::flash('msg-error','Email does not exist in the system');

          return redirect()->back();

        }

         

          \Mail::send('auth.passwords.resetforgot', ['user' => $user, 'token' => $confirmation_code ], function ($message) use ($user) {
                    $message->to($user->email,$user->name)
                        ->subject('Reset Your Password');
                });
          
    }

    public function validatePassword($request){

       $prefix=str_replace("/", "", $request->route()->getPrefix()).'s';
       $rules = [  
                          
                'password' => 'required|max:6|confirmed',
                'password_confirmation' => 'required|max:6',
                'email' => 'required|email|exists:'.$prefix,
                        
            ];
        $inputs = $request->all();

         $validator = Validator::make($inputs,$rules);

         if($validator->fails()){
            $errors = $validator->messages();
   
             return response()->json([
           
                'success' => false,
                'message' => $errors
            
        ]);
         }

        $auth = DB::table($prefix)->where('email',$request->input('email'))
                    ->update(['password'=>Hash::make($request->input('password'))]);

      return $auth;
    }

    
}
