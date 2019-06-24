<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;

class SMSController extends Controller
{
   
    public function sendsms(){
        $username = env('SMS_USERNAME'); // use 'sandbox' for development in the test environment
        $apiKey   = env('SMS_KEY'); // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);
        
        // Get one of the services
        $sms      = $AT->sms();
        
        // Use the service
        $result   = $sms->send([
            'to'      => ['+254721840501'],
            'message' => 'Hello World!'
        ]);
        
        if($result["status"] === "success"){
            dd($result);
        }else{
            dd("nope");
        }
    }
        
    

}
