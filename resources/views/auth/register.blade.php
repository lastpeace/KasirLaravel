<x-guest-layout>
    <div class="pl-14 bg-orange-700 max-md:pl-5">
        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-[40%] max-md:ml-0 max-md:w-full">
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
                            Daftarkan diri Anda untuk mendapatkan pelayanan terbaik, akses
                            reservasi online, dan memesan menu dari Mono Cafe. Bergabunglah
                            dengan kami untuk menikmati berbagai fasilitas yang kami tawarkan.
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col ml-5 w-[60%] max-md:ml-0 max-md:w-full">
                <div
                    class="flex flex-col grow items-center p-20 w-full text-lg font-light text-black bg-white rounded-[75px_0px_0px_75px] max-md:px-5 max-md:mt-10 max-md:max-w-full">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/af51dd739328d36a1d7d75e145377ef1eaae1de2603e9d0e86529e17f182ea68?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                        class="self-start mt-9 border-black border-solid aspect-[0.56] border-[3px] stroke-[2.5px] stroke-black w-[13px] max-md:ml-2" />
                    <div class="self-start mt-18 ml-20 text-3xl font-semibold max-md:mt-10 max-md:ml-2.5">
                        Buat Akun
                    </div>
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
                            <input id="password" type="password" placeholder="Masukan Password anda" name="password"
                                required autocomplete="new-password"
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
</x-guest-layout>
