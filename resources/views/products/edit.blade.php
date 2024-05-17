@extends('layouts.app2')

@section('content')
    <div class="flex flex-col pt-4 pb-11 bg-white rounded-lg max-w-[850px]">
        <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/56fadd62b978a5695370f459f528d0fd35dd1d1c1f19755b76c1f05283abcbeb?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
            class="self-end aspect-[0.96] w-[50px]" />
        <div class="flex flex-col items-start pl-20 mt-3.5 w-full max-md:pl-5 max-md:max-w-full">
            <div class="text-lg font-semibold text-indigo-700 max-md:max-w-full">Edit Produk</div>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="mt-6">
                @csrf
                @method('PUT')
                <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                    <div class="flex flex-col w-[65%] max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col grow text-xs text-indigo-700 max-md:mt-10 max-md:max-w-full">
                            <div class="text-sm font-semibold text-neutral-500 max-md:max-w-full">Menu</div>
                            <input type="text" name="name" value="{{ $product->name }}"
                                class="px-3.5 py-3 mt-4 max-w-full whitespace-nowrap rounded-lg border border-indigo-700 border-solid w-[217px] max-md:pr-5"
                                placeholder="Nama Menu">
                            <input type="text" name="type" value="{{ $product->type }}"
                                class="px-5 py-3 mt-5 rounded-lg border border-indigo-700 border-solid max-md:px-5 max-md:max-w-full"
                                placeholder="Tipe">
                            <input type="number" name="price" value="{{ $product->price }}"
                                class="px-5 py-3 mt-5 rounded-lg border border-indigo-700 border-solid max-md:px-5 max-md:max-w-full"
                                placeholder="Harga">
                            <textarea name="description"
                                class="px-6 pt-5 pb-14 mt-5 rounded-lg border border-indigo-700 border-solid max-md:px-5 max-md:max-w-full"
                                placeholder="Deskripsi">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="flex flex-col ml-5 w-[35%] max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col text-xs text-neutral-500 max-md:mt-10">
                            <div class="text-sm font-semibold">Gambar</div>
                            <div class="mt-4 text-zinc-500">Upload gambar</div>
                            <input type="file" name="image" class="hidden">
                            <label for="image"
                                class="justify-center py-16 pr-16 pl-16 mt-6 text-3xl text-indigo-700 whitespace-nowrap rounded-lg border border-indigo-700 border-solid max-md:pr-5 max-md:pl-6 cursor-pointer">
                                +
                            </label>
                            <div class="mt-6 text-sm font-semibold">Status</div>
                            <div class="mt-3.5 text-zinc-500">Apakah produk masih tersedia</div>
                            <div
                                class="flex gap-5 justify-between py-2.5 pr-2.5 pl-8 mt-4 text-indigo-700 whitespace-nowrap rounded-lg border border-indigo-700 border-solid max-md:pl-5">
                                <div class="my-auto">Ya</div>
                                <input type="radio" name="status" value="{{ \App\Models\Product::AVAILABLE }}"
                                    {{ $product->status == \App\Models\Product::AVAILABLE ? 'checked' : '' }}
                                    class="shrink-0 rounded-md border border-indigo-700 border-solid h-[13px] w-[18px]">
                                <div class="flex gap-5">
                                    <div class="my-auto">Tidak</div>
                                    <input type="radio" name="status" value="{{ \App\Models\Product::OUT_OF_STOCK }}"
                                        {{ $product->status == \App\Models\Product::OUT_OF_STOCK ? 'checked' : '' }}
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
@endsection
