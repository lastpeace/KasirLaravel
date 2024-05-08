@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tables</h1>
        <a href="{{ route('tables.create') }}" class="btn btn-primary mb-3">Create Table</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Capacity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tables as $table)
                    <tr>
                        <td>{{ $table->id }}</td>
                        <td>{{ $table->name }}</td>
                        <td>{{ $table->capacity }}</td>
                        <td>{{ $table->status }}</td>
                        <td>
                            <a href="{{ route('tables.show', $table->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('tables.destroy', $table->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this table?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @endsection
