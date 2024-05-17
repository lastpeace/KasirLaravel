@extends('layouts.app')

@section('content')
    <div class="flex flex-col self-end px-12 py-7 mt-0 max-w-full bg-white rounded-lg w-[704px] max-md:px-5">
        <div class="max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col grow max-md:mt-3">
                        <div class="text-xl font-medium text-black">
                            Metode Pembayaran
                            <span class="text-sm font-light">(pilih salah satu)</span>
                        </div>
                        <div class="mt-4 text-xs font-light leading-5 text-black">
                            Pembayaran hanya bisa dilakukan dengan QRIS
                        </div>
                        <div class="flex gap-5 mt-4">
                            <div class="flex flex-col justify-center my-auto">
                                <div
                                    class="flex flex-col justify-center p-1 rounded-full border border-indigo-700 border-solid">
                                    <div class="shrink-0 w-3 h-3 bg-indigo-700 rounded-full"></div>
                                </div>
                            </div>
                            <div class="text-sm font-medium leading-5 text-black">
                                Bayar DP 50% Dari Total Pesanan
                            </div>
                        </div>
                        <div class="text-xs font-light leading-4 text-justify text-red-600">
                            (Tidak dapat dikembalikan jika reservasi dibatalkan)
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col flex-wrap grow content-center pr-2 mt-16 max-md:mt-10">
                        <div class="flex gap-5">
                            <div class="flex flex-col justify-center my-auto">
                                <div class="shrink-0 h-5 rounded-full border border-indigo-700 border-solid"></div>
                            </div>
                            <div class="text-sm font-medium leading-5 text-black">
                                Bayar Penuh
                            </div>
                        </div>
                        <div class="text-xs font-light leading-4 text-justify text-red-600">
                            (Pengembalian 50% dari total pesanan tersedia jika pemesanan
                            dibatalkan
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-9 text-xl font-medium text-black max-md:max-w-full">
            Ringkasan Pesanan
        </div>
        <div class="flex gap-5 justify-between mt-5 w-full max-md:flex-wrap max-md:max-w-full">
            <div class="flex gap-5 justify-between">
                @foreach ($latestOrder->items as $item)
                    <div class="flex flex-col items-center">
                        <img loading="lazy" src="{{ asset($item->product->image) }}" class="aspect-square w-[75px]" />
                        <div class="flex flex-col my-auto text-base text-black">
                            <div>{{ $item->product->name }}</div>
                            <div class="mt-5 text-sm font-light leading-4 text-justify">x {{ $item->quantity }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex flex-col self-start mt-4 text-lg font-medium text-black whitespace-nowrap">
                @foreach ($latestOrder->items as $item)
                    <div>{{ $item->quantity * $item->product->price }}</div>
                @endforeach
            </div>
        </div>
        <div
            class="flex gap-5 justify-between self-end mt-28 max-w-full text-xl font-medium text-black whitespace-nowrap w-[212px] max-md:mt-10">
            <div>TOTAL</div>
            <div>{{ $latestOrder->total }}</div>
        </div>

    </div>
@endsection
