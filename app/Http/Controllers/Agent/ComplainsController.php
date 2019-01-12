<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplainsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:agent');
    }

    public function index()
    {
        $complains = auth()->user()->complains;

        return view('agent.complains.index', compact('complains'));
    }
}
