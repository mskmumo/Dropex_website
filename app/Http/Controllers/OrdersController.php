<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function metrics()
    {
        return view('orders.metrics');
    }
}