@extends('layouts.app')

@section('content')
    <div class="flex gap-5 self-start mt-8 text-2xl font-semibold text-black">
        <button onclick="window.location.href = '{{ route('dashboard') }}';"
            class="flex items-center bg-transparent border-none outline-none focus:outline-none">
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
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Id Booking
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Meja
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Jam
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Atas Nama
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Catatan
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Pembayaran
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reservation->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Meja
                                {{ $reservation->table_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reservation->date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reservation->time }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reservation->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reservation->notes }}</td>
                            @php
                                $payment = $reservation->payment;
                            @endphp
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                @if ($reservation->payment)
                                    @if ($reservation->payment->status == '50%')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            50%
                                        </span>
                                    @elseif ($reservation->payment->status == 'full')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Full
                                        </span>
                                    @endif
                                @else
                                    <span class="text-gray-500">Belum ada pembayaran</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                @if ($reservation->payment)
                                    @php
                                        $status = $reservation->payment->status;
                                        if ($reservation->payment->status == '50%') {
                                            $order = $reservation->payment->orders->first(); // Ambil order pertama
                                            if ($order && $order->status == 'pending') {
                                                $status = 'pending';
                                            }
                                        }
                                    @endphp
                                    {{ $status }}
                                @else
                                    <span class="text-gray-500">Belum ada pesanan</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
