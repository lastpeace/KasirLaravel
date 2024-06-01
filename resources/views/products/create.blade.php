@extends('layouts.app2')

@section('content')
    <div class="flex justify-center items-center h-screen bg-white">
        <div class="flex flex-col pt-4 pb-11 bg-white rounded-lg max-w-[850px] ">
            <div class=" self-end aspect-[0.96] w-[50px]">
                <button onclick="window.location.href = '{{ route('admin.products.index') }}';"
                    class="flex items-center bg-transparent border-none outline-none focus:outline-none">
                    <svg class="h-8 w-8 text-slate-900" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="12" cy="12" r="9" />
                        <path d="M10 10l4 4m0 -4l-4 4" />
                    </svg>
                </button>
            </div>


            <div class="flex flex-col items-start pl-20 mt-3.5 w-full max-md:pl-5 max-md:max-w-full">
                <div class="text-lg font-semibold text-indigo-700 max-md:max-w-full">Tambah Produk</div>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mt-6">
                    @csrf
                    <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                        <div class="flex flex-col w-[65%] max-md:ml-0 max-md:w-full">
                            <div class="flex flex-col grow text-xs text-indigo-700 max-md:mt-10 max-md:max-w-full">
                                <div class="text-sm font-semibold text-neutral-500 max-md:max-w-full">Menu</div>
                                <input type="text" name="name"
                                    class="px-3.5 py-3 mt-4 max-w-full whitespace-nowrap rounded-lg border border-indigo-700 border-solid w-[217px] max-md:pr-5"
                                    placeholder="Nama Menu">
                                <select name="type"
                                    class="px-5 py-3 mt-5 rounded-lg border border-indigo-700 border-solid max-md:px-5 max-md:max-w-full">
                                    <option value="makanan">Makanan</option>
                                    <option value="minuman">Minuman</option>
                                    <option value="snack">Snack</option>
                                </select>

                                <input type="number" name="price"
                                    class="px-5 py-3 mt-5 rounded-lg border border-indigo-700 border-solid max-md:px-5 max-md:max-w-full"
                                    placeholder="Harga">
                                <textarea name="description"
                                    class="px-6 pt-5 pb-14 mt-5 rounded-lg border border-indigo-700 border-solid max-md:px-5 max-md:max-w-full"
                                    placeholder="Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-col ml-5 w-[35%] max-md:ml-0 max-md:w-full">
                            <div class="flex flex-col text-xs text-neutral-500 max-md:mt-10">
                                <div class="text-sm font-semibold">Gambar</div>
                                <div class="mt-4 text-zinc-500">Upload gambar</div>
                                <input type="file" name="image" class="hidden">
                                <!-- Input untuk upload gambar -->
                                <input type="file" id="imageInput" name="image" class="hidden">

                                <!-- Label untuk tombol unggah gambar -->
                                <label for="imageInput"
                                    class="justify-center py-16 pr-16 pl-16 mt-6 text-3xl text-indigo-700 whitespace-nowrap rounded-lg border border-indigo-700 border-solid max-md:pr-5 max-md:pl-6 cursor-pointer">
                                    <img id="imagePreview" class="hidden" src="#" alt="Preview Gambar"
                                        style="max-width: 100%; max-height: 200px;">
                                </label>

                                <!-- Pratinjau gambar -->


                                <div class="mt-6 text-sm font-semibold">Status</div>
                                <div class="mt-3.5 text-zinc-500">Apakah produk masih tersedia</div>
                                <div
                                    class="flex gap-5 justify-between py-2.5 pr-2.5 pl-8 mt-4 text-indigo-700 whitespace-nowrap rounded-lg border border-indigo-700 border-solid max-md:pl-5">
                                    <div class="my-auto">Ya</div>
                                    <input type="radio" name="status" value="{{ \App\Models\Product::AVAILABLE }}"
                                        class="shrink-0 rounded-md border border-indigo-700 border-solid h-[13px] w-[18px]">
                                    <div class="flex gap-5">
                                        <div class="my-auto">Tidak</div>
                                        <input type="radio" name="status" value="{{ \App\Models\Product::OUT_OF_STOCK }}"
                                            class="shrink-0 rounded-md border border-indigo-700 border-solid h-[13px] w-[18px]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="justify-center self-center px-16 py-3 mt-12 ml-10 text-sm font-semibold text-white whitespace-nowrap bg-indigo-700 rounded-lg border border-solid border-zinc-300 max-md:pr-7 max-md:pl-7 max-md:mt-10">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan pratinjau gambar saat file dipilih
        function previewImage(event) {
            var reader = new FileReader(); // Membuat objek FileReader

            reader.onload = function() {
                var img = document.getElementById('imagePreview'); // Mendapatkan elemen img untuk pratinjau
                img.src = reader.result; // Menetapkan sumber gambar ke hasil pembacaan file
                img.classList.remove('hidden'); // Menampilkan elemen img
            }

            // Membaca file yang dipilih sebagai URL data
            reader.readAsDataURL(event.target.files[0]);
        }

        // Mendapatkan elemen input gambar
        var input = document.getElementById('imageInput');

        // Menambahkan event listener untuk peristiwa perubahan nilai pada input gambar
        input.addEventListener('change', previewImage);
    </script>
@endsection
