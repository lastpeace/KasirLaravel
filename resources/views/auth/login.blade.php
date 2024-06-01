<x-guest-layout>
    <div class="flex flex-col  bg-indigo-700 max-md:w-full">
        <div class="flex gap-10 flex-row flex-grow max-md:flex-col max-md:max-w-full">
            <div class="flex flex-grow  w-[40%] max-md:max-w-full justify-center item-center">
                <div class="flex flex-col flex-grow w-full text-lg font-light text-black max-md:mt-10 max-md:w-screen">
                    <div class="justify-center item-center flex flex-col">
                        <img loading="lazy" srcset="{{ asset('favicon.png') }}" class="max-w-full w-[170px]" />
                    </div>
                    <div class="flex flex-col flex-grow text-right text-white justify-center item-center">
                        <div class="flex flex-col self-end ">
                            <div class="text-4xl font-semibold">
                                Selamat Datang Kembali
                                <br />
                                di Mono Cafe
                            </div>
                            <div class="flex self-end mt-11 ">
                                Masuk untuk akses reservasi online dan memesan
                                <br> menu.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[60%] h-screen max-md:max-w-screen justify-center">
                <div
                    class="flex flex-col flex-grow items-center justify-center w-full text-lg font-light text-black bg-white rounded-[75px_0px_0px_75px] max-md:mt-10 max-md:w-screen">
                    <div class="flex self-start mt-24 ml-20   max-md:mt-10 max-md:ml-2.5">
                        <button onclick="window.location.href = '{{ route('dashboard') }}';"
                            class="flex items-center bg-transparent border-none outline-none focus:outline-none">
                            <svg class="w-6 h-6 text-gray-800 mb-10" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex font-semibold text-3xl max-md:mt-10 max-md:ml-2.5">Masuk</div>
                    <div class="mt-4">Untuk pengalaman lebih baik di Mono Cafe.</div>
                    <!-- Session Status -->

                    <div class="justify-center flex-col flex text-center item-center">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>

                                <x-text-input id="email"
                                    class="justify-center items-start px-12 py-5 mt-8 max-w-full rounded-lg border border-solid border-neutral-400 text-neutral-400 w-[434px] max-md:px-5"
                                    type="email" placeholder="Masukan Email anda" name="email" :value="old('email')"
                                    required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">


                                <x-text-input id="password"
                                    class="justify-center items-start px-12 py-5 mt-8 max-w-full rounded-lg border border-solid border-neutral-400 text-neutral-400 w-[434px] max-md:px-5"
                                    type="password" placeholder="Masukan Password anda" name="password" required
                                    autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4 self-start">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                        name="remember">
                                    <span
                                        class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <x-primary-button class="ms-3">
                                    {{ __('Masuk') }}
                                </x-primary-button>
                            </div>
                        </form>
                        <div class="mt-5 text-center">Silahkan Login/Daftar</div>
                        <div class="mt-4 text-indigo-700 underline justify-center text-center item-center">
                            <a href="{{ route('register') }}" class="">Belum
                                Punya Akun?</a>
                            <a class="font-medium text-indigo-700 underline" href="{{ route('register') }}">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
