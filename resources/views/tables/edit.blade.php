@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Table</h1>
        <form action="{{ route('tables.update', $table->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $table->name }}">
            </div>
            <div class="form-group">
                <label for="capacity">Capacity:</label>
                <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $table->capacity }}">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="available" {{ $table->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="full" {{ $table->status == 'full' ? 'selected' : '' }}>Full</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
