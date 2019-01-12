<?php

namespace App\Events;

use App\Room;
use App\Agent;
use App\Tenant;
use Illuminate\Support\Facades\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TenantCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tenant;

    public $agent;

    public $room;

    public $password;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tenant $tenant, $pass, Agent $agent, Room $room)
    {
        $this->tenant = $tenant;
        $this->agent = $agent;
        $this->room = $room;
        $this->password = $pass;
    }
}
