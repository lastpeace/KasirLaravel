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

        <div
            class=" container mx-auto flex flex-col grow p-4 pb-7 w-full text-base font-bold bg-white shadow-lg max-md:mt-10">
            <h1 class="text-4xl font-bold text-center mb-8">Trending Products</h1>
            <div class="flex flex-wrap">
                @foreach ($trendingProducts as $product)
                    <div class="w-1/4 p-4">
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-auto mb-4">
                            <h2 class="self-start text-sm text-black">{{ $product->name }}</h2>
                            <p class="mt-5 text-neutral-400">Penjualan</p>
                            <p class="mt-4 mr-7 text-red-600 max-md:mr-2.5">
                                {{-- {{ $product->orders->count() }}</p> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
