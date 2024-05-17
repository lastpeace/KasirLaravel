@extends('layouts.app2')

@section('content')
    <div class="container mx-auto ml-auto px-20  ">
        <div class="flex gap-5 self-start text-base font-bold text-neutral-400">
            <button id="semuaBtn" class="flex flex-col font-semibold ">Semua</button>
            <button id="minumanBtn" class="flex flex-col font-semibold ">Minuman</button>
            <button id="makananBtn" class="flex flex-col font-semibold ">Makanan</button>
            <button id="snackBtn" class="flex flex-col font-semibold ">Snack</button>
        </div>
    </div>
    <div class="flex ">
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
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-bookmark-fill"></i>
                <a href="{{ route('admin.products.index') }}" class="text-[15px] ml-4 text-gray-200 font-bold">Menu</a>
            </div>
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-bookmark-fill"></i>
                <a class="text-[15px] ml-4 text-gray-200 font-bold">Reservasi</a>
            </div>
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-bookmark-fill"></i>
                <a class="text-[15px] ml-4 text-gray-200 font-bold">Meja</a>
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
        <div class="container mx-auto ml-auto px-20 ">
            <h1 class="text-2xl font-semibold mb-4">Menu</h1>
            <div class="">
                <form action="{{ route('admin.products.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari produk..." class="border px-2 py-1 rounded-md">
                    <button type="submit"
                        class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 ml-2">Cari</button>
                </form>
                <button onclick="window.location='{{ route('products.create') }}'"
                    class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Tambah Produk</button>
            </div>
            <div class="overflow-x-auto ">
                <table class="min-w-full mx-auto ">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">id Menu</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Tipe</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">Deskripsi</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">{{ $product->type }}</td>
                                <td class="border px-4 py-2">{{ $product->price }}</td>
                                <td class="border px-4 py-2">{{ $product->description }}</td>
                                <td class="border px-4 py-2">{{ $product->status_label }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-2"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("semuaBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "block";
            });
        });

        document.getElementById("minumanBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "none";
            });
            document.querySelectorAll(".minuman").forEach(function(item) {
                item.style.display = "block";
            });
        });

        document.getElementById("snackBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "none";
            });
            document.querySelectorAll(".snack").forEach(function(item) {
                item.style.display = "block";
            });
        });

        document.getElementById("makananBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "none";
            });
            document.querySelectorAll(".makanan").forEach(function(item) {
                item.style.display = "block";
            });
        });
    </script>
@endsection
