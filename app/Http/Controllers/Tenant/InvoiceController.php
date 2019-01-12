<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        if(request('type') === 'unpaid'){
            $invoices =Invoice::unpaid()->where('tenant_id',auth()->user()->id)->get();
        }else{
           $invoices =Invoice::paid()->where('tenant_id',auth()->user()->id)->get();
        }
        return view('tenant.invoice.index',compact('invoices'));
    }

}
