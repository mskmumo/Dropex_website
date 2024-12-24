<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $ticket = new Ticket();
        $ticket->user_id = Auth::id();
        $ticket->subject = $request->subject;
        $ticket->description = $request->description;
        $ticket->priority = $request->priority;

        if ($request->hasFile('attachment')) {
            $ticket->attachment = $request->file('attachment')->store('attachments');
        }

        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Ticket submitted successfully.');
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }
} 