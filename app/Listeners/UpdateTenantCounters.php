<?php

namespace App\Listeners;

use App\Events\TenantActivity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateTenantCounters
{
    public $agent;
    public $owner;
    public $listing;
    public $room;

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
     * @param  TenantActivity  $event
     * @return void
     */
    public function handle(TenantActivity $event)
    {
        $this->room = $event->rental->rentable;
        $this->updateRoomCounts();

        $this->listing = $this->room->listing;
        $this->updateListingsCounts();

        $this->agent = $this->listing->agent;
        $this->updateAgentCounts();

        $this->owner = $this->listing->owner;
        $this->updateOwnerCounts();



    }

    public function updateAgentCounts()
    {
        $this->agent->total_tenants = $this->agent->fresh()->listings->sum('total_tenants');
        $this->agent->update();
    }

    public function updateOwnerCounts()
    {
        $this->owner->total_tenants = $this->owner->fresh()->listings->sum('total_tenants');
        $this->owner->update();
    }

    public function updateListingsCounts()
    {
        $this->listing->total_tenants = $this->listing->rooms->sum('total_tenants');
        $this->listing->update();
    }

    public function updateRoomCounts()
    {
        $this->room->total_tenants = $this->room->tenants->count();
        $this->room->update();
    }
}
