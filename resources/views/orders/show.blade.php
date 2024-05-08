@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>
    <p><strong>User ID:</strong> {{ $order->user_id }}</p>
    <p><strong>Product ID:</strong> {{ $order->product_id }}</p>
    <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
    <p><strong>Total Price:</strong> {{ $order->total_price }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
