@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Table Details</h1>
        <p><strong>ID:</strong> {{ $table->id }}</p>
        <p><strong>Name:</strong> {{ $table->name }}</p>
        <p><strong>Capacity:</strong> {{ $table->capacity }}</p>
        <p><strong>Status:</strong> {{ $table->status }}</p>
        <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('tables.destroy', $table->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this table?')">Delete</button>
        </form>
    </div>
@endsection
