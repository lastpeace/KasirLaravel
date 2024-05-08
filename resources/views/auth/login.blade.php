<x-guest-layout>
    <div class="pl-14 bg-indigo-700 max-md:pl-5">
        <div class="flex gap-5 max-md:flex-col max-md:max-w-full">
            <div class="flex flex-col w-[40%] max-md:ml-0 max-md:max-w-full">
                <div class="flex flex-col text-right text-white max-md:mt-10 max-md:max-w-full">
                    <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                        class="max-w-full aspect-[1.16] w-[170px]" />
                    <div class="flex flex-col self-end mt-52 max-w-full w-[420px] max-md:mt-10">
                        <div class="text-4xl font-semibold">
                            Selamat Datang Kembali
                            <br />
                            di Mono Cafe
                        </div>
                        <div class="self-end mt-11 text-lg max-md:mt-10">
                            Masuk untuk akses reservasi online dan memesan menu.
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col ml-5 w-[60%] max-md:ml-0 max-md:w-full">
                <div
                    class="flex flex-col grow items-center p-20 w-full text-lg font-light text-black bg-white rounded-[75px_0px_0px_75px] max-md:px-5 max-md:mt-10 max-md:max-w-full">
                    <div class="self-start mt-24 ml-20 text-3xl font-semibold max-md:mt-10 max-md:ml-2.5">
                        <button onclick="window.location.href = '{{ route('dashboard') }}';"
                            class="flex items-center bg-transparent border-none outline-none focus:outline-none">
                            <svg class="w-6 h-6 text-gray-800 mb-10" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"></path>
                            </svg>
                        </button>
                        Masuk
                    </div>
                    <div class="mt-4">Untuk pengalaman lebih baik di Mono Cafe.</div>
                    <!-- Session Status -->
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
                        <div class="block mt-4">
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
                    <div class="mt-4 text-indigo-700 underline">
                        <a href="{{ route('register') }}" class="">Belum
                            Punya Akun?</a>
                        <a class="font-medium text-indigo-700 underline" href="{{ route('register') }}">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
