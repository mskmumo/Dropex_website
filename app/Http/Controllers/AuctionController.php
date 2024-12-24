<?php

namespace App\Http\Controllers;

use App\Models\Auction; // Ensure you have an Auction model
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuctionController extends Controller
{
    public function index(): View
    {
        $auctions = Auction::all(); // Fetch all auctions
        return view('auctions.index', compact('auctions')); // Pass auctions to the view
    }

    public function manage(): View
    {
        $auctions = Auction::all(); // Fetch all auctions for management
        return view('auctions.manage', compact('auctions')); // Auction management view
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Create a new auction
        Auction::create($request->all());

        return redirect()->route('auctions.manage')->with('success', 'Auction created successfully.');
    }

    public function edit(Auction $auction): View
    {
        return view('auctions.edit', compact('auction')); // Pass auction to the edit view
    }

    public function update(Request $request, Auction $auction)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Update the auction
        $auction->update($request->all());

        return redirect()->route('auctions.manage')->with('success', 'Auction updated successfully.');
    }

    public function destroy(Auction $auction)
    {
        $auction->delete(); // Delete the auction
        return redirect()->route('auctions.manage')->with('success', 'Auction deleted successfully.');
    }
} 