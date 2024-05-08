@extends('layouts.app')

@section('content')
    <div class="flex gap-5 max-md:flex-col max-md:gap-0">
        <div class="flex flex-col w-[55%] max-md:ml-0 max-md:w-full">
            <div class="flex flex-col grow max-md:mt-10 max-md:max-w-full">
                <div class="flex gap-5 text-lg text-black max-md:flex-wrap">
                    <div class="flex flex-wrap grow w-fit max-md:max-w-full px-5">
                        <div class="flex items-center justify-between text-2xl font-semibold max-md:max-w-full">
                            <div class=" p-2 max-width">
                                <button onclick="window.location.href = '{{ route('dashboard') }}';"
                                    class="flex border-none outline-none focus:outline-none">
                                    <svg class="w-6 h-6 text-gray-800 mb-10" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class=" text-2xl font-semibold px-4">Reservasi</div>
                        <form method="POST" action="{{ route('reservations.store') }}" class="mt-6 max-md:max-w-full">
                            @csrf
                            <div class="flex flex-wrap max-md:max-w-full relative px-10">
                                <div class="w-full p-2">
                                    <div class="">
                                        <span class="text-red-600">Nama *</span>
                                        <br>
                                        <input type="text" name="name"
                                            class="px-4 py-5 mt-1.5 rounded-lg border border-black border-solid w-full"
                                            rows="7" cols="200" value="{{ auth()->user()->name }}" readonly />
                                    </div>
                                </div>
                                <div class="w-full p-2">
                                    <span class="text-red-600">No Telpon *</span>
                                    <br>
                                    <input type="text" name="phone"
                                        class="px-4 py-5 mt-1.5 rounded-lg border border-black border-solid w-full"
                                        rows="7" cols="200" />

                                </div>
                            </div>
                            <div class="flex flex-wrap px-10">
                                <div class="w-1/2 p-2 max-width">
                                    <span class="text-red-600">Tanggal*</span>
                                    <br>
                                    <input type="date" name="date"
                                        class="px-4 py-5 mt-1.5 rounded-lg border border-black border-solid w-full" />
                                </div>
                                <div class="w-1/2 p-2">
                                    <span class="text-red-600">Jam *</span>
                                    <br>
                                    <input type="time" name="time"
                                        class="px-4 py-5 mt-1.5 rounded-lg border border-black border-solid w-full" />
                                </div>
                                <div class="w-1/2 p-2">
                                    <span class="text-red-600">Jumlah Orang *</span>
                                    <br>
                                    <input type="number" name="guests" min="0" max="10"
                                        class="px-4 py-5 mt-1.5 rounded-lg border border-black border-solid w-full" />
                                </div>
                                <div class="w-1/2 p-2">
                                    <span class="text-red-600">Meja *</span>
                                    <br>
                                    <select name="table"
                                        class="px-4 py-5 mt-1.5 rounded-lg border border-black border-solid w-full">
                                        @foreach ($tables as $table)
                                            <option value="{{ $table->id }}">{{ $table->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-red-600">Harap memilih sesuai kapasitas meja yang tertera di
                                        gambar</span>
                                </div>
                                <div class="w-1/2 p-2 ">
                                    <span class="">Catatan</span>
                                </div>
                                <div class="w-full p-2">
                                    <textarea name="notes" rows="3"
                                        class="items-start px-3 pt-4 pb-16 mt-2 text-lg text-black bg-white rounded-lg border border-black border-solid w-full"
                                        placeholder="Tidak Ada"></textarea>
                                </div>

                                <div class="w-full">
                                    <span class="text-black"><span class="text-red-600">*</span>(wajib diisi)</span>
                                    <br>
                                </div>
                                <div class="bg-black rounded-[50px] w-[504px] w-full">
                                    <button type="button" id="continueToReservation"
                                        class="flex justify-center items-center self-center px-16 py-5  font-medium text-white text-center  w-full">
                                        Lanjut Pembayaran
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col ml-5 w-[45%] max-md:ml-0 max-md:w-full">
            <div class="flex flex-col text-xs text-justify text-black max-md:mt-10 max-md:max-w-full">
                <img loading="lazy"
                    srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/81f23531d676e90103e7d03b195b3684f960fffa80fecbe393b3ffd172323b27?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/81f23531d676e90103e7d03b195b3684f960fffa80fecbe393b3ffd172323b27?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/81f23531d676e90103e7d03b195b3684f960fffa80fecbe393b3ffd172323b27?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/81f23531d676e90103e7d03b195b3684f960fffa80fecbe393b3ffd172323b27?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/81f23531d676e90103e7d03b195b3684f960fffa80fecbe393b3ffd172323b27?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/81f23531d676e90103e7d03b195b3684f960fffa80fecbe393b3ffd172323b27?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/81f23531d676e90103e7d03b195b3684f960fffa80fecbe393b3ffd172323b27?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/81f23531d676e90103e7d03b195b3684f960fffa80fecbe393b3ffd172323b27?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                    class="w-full border border-black border-solid aspect-[1.11] max-md:max-w-full" />
                <div class="mt-4 italic max-md:max-w-full">
                    Meeting Room berada di lantai 2 dengan kapasitas sampai 12 orang
                    <br />
                    Kapasitas orang yang tertera adalah kapasitas maksimal
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('continueToReservation').addEventListener('click', function() {
                window.location.href = "{{ route('konfirmasi') }}";
            });
        });
    </script>
@endsection
