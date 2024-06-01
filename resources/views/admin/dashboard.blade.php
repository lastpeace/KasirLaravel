@extends('layouts.app2')


@section('content')

    <body class="bg-blue-600">

        <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[150px] overflow-y-auto text-center bg-indigo-700">
            <div class="text-gray-100 text-xl">
                <div class="p-2.5 mt-1 flex items-center">
                    <img loading="lazy" srcset="{{ asset('favicon.png') }}" class="aspect-[1.11] w-[115px]" />
                </div>
                <div class="my-2 bg-gray-600 h-[1px]"></div>
            </div>
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-neutral-50 text-white item">
                <i class="bi bi-house-door-fill hover:text-indigo-700"><a href="{{ route('admin.dashboard') }}"
                        class="text-[15px] ml-4 text-gray-200 font-bold">Home</a></i>
            </div>
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-bookmark-fill"></i>
                <a href="{{ route('admin.products.index') }}" class="text-[15px] ml-4 text-gray-200 font-bold">Menu</a>
            </div>
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-bookmark-fill"></i>
                <a class="text-[15px] ml-4 text-gray-200 font-bold"
                    href="{{ route('admin.reservations.index') }}">Reservasi</a>
            </div>
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-bookmark-fill"></i>
                <a class="text-[15px] ml-4 text-gray-200 font-bold" href="{{ route('tables.index') }}">Meja</a>
            </div>
            <div class="my-4 bg-gray-600 h-[1px]"></div>
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-box-arrow-in-right"></i>
            </div>
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-box-arrow-in-right"></i>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-[15px] ml-4 text-gray-200 font-bold">Logout</button>
                </form>
            </div>
        </div>
        <br><br>
        <style>
            /* Style untuk kanvas chart */

            canvas {
                max-width: 400px;
                margin: auto;
            }
        </style>

        <div>
            <div class="flex justify-center">
                <div class="w-1/6 mr-7">
                    <canvas id="dailyOrderChart" width="400" height="400"></canvas>
                </div>
                <div class="w-1/4 ml-10">
                    <canvas id="productTrendChart" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="container mx-auto mt-10">
                <h1 class="text-3xl font-bold text-center mb-8">Trending Products</h1>
                <div class="flex flex-wrap justify-center">
                    @foreach ($trendingProducts as $product)
                        <div class="w-1/3 p-4">
                            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-auto mb-4">
                                <h2 class="text-sm text-black">{{ $product->name }}</h2>
                                <p class="text-neutral-400">Penjualan</p>
                                <p class="text-red-600">{{ $product->orders ? $product->orders->count() : 0 }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Data jumlah pesanan per hari
            const dailyOrdersData = {!! json_encode($dailyOrdersData) !!};

            // Mengambil tanggal dan jumlah pesanan dari data
            const dates = Object.keys(dailyOrdersData);
            const orderCounts = Object.values(dailyOrdersData);

            // Konfigurasi chart jumlah pesanan per hari
            const dailyOrderChartConfig = {
                type: 'bar',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Jumlah Pesanan',
                        data: orderCounts,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // Membuat chart jumlah pesanan per hari
            const dailyOrderChart = new Chart(document.getElementById('dailyOrderChart'), dailyOrderChartConfig);

            // Data produk yang tren
            const trendingProducts = {!! json_encode($trendingProducts) !!};

            // Mengambil nama produk dan jumlah pesanan dari data
            const productNames = trendingProducts.map(product => product.name);
            const orderCountsTrend = trendingProducts.map(product => product.order_count);

            // Konfigurasi chart tren produk
            const productTrendChartConfig = {
                type: 'bar',
                data: {
                    labels: productNames,
                    datasets: [{
                        label: 'Jumlah Pesanan',
                        data: orderCountsTrend,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // Membuat chart tren produk
            const productTrendChart = new Chart(document.getElementById('productTrendChart'), productTrendChartConfig);
        </script>
    @endsection
