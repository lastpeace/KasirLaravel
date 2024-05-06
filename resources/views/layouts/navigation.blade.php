<nav class="navbar navbar-expand-lg  mx-auto">
    <div class="container mx-auto">
        <div class="flex flex-col ml-5 w-[100%] max-md:ml-0 max-md:w-full mx-auto">
            <div class="flex gap-5 px-11 w-full max-md:flex-wrap max-md:px-5 max-md:max-w-full mx-auto">
                <div class="flex-auto max-md:max-w-full mx-auto">
                    <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                        <div class="flex flex-col w-[40%] max-md:ml-0 max-md:w-full mx-auto">
                            <img loading="lazy"
                                srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/4777fe30da51bd78b81f3ab8abcccbb0d71ca823b1b83ee5adec57aa778875f0?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                                class="grow shrink-0 max-w-full aspect-[1.18] w-[170px] max-md:mt-10" />
                        </div>
                        <div class="flex flex-col ml-5 w-[68%] max-md:ml-0 max-md:w-full">
                            <div
                                class="flex gap-5 self-stretch my-auto text-lg font-medium text-black max-md:flex-wrap max-md:mt-10 max-md:max-w-full">
                                <div class="w-[40%]">
                                    <p class="w-[40%]">Beranda</p>
                                </div>
                                <div class="w-[40%]"><a href="{{ route('products.index') }}">Menu</a></div>
                                <div class="w-[40%]">Reservasi</div>
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
                        <img class="w-8 h-8 rounded-full" src="public/img2.png" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                            <span
                                class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 ">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 ">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 ">Earnings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 ">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</nav>
