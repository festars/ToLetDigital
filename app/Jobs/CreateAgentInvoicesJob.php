<?php

namespace App\Jobs;

use App\Agent;
use App\Jobs\GeneratePdfInvoice;
use App\Traits\Generator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateAgentInvoicesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels,Generator;

    protected $date;

    protected $agent;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($date, Agent $agent)
    {
        $this->date = $date;

        $this->agent = $agent;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         $rentalsWithTenants = $this->agent->rentals->filter(function($rental)
        {
            return $rental->tenant ? true : false;
        });

        foreach ($rentalsWithTenants as $rental) {
            if($rental->rentable->accounts->count() > 0){
                    $invoice = $rental->invoices()->create([
                        'invoice_id' => $this->invoiceNumber(),
                        'hash'  => $this->randString(),
                        'agent_id' => $this->agent->id,
                        'tenant_id' => $rental->tenant->id,
                        'currency' =>  $rental->rentable->accounts->first()->currency,
                        'amount' =>  $rental->rentable->total,
                        'month'  => $this->date->month,
                        'year'  => $this->date->year,
                    ]);
                dispatch(new GeneratePdfInvoice($invoice));
            }


        }
    }
}
