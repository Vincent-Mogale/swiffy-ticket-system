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
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4 text-center">Ticket Details</h1>
    <div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
        <h2 class="text-xl font-semibold mb-2">Title: {{ $ticket->title }}</h2>
        <p class="mb-4"><strong>Description:</strong> {{ $ticket->description }}</p>
        <p class="mb-2">
            <strong>Status:</strong>
            <span class="inline-block px-2 py-1 text-sm font-semibold rounded {{ $ticket->status == 'open' ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' }}">
                {{ ucfirst($ticket->status) }}
            </span>
        </p>
        <p class="mb-2">
            <strong>Priority:</strong>
            <span class="inline-block px-2 py-1 text-sm font-semibold rounded {{ getPriorityClass($ticket->priority) }}">
                {{ ucfirst($ticket->priority) }}
            </span>
        </p>
        <p class="mb-4"><strong>Date Submitted:</strong> {{ $ticket->created_at->format('Y-m-d H:i') }}</p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('tickets.edit', $ticket->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
            <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to Dashboard</a>
        </div>
    </div>
</div>
@endsection
