<!-- resources/views/auth/register.blade.php -->

<x-guest-layout>
    <div class="w-[1440px] h-[875px] relative bg-orange-400">
        <div class="w-[1328px] left-[56px] top-[-24px] absolute justify-start items-center gap-[218px] inline-flex">
            <img loading="lazy"
                srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/a65a80bb9101c7189a5341ba1cd97d309100982f74bf0d0f2e46fea157d18165?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                class="max-w-full aspect-[1.16] w-[170px]" />
        </div>
        <div class="w-[764px] h-[875px] left-[676px] top-0 absolute bg-white rounded-tl-[75px] rounded-bl-[75px]"></div>
        <div
            class="w-[347px] h-[88px] left-[252px] top-[314px] absolute text-right text-white text-4xl font-semibold font-['Inter']">
            Selamat Datang<br />di Mono Cafe</div>

        <div
            class="w-[232px] h-[34px] left-[840px] top-[162px] absolute text-black text-[28px] font-semibold font-['Inter']">
            Buat Akun </div>
        <div
            class="w-[420px] h-[187px] left-[179px] top-[431px] absolute text-right text-white text-lg font-normal font-['Inter']">
            Daftarkan diri Anda untuk mendapatkan pelayanan terbaik, akses reservasi online, dan memesan menu dari Mono
            Cafe. Bergabunglah dengan kami untuk menikmati berbagai fasilitas yang kami tawarkan.</div>
        <div
            class="w-[186px] h-[52px] left-[968px] top-[635px] absolute text-center text-black text-lg font-light font-['Inter']">
            atau daftar dengan <img loading="lazy"
                srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/9188d41af969aaddd6d33062df4cf9decf4f6fafce62a931bb0ddfce6031eb9b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/9188d41af969aaddd6d33062df4cf9decf4f6fafce62a931bb0ddfce6031eb9b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/9188d41af969aaddd6d33062df4cf9decf4f6fafce62a931bb0ddfce6031eb9b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/9188d41af969aaddd6d33062df4cf9decf4f6fafce62a931bb0ddfce6031eb9b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/9188d41af969aaddd6d33062df4cf9decf4f6fafce62a931bb0ddfce6031eb9b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/9188d41af969aaddd6d33062df4cf9decf4f6fafce62a931bb0ddfce6031eb9b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/9188d41af969aaddd6d33062df4cf9decf4f6fafce62a931bb0ddfce6031eb9b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/9188d41af969aaddd6d33062df4cf9decf4f6fafce62a931bb0ddfce6031eb9b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                class="mt-4 rounded-full border border-solid aspect-square border-neutral-400 stroke-[1px] w-[60px]" />
        </div>

        <div class="w-[249px] h-[65px] left-[948px] top-[739px] absolute"><span
                style="text-black text-lg font-light font-['Inter']">Sudah punya akun? </span><span
                style="text-orange-400 text-lg font-medium font-['Inter'] underline">Masuk</span></div>
        <form method="POST" action="{{ route('register') }}"
            class="w-[440px] h-[318px] left-[838px] top-[229px] absolute">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block mt-1 text-lg font-normal font-['Inter']">Nama</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus
                    autocomplete="name" class="block mt-1 w-full border border-neutral-400 rounded-lg">
                @error('name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="block mt-1 text-lg font-normal font-['Inter']">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="email"
                    class="block mt-1 w-full border border-neutral-400 rounded-lg">
                @error('email')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block mt-1 text-lg font-normal font-['Inter']">Kata Sandi</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="block mt-1 w-full border border-neutral-400 rounded-lg">
                @error('password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role -->
            <input type="hidden" id="role" name="role" value="customer">

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block mt-1 text-lg font-normal font-['Inter']">Konfirmasi Kata
                    Sandi</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password" class="block mt-1 w-full border border-neutral-400 rounded-lg">
                @error('password_confirmation')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Sudah
                    punya akun?</a>
                <button type="submit" class="ml-4 px-4 py-2 bg-indigo-600 text-white rounded-md">Daftar</button>
            </div>
        </form>
    </div>
</x-guest-layout>
