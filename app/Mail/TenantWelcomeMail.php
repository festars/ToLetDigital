<?php

namespace App\Mail;

use App\Events\TenantCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TenantWelcomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tenant;

    public $agent;

    public $room;

    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function handle(TenantCreated $event)
    {
        $this->tenant = $event->tenant;
        $this->agent = $event->agent;
        $this->room = $event->room;
        $this->password = $event->password;


        $this->to($this->tenant->email)
         ->send(app(\Illuminate\Contracts\Mail\Mailer::class));
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome '.$this->tenant->name)->markdown('emails.tenant.welcome');
    }
}
