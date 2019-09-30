<?php

namespace App\Http\Controllers\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use AfricasTalking\SDK\AfricasTalking;
use App\Traits\Mail;
use App\Owner;

class SMSController extends Controller
{
    use Mail;
    public function __construct()
    {
        $this->middleware('auth:agent');
    }
    public function index(){

        return view("agent.sms");
    }

   
    public function sendsms(Request $request){
        $username = env('SMS_USERNAME'); // use 'sandbox' for development in the test environment
        $apiKey   = env('SMS_KEY'); // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);
         // Get one of the services
        $sms      = $AT->sms();
        $phones   = $request->phones; 
      
        if($request->has('phonefiles')){

            $path = request()->phonefiles->getRealPath();
            $data = Excel::load($path,function($reader) use ($request,$phones) {

                // Getting all results
                $reader->limitColumns(1);
            
             })->get()->toArray(); 

            $results = array_flatten($data);
            $results = array_map(function ($num)
                            {
                              return("+".(int)$num);
                            }, $results);
            $phones = array_merge($results,explode(",", $phones));

                
            
       }
       
 
        // Use the service
        $result   = $sms->send([
            'to'      => $phones,
            'message' => $request->message
        ]);
        
        if($result["status"] === "success"){
            return response()->json([
            
                'success' => true,
                'message' => 'SMS has been sent.'
            ]
        );
        }else{
            return response()->json([
           
                'success' => false,
                'message' => 'SMS not sent.'
            
        ]);
        }
    }

    public function bulkEmail(Request $request){

        // $labels = auth()->user()->owners;
        $labels = Owner::whereIn("email",["wambui.njage@gmail.com","oscaromole@gmail.com"])->get();

       // dd($labels);

        $this->sendMassMail($labels,$request);

        return response()->json([
           
                'success' => true,
                'message' => 'Mass email sent.'
            
        ]);

    }
    
        
    

}
