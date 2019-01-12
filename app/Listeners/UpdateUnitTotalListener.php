<?php

namespace App\Listeners;

use App\Events\AccountActivity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUnitTotalListener implements ShouldQueue
{
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
     * @param  AccountsUpdatedEvent  $event
     * @return void
     */
    public function handle(AccountActivity $event)
    {
        $room = $event->account->accountable;



        $total = $room->fresh()->accounts->sum('amount');

        $room->total = $total;

        $room->update();

    }
}
