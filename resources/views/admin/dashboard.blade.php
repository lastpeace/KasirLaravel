@extends('layouts.app')

@section('content')
    <div class="flex flex-col px-14 pb-16 w-full bg-stone-50 max-md:px-5 max-md:max-w-full">
        <div class="flex gap-5 px-12 w-full max-md:flex-wrap max-md:px-5 max-md:max-w-full">
            <div class="flex-auto max-md:max-w-full">
                <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                    <div class="flex flex-col w-[32%] max-md:ml-0 max-md:w-full">
                        <img loading="lazy" srcset="..."
                            class="grow shrink-0 max-w-full aspect-[1.19] w-[170px] max-md:mt-10" />
                    </div>
                    <div class="flex flex-col ml-5 w-[68%] max-md:ml-0 max-md:w-full">
                        <div
                            class="flex gap-5 self-stretch my-auto text-lg font-medium text-black max-md:flex-wrap max-md:mt-10 max-md:max-w-full">
                            <div class="grow">Beranda</div>
                            <div>Menu</div>
                            <div>Reservasi</div>
                            <div class="flex-auto">Tentang Kami</div>
                            <div>Kontak</div>
                        </div>
                    </div>
                </div>
            </div>
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/1d2d6ca032900ba949eafc75996e872ae6899e38cef81b47b2a166847eccc225?"
                class="shrink-0 my-auto max-w-full aspect-[1.85] w-[101px]" />
        </div>
        <div class="self-center mt-24 w-full max-w-[1206px] max-md:mt-10 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                    <div class="flex z-10 flex-col mt-14 text-xl max-md:mt-10 max-md:max-w-full">
                        <div class="text-5xl font-bold text-indigo-700 max-md:max-w-full max-md:text-4xl">
                            Kelezatan Pilihan di
                            <span class="text-indigo-700">Mono Cafe</span>
                        </div>
                        <div class="mt-10 text-black max-md:max-w-full">
                            Nikmati Menu Andalan Kami dari Minuman Pilihan, Snack Menggiurkan,
                            Hingga Hidangan Berat Menggoda. Reservasi Meja dan Rasakan Sensasi
                            Kuliner Terbaik di Mono Cafe!
                        </div>
                        <div
                            class="justify-center self-start px-7 py-6 mt-10 font-semibold text-white bg-black rounded-[50px] max-md:px-5">
                            Reservasi Sekarang
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                    <img loading="lazy" srcset="..." class="grow w-full aspect-[1.15] max-md:max-w-full" />
                </div>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection
