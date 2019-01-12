<?php

namespace App\Listeners;

use App\Events\RoomActivity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateRoomCounters
{
    public $agent;
    public $owner;
    public $listing;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RoomActivity  $event
     * @return void
     */
    public function handle(RoomActivity $event)
    {
        $this->listing = $event->room->listing;
          $this->updateListingsCounts();

        $this->agent = $event->room->listing->agent;
        $this->updateAgentCounts();

        $this->owner = $event->room->listing->owner;
        $this->updateOwnerCounts();
    }

    public function updateAgentCounts()
    {
        $this->agent->total_units = $this->agent->fresh()->listings->sum('total_units');
        $this->agent->update();
    }

    public function updateOwnerCounts()
    {
        $this->owner->total_units = $this->owner->fresh()->listings->sum('total_units');
        $this->owner->update();
    }

    public function updateListingsCounts()
    {
        $this->listing->total_units = $this->listing->rooms->count();
        $this->listing->update();
    }
}
