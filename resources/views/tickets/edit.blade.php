@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-center mb-6">Edit Ticket Status</h1>

        <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="status" name="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-800 focus:border-indigo-900">
                    <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-customBlue hover:bg-indigo-900 text-white font-bold py-2 px-4 rounded-md mt-4">
                Update Status
            </button>
        </form>
    </div>
</div>
@endsection
