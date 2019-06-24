<?php

namespace App\Traits;
use App\Tenant;
use Mailgun\Mailgun;

/**
 * Keeps a record of methods to generate varous random strings.
 */
trait Mail
{
    /**
     * summary
     */
    public function sendMassMail()
    {
            $names=[];
            $emails=[];
            $labels=Tenant::findOrFail(1)->get();
            
            foreach ($labels as $label)
            {
              
              $email=$label->email;
            
              if(strlen(trim($email)) > 0 && filter_var($email, FILTER_VALIDATE_EMAIL)){
               $names[trim($email)] = [ 
                
                'name'=>ucfirst($label->FullName),
                
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
                    'subject' => 'toletdigital',
                    'html' => 'heloo driver',
                    'recipient-variables' => json_encode($data)
                ));
            
              
                echo($key.'<br>');
            }
            

 dd("s");
    }

    
}
