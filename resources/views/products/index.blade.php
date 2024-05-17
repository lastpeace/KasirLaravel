<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="w-[142px] h-[42px] left-[207px] top-[238px] absolute"></div>
    <div class="w-[142px] h-[42px] left-[509px] top-[238px] absolute"></div>
    <div class="w-[347px] h-[39px] left-[56px] top-[146px] absolute text-black text-[32px] font-semibold font-['Inter']">Menu
    </div>
    <div class="w-[142px] h-[42px] left-[56px] top-[213px] absolute"></div>
    <div class="w-[595px] h-[42.17px] left-[56px] top-[212.85px] absolute">
        <div class="w-full md:w-[595px] h-[42.17px] md:h-[42.17px] mx-auto relative">
            <div class="flex justify-between items-center flex-col md:flex-row">
                <button id="semuaBtn"
                    class="w-[69px] md:w-[142px] h-[19.54px] md:h-[42.17px] bg-black text-white rounded-[50px] mb-2 md:mb-0">Semua</button>
                <button id="minumanBtn"
                    class="w-[69px] md:w-[142px] h-[19.54px] md:h-[42.17px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Minuman</button>
                <button id="makananBtn"
                    class="w-[69px] md:w-[142px] h-[19.54px] md:h-[42.17px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Makanan</button>
                <button id="snackBtn"
                    class="w-[47px] md:w-[142px] h-[19.54px] md:h-[42.17px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Snack</button>

            </div>
            <div class="px-0.5 mt-7 max-md:max-w-full">
                <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                    @php $rowCount = 3; @endphp
                    @for ($i = 0; $i < $rowCount; $i++)
                        <div class="flex max-md:flex-row max-md:w-full">
                            @foreach ($products->skip($i * 3)->take(3) as $item)
                                <div
                                    class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full menu-item {{ strtolower($item->type) }}">
                                    <div class="flex flex-col grow justify-center max-md:mt-10">
                                        <div class="px-5 py-4 bg-white rounded-2xl max-md:pl-5">
                                            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                                                <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                                                    <div
                                                        class="flex overflow-hidden relative flex-col justify-center items-center aspect-square w-[187px] max-md:mt-10">
                                                        <img loading="lazy" srcset="{{ $item->image_url }}"
                                                            class="object-cover absolute inset-0 size-full" />
                                                        <img loading="lazy" srcset="{{ $item->thumbnail_url }}"
                                                            class="w-full aspect-square" />
                                                    </div>
                                                </div>
                                                <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                                                    <div class="flex flex-col grow mt-1 text-black max-md:mt-10">
                                                        <div class="text-xl font-medium">{{ $item->name }}</div>
                                                        <div class="mt-4 text-base font-light text-justify">
                                                            {{ $item->description }}
                                                        </div>
                                                        <div class="self-end mt-9 text-2xl font-bold max-md:mr-2.5">
                                                            {{ $item->price }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endfor
                </div>
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
