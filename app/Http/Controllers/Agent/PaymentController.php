<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $invoices =Invoice::paid()->where('agent_id', auth()->user()->id)->get();

        return view('agent.payments.index', compact('invoices'));
    }


    public function store(Request $request, Invoice $invoice)
    {
        request()->validate([
                'mode' => 'required|in:CASH,MPESA,BANK',
                'amount' => 'required|numeric',
                'reference' => 'required|string',
                'paidby' => 'required|string',
            ]);


        $invoice->payment_date = Carbon::now();
        $invoice->paid = request('amount');
        $invoice->payment_method = request('mode');
        $invoice->payment_by = request('paidby');
        $invoice->payment_reference = request('reference');
        $invoice->balance = ($invoice->amount - request('amount'));

        $invoice->update();

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Payment updated successfully.'
            ]
        ]);
    }
}
