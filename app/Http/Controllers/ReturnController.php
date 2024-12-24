<?php

namespace App\Http\Controllers;

use App\Models\ReturnRequest; // Ensure this model exists in the specified namespace or create it if it doesn't exist
use App\Models\Order; // Assuming you have an Order model
// use Illuminate\Http\ReturnRequest; // Removed to avoid conflict
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
    public function index()
    {
        $returns = ReturnRequest::where('user_id', Auth::id())->get();
        return view('returns.index', compact('returns'));
    }

    public function create()
    {
        $orders = Order::where('user_id', Auth::id())->get(); // Fetch user's orders
        return view('returns.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'reason' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $return = new ReturnRequest();
        $return->user_id = Auth::id();
        $return->order_id = $request->order_id;
        $return->reason = $request->reason;

        if ($request->hasFile('attachment')) {
            $return->attachment = $request->file('attachment')->store('attachments');
        }

        $return->save();

        return redirect()->route('returns.index')->with('success', 'Return request submitted successfully.');
    }

    public function show($id)
    {
        $return = ReturnRequest::findOrFail($id);
        return view('returns.show', compact('return'));
    }
} 