@extends('layouts.app')

@section('content')
    <div class="flex gap-5 self-start mt-8 text-2xl font-semibold text-black">
        <button onclick="window.location.href = '{{ route('dashboard') }}';"
            class="flex items-center  bg-transparent border-none outline-none focus:outline-none">
            <svg class="w-2.5 h-2.5 mb-3 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 10 16">
                <path
                    d="M8.766.566A2 2 0 0 0 6.586 1L1 6.586a2 2 0 0 0 0 2.828L6.586 15A2 2 0 0 0 10 13.586V2.414A2 2 0 0 0 8.766.566Z" />
            </svg>
        </button>
        <div class="flex-auto">Reservasi Saya</div>
    </div>
    <div
        class="flex flex-col justify-center px-5 py-5 mt-7 text-lg font-medium text-black bg-white rounded-lg shadow-2xl max-md:px-5 max-md:max-w-full">
        <div class="flex gap-5 justify-between max-md:flex-wrap max-md:max-w-full">
            <div class="font-bold">Id Booking</div>
            <div class="font-bold">Meja</div>
            <div class="font-bold">Tanggal</div>
            <div class="font-bold">Jam</div>
            <div class="font-bold">Atas Nama</div>
            <div class="font-bold">Catatan</div>
            <div class="font-bold">Pembayaran</div>
            <div class="font-bold">Status</div>
        </div>

        @foreach ($reservations as $reservation)
            <div class="flex gap-5 justify-between max-md:flex-wrap max-md:max-w-full">
                <div>{{ $reservation->id }}</div>
                <div>{{ $reservation->table->name }}</div>
                <div>{{ $reservation->date }}</div>
                <div>{{ $reservation->time }}</div>
                <div>{{ $reservation->customer_name }}</div>
                <div>{{ $reservation->notes }}</div>
                <div>{{ $reservation->payment }}</div>
                <div>{{ $reservation->status }}</div>
            </div>
        @endforeach
    </div>
@endsection
