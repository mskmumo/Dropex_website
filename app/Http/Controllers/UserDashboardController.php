<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcel;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $parcels = Auth::user()->parcels()->latest()->get();
        return view('dashboard.user', compact('parcels'));
    }
}