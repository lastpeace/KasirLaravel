@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="w-full flex mt-4">
            <div class="w-[347px] h-[39px] text-black text-[32px] font-semibold font-['Inter']">
                Menu
            </div>
        </div>
        <div class="w-full flex flex-col md:flex-row-reverse">
            <div class="w-full md:w-[347px] px-4 py-2 mt-4 md:mt-0">
                <button id="semuaBtn" class="w-40 h-[42px] bg-black text-white rounded-[50px] mb-2 md:mb-0">Semua</button>
                <button id="minumanBtn"
                    class="w-40 h-[42px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Minuman</button>
                <button id="makananBtn"
                    class="w-40 h-[42px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Makanan</button>
                <button id="snackBtn"
                    class="w-40 h-[42px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Snack</button>
            </div>
            <div class="w-full md:flex-1 mt-4 md:mt-0">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-7 mt-5">
                    @foreach ($products as $item)
                        <div class="flex flex-col mt-5 menu-item {{ strtolower($item->type) }} ">
                            <div class="flex flex-row px-4 py-2 bg-white rounded-2xl">
                                <div class="flex flex-col w-6/12 mr-4">
                                    <img loading="lazy" src="{{ asset('storage/images/' . $item->image) }}"
                                        class="max-w-full" />
                                </div>
                                <div class="flex flex-col flex-grow ml-4 w-6/12">
                                    <div class="text-xl font-medium">{{ $item->name }}</div>
                                    <div class="mt-2 text-base font-light text-justify">{{ $item->description }}</div>
                                    <div class="mt-auto text-2xl font-bold self-end">
                                        @if ($item->price >= 1000)
                                            @php
                                                $formattedPrice = $item->price / 1000;
                                                $displayPrice =
                                                    intval($formattedPrice) == $formattedPrice
                                                        ? intval($formattedPrice)
                                                        : number_format($formattedPrice, 1, '.', '');
                                            @endphp
                                            {{ $displayPrice }}
                                        @else
                                            {{ $item->price }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function showItems(type) {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                if (type === "all" || item.classList.contains(type)) {
                    item.classList.remove("hidden");
                    item.classList.add("block");
                } else {
                    item.classList.remove("block");
                    item.classList.add("hidden");
                }
            });
        }

        document.getElementById("semuaBtn").addEventListener("click", function() {
            showItems("all");
        });

        document.getElementById("minumanBtn").addEventListener("click", function() {
            showItems("minuman");
        });

        document.getElementById("makananBtn").addEventListener("click", function() {
            showItems("makanan");
        });

        document.getElementById("snackBtn").addEventListener("click", function() {
            showItems("snack");
        });
    </script>
@endsection
