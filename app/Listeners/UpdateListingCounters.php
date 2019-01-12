<?php

namespace App\Listeners;

use App\Events\ListingActivity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateListingCounters
{
    public $agent;

    public $owner;
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
     * @param  ListingActivity  $event
     * @return void
     */
    public function handle(ListingActivity $event)
    {
        $this->agent = $event->listing->agent;
        $this->owner = $event->listing->owner;

        $this->updateAgentCounts();
        $this->updateOwnerCounts();
    }

    public function updateAgentCounts()
    {
        $this->agent->total_listings = $this->agent->listings->count();
        $this->agent->update();
    }

    public function updateOwnerCounts()
    {
        $this->owner->total_listings = $this->owner->listings->count();
        $this->owner->update();
    }
}
