<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agent;
use App\Expense;
use DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $expenses = auth()->user()->expenses;
       
         return view('vendor.expenses.index',compact("expenses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        request()->validate([
            'property' => 'required|max:255|exists:listings,id',
            'unit' => 'required|max:255|exists:rooms,id',
            'frequency' => 'required|string|max:255',
            'payee' => 'required|string',
            'method' => 'required|string',
            'details' => 'required|string',
            'ptype' => 'required|string',
            'duedate' => 'required|date|',
            'amount' => 'required|numeric|min:1',
            'currency' => 'required|string',
            'category' => 'required|string',
            'reference' => 'required|string',
        ]);
        
        $rental = auth()->user()->listings->where('id',request('property'))->first();
        
        $commentable =  $rental->owner;
//dd(auth()->user()->id,request('method'),request('reference'));
        // if (request('ptype') == 'Owner') {
        //     $commentable =  $rental->rentable->listing->owner;
        // }

     $commentable->expenses()->create([
            'property' => request('property'),
            'unit' => request('unit'),
            'frequency' => request('frequency'),
            'payee' => request('payee'),
            'payment_method' => request('method'),
            'details' => request('details'),
            // 'ptype' => request('ptype'),
            'duedate' => request('duedate'),
            'amount' => request('amount'),
            'currency' => request('currency'),
            'category' => request('category'),
            'payment_reference' => request('reference'),
            'agent_id' => auth()->user()->id
        ]);
        
       

         return response()->json([
            'success' => true,
            'message' => 'Expense saved successfully.'
         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
       
        $expense->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Successfully removed'

        ]);
   
    }
}
