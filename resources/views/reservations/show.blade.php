@extends('layouts.app')

@section('content')
    <h1>Reservation Details</h1>
    <p><strong>User ID:</strong> {{ $reservation->user_id }}</p>
    <p><strong>Phone Number:</strong> {{ $reservation->phone_number }}</p>
    <p><strong>Date:</strong> {{ $reservation->date }}</p>
    <p><strong>Time:</strong> {{ $reservation->time }}</p>
    <p><strong>Number of People:</strong> {{ $reservation->number_of_people }}</p>
    <p><strong>Table Number:</strong> {{ $reservation->table_number }}</p>
    <p><strong>Notes:</strong> {{ $reservation->notes }}</p>
    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
