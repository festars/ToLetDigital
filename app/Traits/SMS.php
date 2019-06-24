<?php 

namespace App\Traits;

use AfricasTalking\SDK\AfricasTalking;

/**
 * File upload helpers
 */
trait SMS
{
    public function sendsms($phones,$message){
        $username = env('SMS_USERNAME'); 
        $apiKey   = env('SMS_KEY');
        $AT       = new AfricasTalking($username, $apiKey);
        
        // Get one of the services
        $sms      = $AT->sms();
        
        // Use the service
        $result   = $sms->send([
            'to'      => [$phones],
            'message' => $message
        ]);
        
        if($result["status"] === "success"){
            return response()->json([
            'success' => true,
            'message' => 'sms sent'
        ]);
        }else{
            return response()->json([
            'success' => false,
            'message' => 'sms not sent'
        ]);
        }
    }



}
