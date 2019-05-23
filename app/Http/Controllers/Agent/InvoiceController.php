<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\Jobs\CreateAgentInvoicesJob;
use App\Mail\SendInvoiceMail;
use App\Traits\Generator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{

    use Generator;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('type') === 'unpaid'){
            $invoices =Invoice::unpaid()->where('agent_id',auth()->user()->id)->with('rental')->get();
          //  dd($invoices);
        }else{
           $invoices =Invoice::paid()->where('agent_id',auth()->user()->id)->with('rental')->get();
        }
        
       // dd($invoices);
        return view('agent.invoice.index',compact('invoices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = new Carbon(request('period'),'Africa/Nairobi');

        $date = $date->addMonth(1);

        dispatch(new CreateAgentInvoicesJob($date, auth()->user()));

        return \Response::json([
            'data' => [
                'success' => true,
                'message' => 'Invoices being generated, kindly check after some minutes.'
            ]
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function email(Request $request, Invoice $invoice)
    {
        Mail::to(request('email'))->send(new SendInvoiceMail($invoice));

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Email has been sent.'
            ]
        ]);
    }
}
