@extends('layouts.app')


@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Payment</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    </head>

    <body class="bg-gray-100 p-6">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Create Payment for Reservation #{{ $reservation->id }}</h2>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('payments.store', $reservation->id) }}" method="POST">
                @csrf
                @foreach ($userOrders as $order)
                    <input type="hidden" name="order_ids[]" value="{{ $order->id }}">
                @endforeach
                <!-- Tampilkan total harga -->
                <div class="mb-4">
                    <label class="block text-gray-700">Total Price</label>
                    <input type="text" id="total-price" class="block w-full border-gray-300 rounded-md shadow-sm"
                        readonly>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700">Payment Status</label>
                    <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                        required>
                        <option value="50%">50% Payment</option>
                        <option value="full">Full Payment</option>
                    </select>
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Process Payment
                    </button>
                </div>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Mendapatkan semua item dengan harga
                const items = {!! json_encode($userOrders) !!};
                // Mendapatkan input untuk total harga
                const totalPriceInput = document.getElementById('total-price');

                // Menghitung total harga dari semua item
                let total = items.reduce((acc, item) => acc + (parseFloat(item.total_price) * parseInt(item.quantity)),
                    0);
                totalPriceInput.value = total.toFixed(2);
            });
        </script>
    </body>
@endsection
