<nav class="navbar navbar-expand-lg  mx-auto">
    <div class="container mx-auto">
        <div class="flex flex-col ml-5 w-[100%] max-md:ml-0 max-md:w-full mx-auto">
            <div class="flex gap-5 px-11 w-full max-md:flex-wrap max-md:px-5 max-md:max-w-full mx-auto">
                <div class="flex-auto max-md:max-w-full mx-auto">
                    <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                        <div class="flex flex-col w-[40%] max-md:ml-0 max-md:w-full mx-auto"><a
                                href="{{ route('dashboard') }}">
                                <img loading="lazy"
                                    srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                                    class="grow shrink-0 max-w-full aspect-[1.18] w-[170px] max-md:mt-10" /></a>
                        </div>
                        <div class="flex flex-col ml-5 w-[68%] max-md:ml-0 max-md:w-full">
                            <div
                                class="flex gap-5 self-stretch my-auto text-lg font-medium text-black max-md:flex-wrap max-md:mt-10 max-md:max-w-full">
                                <div class="w-[40%]">
                                    <p class="w-[40%]"><a href="{{ route('customer.dashboard') }}">Beranda</a></p>
                                </div>
                                <div class="w-[40%]"><a href="{{ route('products.index') }}">Menu</a></div>
                                <div class="w-[40%]"><a href="{{ route('orders.create') }}">Reservasi</a></div>
                                <div class="w-[40%]">
                                    <p>Tentang Kami</p>
                                </div>
                                <div class="w-[40%]">
                                    <p>Kontak</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="{{ asset('img2.png') }}" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        @guest
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 ">Masuk</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 ">Daftar</a>
                                </li>
                            </ul>
                        @else
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 ">Profile</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 ">Reservasi
                                        Saya</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <li>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-200">Keluar</a>
                                </li>
                            </ul>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
</nav>
