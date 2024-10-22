@extends('layouts.app')

@php
    function getPriorityClass($priority)
    {
        switch ($priority) {
            case 'critical':
                return 'bg-red-600 text-white';
            case 'high':
                return 'bg-orange-500 text-white';
            case 'medium':
                return 'bg-yellow-500 text-black';
            case 'low':
                return 'bg-green-500 text-white';
            default:
                return 'bg-gray-200 text-black';
        }
    }
@endphp

@section('content')
<div class="container mx-auto mt-5 flex flex-col items-center"> <!-- Center container -->
    <h1 class="text-2xl font-bold mb-4 text-center">Support Tickets</h1> <!-- Center the heading -->

    <div class="overflow-x-auto w-full"> <!-- Full width for the table -->
        <table class="min-w-full border border-gray-200 mx-auto"> <!-- Center the table -->
            <thead class="bg-customBlue text-white">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Title</th>
                    <th class="px-4 py-2 border">User</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Priority</th>
                    <th class="px-4 py-2 border">Date Submitted</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets as $ticket)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $ticket->id }}</td> <!-- Centered cell content -->
                    <td class="px-4 py-2 border">{{ $ticket->title }}</td>
                    <td class="px-4 py-2 border text-center">{{ $ticket->user->name }}</td> <!-- Centered cell content -->
                    <td class="px-4 py-2 border text-center">
                        <span class="inline-block px-2 py-1 text-sm font-semibold rounded {{ $ticket->status == 'open' ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2 border text-center">
                        <span class="inline-block px-2 py-1 text-sm font-semibold rounded {{ getPriorityClass($ticket->priority) }}">
                            {{ ucfirst($ticket->priority) }}
                        </span>
                    </td>
                    <td class="px-4 py-2 border text-center">{{ $ticket->created_at->format('Y-m-d H:i') }}</td> <!-- Centered cell content -->
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="bg-customBlue text-white px-2 py-1 rounded">View</a>
                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-2 py-1 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center px-4 py-2 border">No tickets available.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
