<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VendorWelcome extends Mailable
{
    use Queueable, SerializesModels;
    
     public $vendor;
     public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vendor,$password)
    {
        $this->vendor=$vendor;
        $this->password=$password;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.vendor.welcome')
        ->subject('Welcome To ToLet Properities '.$this->vendor->name)
        ->with(["vendor"=>$this->vendor,
                "password"=>$this->password]);
    }
}
