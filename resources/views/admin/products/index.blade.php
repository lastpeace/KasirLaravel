@extends('layouts.app2')

@section('content')
    <div class="flex ">
        <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[150px] overflow-y-auto text-center bg-indigo-700">
            <div class="text-gray-100 text-xl">
                <div class="p-2.5 mt-1 flex items-center">
                    <img loading="lazy" srcset="{{ asset('favicon.png') }}" class="aspect-[1.11] w-[115px]" />
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
        <div class="container mx-auto ml-auto px-20 ">
            <h1 class="text-2xl font-semibold mb-4">Menu</h1>
            <div class="">
                <form action="{{ route('admin.products.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari produk..." class="border px-2 py-1 rounded-md">
                    <button type="submit"
                        class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 ml-2">Cari</button>
                </form>
                <button type="button" onclick="window.location='{{ route('products.create') }}'"
                    class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Tambah Menu</button>

            </div>
            <div class="w-full flex flex-col md:flex-row-reverse item-center justify-center">
                <div class="w-full md:w-[347px] px-4 py-2 mt-4 md:mt-0">
                    <button id="semuaBtn"
                        class="w-40 h-[42px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Semua</button>
                    <button id="minumanBtn"
                        class="w-40 h-[42px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Minuman</button>
                    <button id="makananBtn"
                        class="w-40 h-[42px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Makanan</button>
                    <button id="snackBtn"
                        class="w-40 h-[42px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Snack</button>
                </div>
            </div>
            <div class="overflow-x-auto ">
                <table id="productsTable" class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-center cursor-pointer" onclick="sortTable(0)">ID</th>
                            <th class="border px-4 py-2 cursor-pointer" onclick="sortTable(1)">Product Name</th>
                            <th class="border px-4 py-2 cursor-pointer" onclick="sortTable(4)">Description</th>
                            <th class="border px-4 py-2 cursor-pointer">Gambar</th>
                            <th class="border px-4 py-2 cursor-pointer" onclick="sortTable(3)">Harga</th>
                            <th class="border px-4 py-2 cursor-pointer" onclick="sortTable(2)">Kategori</th>
                            <th class="border px-4 py-2 cursor-pointer" onclick="sortTable(5)">Status</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="menu-item {{ strtolower($product->type) }}">
                                <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2 ">{{ $product->description }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}"
                                        style="width: 70px; height: auto;">
                                </td>
                                <td class="border px-4 py-2 text-center">{{ $product->price }}</td>
                                <td class="border px-4 py-2 text-center">{{ $product->type }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <span
                                        class="px-2 py-1 rounded @if ($product->status_label == 'Tersedia') bg-green-100 text-green-500
                                              @elseif($product->status_label == 'Habis') bg-red-100 text-red-500 @endif">
                                        {{ $product->status_label }}
                                    </span>
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <form action="{{ route('products.edit', $product->id) }}" method="GET"
                                        class="inline-block">
                                        <button type="submit" class="text-blue-600 hover:text-blue-900 focus:outline-none">
                                            <svg class="h-8 w-8 text-slate-900" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>
                                        </button>
                                    </form>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-2"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"><svg
                                                class="h-8 w-8 text-slate-900" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6" />
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                            </svg></button>
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
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("productsTable");
            switching = true;
            dir = "asc";
            while (switching) {

                switching = false;
                rows = table.rows;

                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }


        document.getElementById("semuaBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "table-row"; // Change 'block' to 'table-row'
            });
        });

        document.getElementById("minumanBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "none";
            });
            document.querySelectorAll(".minuman").forEach(function(item) {
                item.style.display = "table-row"; // Change 'block' to 'table-row'
            });
        });

        document.getElementById("snackBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "none";
            });
            document.querySelectorAll(".snack").forEach(function(item) {
                item.style.display = "table-row"; // Change 'block' to 'table-row'
            });
        });

        document.getElementById("makananBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "none";
            });
            document.querySelectorAll(".makanan").forEach(function(item) {
                item.style.display = "table-row"; // Change 'block' to 'table-row'
            });
        });
    </script>
@endsection
