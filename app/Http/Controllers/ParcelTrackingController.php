<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParcelTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function track(Request $request)
    {
        $trackingId = $request->input('tracking_id');
        // Add your tracking logic here
        return redirect()->route('dashboard.tracking', ['tracking_id' => $trackingId]);
    }

    public function dashboard(Request $request)
    {
        $trackingId = $request->input('tracking_id');
        // Add your tracking status logic here
        return view('dashboard.tracking', compact('trackingId'));
    }
}
