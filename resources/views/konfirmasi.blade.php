@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full lg:w-1/2 p-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6">Konfirmasi Reservasi dan Order</h2>

            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Reservasi</h3>
                <p><strong>Nama:</strong> {{ $reservation->name }}</p>
                <p><strong>No Telpon:</strong> {{ $reservation->phone }}</p>
                <p><strong>Tanggal:</strong> {{ $reservation->date }}</p>
                <p><strong>Jam:</strong> {{ $reservation->time }}</p>
                <p><strong>Jumlah Orang:</strong> {{ $reservation->guests }}</p>
                <p><strong>Meja:</strong> {{ $reservation->table->name }}</p>
                <p><strong>Catatan:</strong> {{ $reservation->notes }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Order</h3>
                <ul>
                    @foreach ($orders as $order)
                        <li>
                            <p><strong>Product:</strong> {{ $order->product->name }}</p>
                            <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
                            <p><strong>Total Price:</strong> {{ $order->total_price }}</p>
                            <hr class="my-2">
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('reservations.index') }}" class="btn btn-gray">Kembali</a>
                <form action="{{ route('konfirmasi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                    <button type="submit" class="btn btn-blue">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>
@endsection
