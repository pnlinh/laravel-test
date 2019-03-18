<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buy(Request $request)
    {
        Purchase::create($request->all());

        return response(null, 201);
    }
}
