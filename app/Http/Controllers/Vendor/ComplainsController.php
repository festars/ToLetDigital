<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplainsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }

    public function index()
    {
        $complains = auth()->user()->complains;

        return view('vendor.complains.index', compact('complains'));
    }
}
