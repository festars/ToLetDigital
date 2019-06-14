<?php

namespace App\Mail;
use App\Agent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AgentWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    /**
     * Build the message.
     *
     * @return $this
     */
    public $agent;
     
    public function __construct(Agent $agent,$password)
    {
        $this->agent=$agent;
        $this->password=$password;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.markdown.agent')
                    ->subject('Welcome To ToLet Properities '.$this->agent->name);
    }
}
