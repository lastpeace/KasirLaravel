<nav class="navbar navbar-expand-lg mx-auto">
    <div
        class="flex gap-5 pt-5 pr-4 pb-3 pl-20 w-full bg-white max-md:flex-wrap max-md:pl-5 max-md:max-w-full justify-end">
        <div class="flex gap-2.5">
            <!-- Gambar profil user -->
            <div class="flex flex-col my-auto">
                <!-- Nama user -->
                <div class="text-sm font-medium text-black">{{ auth()->user()->name }}</div>
                <!-- Peran user -->
                <div class="mt-3 text-sm text-zinc-900">{{ auth()->user()->role }}</div>
            </div>
        </div>
    </div>
</nav>
