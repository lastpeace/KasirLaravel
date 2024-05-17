@extends('layouts.app2')


@section('content')

    <body class="bg-blue-600">

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
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Meja</span>
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



        <script type="text/javascript">
            function dropdown() {
                document.querySelector("#submenu").classList.toggle("hidden");
                document.querySelector("#arrow").classList.toggle("rotate-0");
            }
            dropdown();

            function openSidebar() {
                document.querySelector(".sidebar").classList.toggle("hidden");
            }
        </script>
    @endsection
