<?php

namespace App\Http\Controllers\Agent;

use App\Account;
use App\Http\Controllers\Controller;
use App\Room;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

     /**
     * Do a search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $q = request('search');

        $accounts = Account::where('name','like','%'.$q.'%')->get();

        return response()->json($accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'currency' => 'required|max:255',
            'amount' => 'required|numeric',
            'name' => 'required',
            'period' => 'required|exists:periods,id',
            'accountable' => 'required|exists:rooms,id',
        ]);

        $room =  Room::findOrFail(request('accountable'));

        $room->accounts()->create([
            'currency' => request('currency'),
            'amount' => request('amount'),
            'name' => request('name'),
            'period_id' => request('period'),
            'active' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Account record added successfully.'
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, Account $account)
    {
        request()->validate([
            'currency' => 'required|max:255',
            'amount' => 'required|numeric',
            'name' => 'required',
            'period' => 'required|exists:periods,id',
        ]);

        $account->period_id = request('period');
        $account->name = request('name');
        $account->amount = request('amount');
        $account->currency = request('currency');

        if($account->isDirty()){
            $account->update();
        }

        return response()->json([
            'success' => true,
            'message' => 'Successfully updated'

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Successfully removed'

        ]);
    }
}
