<x-guest-layout>
    <div class="flex flex-col bg-orange-700 max-md:w-full">
        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-[40%] max-md:h-screen">
                <div class="flex flex-col text-lg font-light text-black max-md:mt-10 ">
                    <div class="flex flex-col  text-right text-white max-md:mt-10 max-md:max-w-full">
                        <img loading="lazy" srcset="{{ asset('favicon.png') }}" class="max-w-full w-[170px]" />
                        <div
                            class="flex flex-col flex-grow self-end md:max-w-full w-[420px] max-md:mt-10 justify-center item-center">
                            <div class="text-4xl font-semibold">
                                Selamat Datang Kembali
                                <br />
                                di Mono Cafe
                            </div>
                            <div class=" mt-11 md:max-w-full max-md:mt-10">
                                Daftarkan diri Anda untuk mendapatkan pelayanan terbaik, akses
                                reservasi online, dan memesan menu dari Mono Cafe. Bergabunglah
                                dengan kami untuk menikmati berbagai fasilitas yang kami tawarkan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[60%] h-screen max-md:max-w-screen justify-center">
                <div>

                </div>
                <div
                    class="flex flex-col grow items-center p-20 w-full text-lg font-light text-black bg-white rounded-[75px_75px_75px_75px]  max-md:mt-10 max-md:w-screen">
                    <div class="self-start mt-18 ml-20 text-3xl font-semibold max-md:mt-10 max-md:ml-2.5">
                        <button onclick="window.location.href = '{{ route('login') }}';"
                            class="flex items-center bg-transparent border-none outline-none focus:outline-none">
                            <svg class="w-6 h-6 text-gray-800 mb-10" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"></path>
                            </svg>
                        </button>


                    </div>
                    <div class="flex font-semibold text-3xl max-md:mt-10 max-md:ml-2.5">Buat Akun</div>
                    <div class="justify-center flex-col flex text-center item-center">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name -->
                            <div class="mt-4">
                                <input id="name" type="text" placeholder="Masukan Nama anda" name="name"
                                    :value="old('name')" required autofocus autocomplete="name"
                                    class="justify-center items-start px-12 py-5 mt-8 max-w-full rounded-lg border border-solid border-neutral-400 text-neutral-400 w-[434px] max-md:px-5">
                                @error('name')
                                    <p class="mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Email Address -->
                            <div class="mt-4">
                                <input id="email" type="email" placeholder="Masukan Email anda" name="email"
                                    :value="old('email')" required autocomplete="email"
                                    class="justify-center items-start px-12 py-5 mt-8 max-w-full rounded-lg border border-solid border-neutral-400 text-neutral-400 w-[434px] max-md:px-5">
                                @error('email')
                                    <p class="text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mt-4">
                                <input id="password" type="password" placeholder="Masukan Password anda"
                                    name="password" required autocomplete="new-password"
                                    class="justify-center items-start px-12 py-5 mt-8 max-w-full rounded-lg border border-solid border-neutral-400 text-neutral-400 w-[434px] max-md:px-5">
                                @error('password')
                                    <p class="text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Role -->
                            <input type="hidden" id="role" name="role" value="customer">
                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <input id="password_confirmation" type="password" placeholder="Konfirmasi Password Anda"
                                    name="password_confirmation" required autocomplete="new-password"
                                    class="justify-center items-start px-12 py-5 mt-8 max-w-full rounded-lg border border-solid border-neutral-400 text-neutral-400 w-[434px] max-md:px-5">
                                @error('password_confirmation')
                                    <p class="text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-primary-button
                                    class="justify-center items-center px-16 py-5 mt-8 max-w-full font-medium text-center text-white whitespace-nowrap  rounded-[50px] w-[434px] max-md:px-5">
                                    {{ __('Daftar') }}
                                </x-primary-button>
                            </div>
                        </form>
                        <div class="mt-5 font-light text-center text-black">atau daftar dengan</div>
                        <div class="mt-4 text-indigo-700 underline">
                            <a href="{{ route('login') }}" class="">Sudah Punya Akun?</a>
                            <a class="font-medium text-indigo-700 underline" href="{{ route('login') }}">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
