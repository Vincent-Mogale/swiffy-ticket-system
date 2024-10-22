<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index() {
        $tickets = Ticket::with('user')->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create() {
        return view('tickets.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'priority' => 'required|in:critical,high,medium,low',
        ]);

        Ticket::create(array_merge($validated, ['user_id' => auth()->id()]));
        return redirect()->route('dashboard')->with('success', 'Ticket created successfully.');
    }

    public function show(Ticket $ticket) {
        return view('tickets.show', compact('ticket'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'status' => 'required|in:open,closed',
        ]);

        // dd($id);

        Ticket::where('id', $id)->update(['status'=> $validated['status']]);

        // $ticket->update($validated);

        return redirect()->route('dashboard')->with('success', 'Ticket status updated.');
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }

    public function destroy($id)
    {
        try {
            $ticket = Ticket::findOrFail($id);
            $ticket->delete();

            return redirect()->route('dashboard')->with('success', 'Ticket deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Error deleting ticket: ', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to delete the ticket.');
        }
    }

}
