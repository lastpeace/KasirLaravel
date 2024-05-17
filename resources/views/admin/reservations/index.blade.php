@extends('layouts.app2')

@section('content')
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[150px] overflow-y-auto text-center bg-indigo-700">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center">
                <img loading="lazy"
                    srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/5cd21c7b2dacf6ee2a2db8fe106e63df6fa845fc03bee0be8d30b8983ec39540?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/5cd21c7b2dacf6ee2a2db8fe106e63df6fa845fc03bee0be8d30b8983ec39540?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/5cd21c7b2dacf6ee2a2db8fe106e63df6fa845fc03bee0be8d30b8983ec39540?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/5cd21c7b2dacf6ee2a2db8fe106e63df6fa845fc03bee0be8d30b8983ec39540?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/5cd21c7b2dacf6ee2a2db8fe106e63df6fa845fc03bee0be8d30b8983ec39540?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/5cd21c7b2dacf6ee2a2db8fe106e63df6fa845fc03bee0be8d30b8983ec39540?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/5cd21c7b2dacf6ee2a2db8fe106e63df6fa845fc03bee0be8d30b8983ec39540?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/5cd21c7b2dacf6ee2a2db8fe106e63df6fa845fc03bee0be8d30b8983ec39540?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                    class="aspect-[1.11] w-[115px]" />
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>
        <div
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-neutral-50 text-white item">
            <i class="bi bi-house-door-fill hover:text-indigo-700"></i>
            <a href="{{ route('admin.dashboard') }}" class="text-[15px] ml-4 text-gray-200 font-bold">Home</a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <a href="{{ route('admin.products.index') }}" class="text-[15px] ml-4 text-gray-200 font-bold">Menu</a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <a class="text-[15px] ml-4 text-gray-200 font-bold" href="{{ route('admin.reservations.index') }}">Reservasi</a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <a class="text-[15px] ml-4 text-gray-200 font-bold">Meja</a>
        </div>
        <div class="my-4 bg-gray-600 h-[1px]"></div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-box-arrow-in-right"></i>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-box-arrow-in-right"></i>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-[15px] ml-4 text-gray-200 font-bold">Logout</button>
            </form>
        </div>

    </div>
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">

                            </td>

                            {{-- Ambil status pesanan dari tabel Order --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
