<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use AfricasTalking\SDK\AfricasTalking;

class SMSController extends Controller
{
    public function index(){

        return view("agent.sms");
    }

   
    public function sendsms(Request $request){
        $username = env('SMS_USERNAME'); // use 'sandbox' for development in the test environment
        $apiKey   = env('SMS_KEY'); // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);
         // Get one of the services
        $sms      = $AT->sms();

        if($request->has('phonefiles')){
dd($request->all());
            $path = request()->phonefiles->getRealPath();
            $data = Excel::load($path)->get();
 
        if($data->count()){
            foreach ($data as $key => $value) {
                dd($value);
               // $arr[] = ['MobileNumber' => $value->title];
            }
 
            if(!empty($arr)){
                Item::insert($arr);
            }
        }
        }        
       
        
        // Use the service
        $result   = $sms->send([
            'to'      => [$request->phones],
            'message' => $request->message
        ]);
        
        if($result["status"] === "success"){
            return response()->json([
            'data' => [
                'success' => true,
                'message' => 'SMS has been sent.'
            ]
        ]);
        }else{
            return response()->json([
            'data' => [
                'success' => false,
                'message' => 'SMS not sent.'
            ]
        ]);
        }
    }
        
    

}
