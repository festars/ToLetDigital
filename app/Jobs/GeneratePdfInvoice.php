<?php

namespace App\Jobs;

use App\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use ConsoleTVs\Invoices\Classes\Invoice as InGenerator;


class GeneratePdfInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $invoice;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $customer = $this->invoice->tenant;

        $agent = $this->invoice->agent;

        $accounts = $this->invoice->rental->rentable->accounts;

        $invo = InGenerator::make();

        foreach ($accounts as $account) {
            $invo->addItem($account->name, $account->amount, 1, $account->id);
        }
        $invo->number($this->invoice->invoice_id)
            ->business([
                'id'       => $agent->id,
                'name'     => $agent->name,
                'email'    => $agent->email,
                'phone'    => $agent->phone,
                'country'   => $customer->country or 'KENYA',
            ])
            ->customer([
                'id'        => $customer->id * $this->invoice->invoice_id,
                'name'      => $customer->name,
                'email'     => $customer->email,
                'phone'     => $customer->phone,
                'country'   => $customer->country or 'KENYA',
            ])
            ->footnote("Tolet Digital agency   ".$this->invoice->hash)
            ->save("public/invoices/{$this->invoice->agent->id}/{$this->invoice->invoice_id}.pdf");

            $file = Storage::disk('local')->get("public/invoices/{$this->invoice->agent->id}/{$this->invoice->invoice_id}.pdf");
    
             Storage::disk('spaces')->put("invoices/{$this->invoice->agent->id}/{$this->invoice->invoice_id}.pdf",  $file, 'public');
    
            $url =Storage::disk('spaces')->url("invoices/{$this->invoice->agent->id}/{$this->invoice->invoice_id}.pdf");
    
            Storage::disk('local')->delete("public/invoices/{$this->invoice->agent->id}/{$this->invoice->invoice_id}.pdf");

            $this->invoice->invoice_url = $url;

            $this->invoice->update();
    }
}
