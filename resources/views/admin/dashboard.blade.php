@extends('layouts.app')

@section('content')
    <div class="flex flex-col px-14 pb-16 w-full bg-stone-50 max-md:px-5 max-md:max-w-full">
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
                    <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/fddc927a13a7f85be599d241583e2332f444c3284362dc2cfe09ffd05283e800?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/fddc927a13a7f85be599d241583e2332f444c3284362dc2cfe09ffd05283e800?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/fddc927a13a7f85be599d241583e2332f444c3284362dc2cfe09ffd05283e800?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/fddc927a13a7f85be599d241583e2332f444c3284362dc2cfe09ffd05283e800?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/fddc927a13a7f85be599d241583e2332f444c3284362dc2cfe09ffd05283e800?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/fddc927a13a7f85be599d241583e2332f444c3284362dc2cfe09ffd05283e800?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/fddc927a13a7f85be599d241583e2332f444c3284362dc2cfe09ffd05283e800?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/fddc927a13a7f85be599d241583e2332f444c3284362dc2cfe09ffd05283e800?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                        class="grow w-full aspect-[1.15] max-md:max-w-full" />
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center items-center p-20 w-full bg-indigo-700 max-md:px-5 max-md:max-w-full">
        <div class="mt-5 text-5xl font-semibold text-stone-200 max-md:max-w-full max-md:text-4xl">
            Menu Terpopuler !!
        </div>
        <div class="mt-7 text-lg text-center text-stone-200 w-[592px] max-md:max-w-full">
            Rasakan kelezatan terpopuler dari Mono Cafe dengan sensasi tak
            tertandingkan.
        </div>
        <div class="mt-16 mb-2.5 w-full max-w-[1253px] max-md:mt-10 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col grow p-7 w-full text-black bg-white rounded-3xl max-md:px-5 max-md:mt-10">
                        <img loading="lazy"
                            srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/09cc6dbba6ea67279d1a634a5fe112faa0d30b3d0a5eebf2e6bac345e7ae721b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/09cc6dbba6ea67279d1a634a5fe112faa0d30b3d0a5eebf2e6bac345e7ae721b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/09cc6dbba6ea67279d1a634a5fe112faa0d30b3d0a5eebf2e6bac345e7ae721b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/09cc6dbba6ea67279d1a634a5fe112faa0d30b3d0a5eebf2e6bac345e7ae721b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/09cc6dbba6ea67279d1a634a5fe112faa0d30b3d0a5eebf2e6bac345e7ae721b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/09cc6dbba6ea67279d1a634a5fe112faa0d30b3d0a5eebf2e6bac345e7ae721b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/09cc6dbba6ea67279d1a634a5fe112faa0d30b3d0a5eebf2e6bac345e7ae721b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/09cc6dbba6ea67279d1a634a5fe112faa0d30b3d0a5eebf2e6bac345e7ae721b?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                            class="w-full aspect-[1.05]" />
                        <div class="mt-6 text-2xl font-medium">Garlic Bread Delight</div>
                        <div class="mt-5 text-lg font-light text-justify">
                            Diselimuti dengan campuran mentega bawang yang harum dan taburan
                            keju parmesan yang melengkapi cita rasa lezatnya.
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full">
                    <div
                        class="flex flex-col grow px-7 py-10 w-full text-black bg-white rounded-3xl max-md:px-5 max-md:mt-10">
                        <img loading="lazy"
                            srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/dba419f53cc4409565fb6ed7b6f12d731a7b990833db5e3b7b56871e1b2c32b1?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/dba419f53cc4409565fb6ed7b6f12d731a7b990833db5e3b7b56871e1b2c32b1?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/dba419f53cc4409565fb6ed7b6f12d731a7b990833db5e3b7b56871e1b2c32b1?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/dba419f53cc4409565fb6ed7b6f12d731a7b990833db5e3b7b56871e1b2c32b1?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/dba419f53cc4409565fb6ed7b6f12d731a7b990833db5e3b7b56871e1b2c32b1?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/dba419f53cc4409565fb6ed7b6f12d731a7b990833db5e3b7b56871e1b2c32b1?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/dba419f53cc4409565fb6ed7b6f12d731a7b990833db5e3b7b56871e1b2c32b1?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/dba419f53cc4409565fb6ed7b6f12d731a7b990833db5e3b7b56871e1b2c32b1?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                            class="w-full aspect-[1.05]" />
                        <div class="mt-6 text-2xl font-medium">Creamy Chill Coffee</div>
                        <div class="mt-5 text-lg font-light text-justify max-md:mr-1.5">
                            Kesegaran kopi dingin kami yang lembut dan kaya rasa, dicampur
                            dengan susu yang creamy.
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full">
                    <div
                        class="flex flex-col grow px-7 py-7 w-full text-black bg-white rounded-3xl max-md:px-5 max-md:mt-10">
                        <img loading="lazy"
                            srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/b99a3ae615725ae962aa020198f195c14157fec9361bb99ab29285dc3c8e11d9?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/b99a3ae615725ae962aa020198f195c14157fec9361bb99ab29285dc3c8e11d9?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/b99a3ae615725ae962aa020198f195c14157fec9361bb99ab29285dc3c8e11d9?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/b99a3ae615725ae962aa020198f195c14157fec9361bb99ab29285dc3c8e11d9?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/b99a3ae615725ae962aa020198f195c14157fec9361bb99ab29285dc3c8e11d9?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/b99a3ae615725ae962aa020198f195c14157fec9361bb99ab29285dc3c8e11d9?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/b99a3ae615725ae962aa020198f195c14157fec9361bb99ab29285dc3c8e11d9?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/b99a3ae615725ae962aa020198f195c14157fec9361bb99ab29285dc3c8e11d9?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                            class="w-full aspect-[1.04]" />
                        <div class="mt-6 text-2xl font-medium">Mentai Beef BBQ Rice</div>
                        <div class="mt-6 text-lg font-light text-justify">
                            Daging sapi panggang dengan saus mentai lezat yang kaya rasa,
                            disajikan di atas nasi putih yang lembut.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col pb-12 w-full bg-stone-50 max-md:max-w-full">
        <div class="w-full bg-white max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                    <div class="grow max-md:mt-10 max-md:max-w-full">
                        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                            <div class="flex flex-col w-[34%] max-md:ml-0 max-md:w-full">
                                <img loading="lazy"
                                    srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/00f810bd510ec355b7c283d36aa583e1f5119c699b2708048fcfe77b9cea9017?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/00f810bd510ec355b7c283d36aa583e1f5119c699b2708048fcfe77b9cea9017?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/00f810bd510ec355b7c283d36aa583e1f5119c699b2708048fcfe77b9cea9017?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/00f810bd510ec355b7c283d36aa583e1f5119c699b2708048fcfe77b9cea9017?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/00f810bd510ec355b7c283d36aa583e1f5119c699b2708048fcfe77b9cea9017?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/00f810bd510ec355b7c283d36aa583e1f5119c699b2708048fcfe77b9cea9017?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/00f810bd510ec355b7c283d36aa583e1f5119c699b2708048fcfe77b9cea9017?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/00f810bd510ec355b7c283d36aa583e1f5119c699b2708048fcfe77b9cea9017?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                                    class="grow w-full aspect-[0.86]" />
                            </div>
                            <div class="flex flex-col ml-5 w-[66%] max-md:ml-0 max-md:w-full">
                                <div class="flex flex-col px-5 mt-9 max-md:max-w-full">
                                    <div class="text-4xl font-semibold text-black max-md:max-w-full">
                                        Fasilitas Mono Cafe
                                    </div>
                                    <div class="self-end mt-16 max-w-full w-[444px] max-md:mt-10">
                                        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                                            <div class="flex flex-col w-[38%] max-md:ml-0 max-md:w-full">
                                                <div
                                                    class="text-xl font-light leading-10 text-justify text-black max-md:mt-10">
                                                    Wifi Gratis
                                                    <br />
                                                    Mushola
                                                    <br />
                                                    Restroom
                                                    <br />
                                                </div>
                                            </div>
                                            <div class="flex flex-col ml-5 w-[62%] max-md:ml-0 max-md:w-full">
                                                <div
                                                    class="text-xl font-light leading-10 text-justify text-black max-md:mt-10">
                                                    Parkir Luas
                                                    <br />
                                                    Meeting Room
                                                    <br />
                                                    Ruang Indoor dan Outdoor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                    <div class="grow px-5 mt-14 max-md:mt-10 max-md:max-w-full">
                        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                            <div class="flex flex-col w-[57%] max-md:ml-0 max-md:w-full">
                                <div
                                    class="self-stretch my-auto text-xl font-light leading-10 text-justify text-black max-md:mt-10">
                                    Layanan Reservasi Online
                                    <br />
                                    Pilihan Menu Beragam
                                    <br />
                                    Sudut Baca Buku
                                </div>
                            </div>
                            <div class="flex flex-col ml-5 w-[43%] max-md:ml-0 max-md:w-full">
                                <img loading="lazy"
                                    srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/cd992c297b888946392db75087fc3c10c13ea7ffd4fef62a9e17ba1bd499b808?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/cd992c297b888946392db75087fc3c10c13ea7ffd4fef62a9e17ba1bd499b808?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/cd992c297b888946392db75087fc3c10c13ea7ffd4fef62a9e17ba1bd499b808?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/cd992c297b888946392db75087fc3c10c13ea7ffd4fef62a9e17ba1bd499b808?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/cd992c297b888946392db75087fc3c10c13ea7ffd4fef62a9e17ba1bd499b808?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/cd992c297b888946392db75087fc3c10c13ea7ffd4fef62a9e17ba1bd499b808?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/cd992c297b888946392db75087fc3c10c13ea7ffd4fef62a9e17ba1bd499b808?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/cd992c297b888946392db75087fc3c10c13ea7ffd4fef62a9e17ba1bd499b808?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                                    class="grow w-full aspect-[0.98] max-md:mt-10" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="self-center px-5 mt-14 w-full max-w-[1250px] max-md:mt-10 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-[37%] max-md:ml-0 max-md:w-full">
                    <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/303e4c96c2967c6620b2252f52e9f1b9dc6714c14b659687a4701bca8c04e9d7?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/303e4c96c2967c6620b2252f52e9f1b9dc6714c14b659687a4701bca8c04e9d7?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/303e4c96c2967c6620b2252f52e9f1b9dc6714c14b659687a4701bca8c04e9d7?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/303e4c96c2967c6620b2252f52e9f1b9dc6714c14b659687a4701bca8c04e9d7?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/303e4c96c2967c6620b2252f52e9f1b9dc6714c14b659687a4701bca8c04e9d7?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/303e4c96c2967c6620b2252f52e9f1b9dc6714c14b659687a4701bca8c04e9d7?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/303e4c96c2967c6620b2252f52e9f1b9dc6714c14b659687a4701bca8c04e9d7?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/303e4c96c2967c6620b2252f52e9f1b9dc6714c14b659687a4701bca8c04e9d7?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                        class="grow w-full aspect-[0.99] max-md:mt-10 max-md:max-w-full" />
                </div>
                <div class="flex flex-col ml-5 w-[63%] max-md:ml-0 max-md:w-full">
                    <div
                        class="self-stretch my-auto text-lg font-light text-justify text-black max-md:mt-10 max-md:max-w-full">
                        <span class="font-medium">Selamat datang di Mono Cafe!</span>
                        <br />
                        <br />
                        Kami adalah destinasi yang mengutamakan kenyamanan dan kenikmatan
                        kuliner. Di Mono Cafe, kami menawarkan suasana yang cozy dan nyaman,
                        cocok untuk bersantai sendiri atau berkumpul dengan orang-orang
                        terkasih.
                        <br />
                        <br />
                        Ruang kami didesain dengan teliti untuk menciptakan tempat yang
                        menginspirasi dan menyenangkan. Dari furnitur yang nyaman hingga
                        dekorasi yang menawan, setiap sudut Mono Cafe menghadirkan suasana
                        yang mengundang dan menyenangkan.
                        <br />
                        <br />
                        Nikmati berbagai pilihan snack dan makanan setiap hari, mulai dari
                        roti gurih hingga berbagai macam olahan nasi yang lezat. Kami juga
                        menyediakan kopi berkualitas tinggi dan minuman non kopi lainnya untuk
                        menemani pengalaman bersantap Anda. Dari kopi spesial hingga minuman
                        segar, semua ada di Mono Cafe untuk memuaskan berbagai selera.
                        <br />
                        <br />
                        Staf kami yang ramah dan penuh perhatian siap memberikan layanan
                        terbaik, sehingga setiap kunjungan ke Mono Cafe menjadi pengalaman
                        kuliner yang istimewa dan tak terlupakan.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col pt-16 w-full bg-stone-50 max-md:max-w-full">
        <div class="self-center w-full max-w-[1274px] max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-[45%] max-md:ml-0 max-md:w-full">
                    <div
                        class="flex flex-col px-5 mt-1.5 text-xl font-light text-right text-black max-md:mt-10 max-md:max-w-full">
                        <div class="flex flex-col items-end self-end max-w-full w-[397px]">
                            <div class="text-3xl font-semibold">Temukan Kami Di Sini</div>
                            <div class="self-stretch mt-11 max-md:mt-10">
                                Alamat: Jalan Merdeka No. 123, Semarang, Jawa Tengah 12345
                            </div>
                            <div class="mt-12 font-medium max-md:mt-10">
                                Jam Operasional Mono Cafe
                            </div>
                            <div class="mt-6">
                                Senin - Jumat: 08.00 - 22.00 WIBSabtu - Minggu: 09.00 - 23.00 WIB
                            </div>
                        </div>
                        <div class="mt-16 max-md:mt-10 max-md:max-w-full">
                            Kami dengan senang hati menantikan kunjungan Anda untuk merasakan
                            pengalaman menyantap sajian luar biasa di Mono Cafe
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-5 w-[55%] max-md:ml-0 max-md:w-full">
                    <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/5380afcafe84bc0c86387b7e3f27566138e83a2edf5829209c924a4305623718?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/5380afcafe84bc0c86387b7e3f27566138e83a2edf5829209c924a4305623718?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/5380afcafe84bc0c86387b7e3f27566138e83a2edf5829209c924a4305623718?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/5380afcafe84bc0c86387b7e3f27566138e83a2edf5829209c924a4305623718?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/5380afcafe84bc0c86387b7e3f27566138e83a2edf5829209c924a4305623718?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/5380afcafe84bc0c86387b7e3f27566138e83a2edf5829209c924a4305623718?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/5380afcafe84bc0c86387b7e3f27566138e83a2edf5829209c924a4305623718?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/5380afcafe84bc0c86387b7e3f27566138e83a2edf5829209c924a4305623718?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                        class="grow w-full aspect-[1.72] max-md:mt-10 max-md:max-w-full" />
                </div>
            </div>
        </div>
        <div class="px-16 pb-6 mt-12 w-full bg-orange-400 max-md:px-5 max-md:mt-10 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-2/5 max-md:ml-0 max-md:w-full">
                    <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/d384593a59b9f74edd129babf3d508f5e54d8a3854cfd4a07c5771651795c02e?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/d384593a59b9f74edd129babf3d508f5e54d8a3854cfd4a07c5771651795c02e?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d384593a59b9f74edd129babf3d508f5e54d8a3854cfd4a07c5771651795c02e?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/d384593a59b9f74edd129babf3d508f5e54d8a3854cfd4a07c5771651795c02e?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/d384593a59b9f74edd129babf3d508f5e54d8a3854cfd4a07c5771651795c02e?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d384593a59b9f74edd129babf3d508f5e54d8a3854cfd4a07c5771651795c02e?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/d384593a59b9f74edd129babf3d508f5e54d8a3854cfd4a07c5771651795c02e?apiKey=bb6773fa61624e21adc05bfe1a2741a5&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/d384593a59b9f74edd129babf3d508f5e54d8a3854cfd4a07c5771651795c02e?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                        class="shrink-0 max-w-full aspect-square w-[276px] max-md:mt-10" />
                </div>
                <div class="flex flex-col ml-5 w-[16%] max-md:ml-0 max-md:w-full">
                    <div
                        class="flex flex-col justify-center self-stretch my-auto text-lg text-justify text-white max-md:mt-10">
                        <div>Beranda</div>
                        <div class="mt-7">Menu</div>
                        <div class="mt-7">Reservasi</div>
                        <div class="mt-7">Tentang Kami</div>
                        <div class="mt-6">Kontak</div>
                    </div>
                </div>
                <div class="flex flex-col ml-5 w-[44%] max-md:ml-0 max-md:w-full">
                    <div
                        class="flex flex-col self-stretch my-auto text-lg text-justify text-white whitespace-nowrap max-md:mt-10">
                        <div class="flex gap-5">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/5faa00b15529ff7f47a0ff71af668698792e4e091ea851fb69f5b3a21680fecc?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                                class="shrink-0 w-6 aspect-square" />
                            <div class="flex-auto my-auto">monocafeservices@gmail.com</div>
                        </div>
                        <div class="flex gap-5 mt-6">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/3e4c1f0ccb3b9a5d13a18a37cfba335a970ddd6c019a76d8655f5e83f6dcfe14?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                                class="shrink-0 w-6 aspect-square" />
                            <div class="flex-auto">@monocafe</div>
                        </div>
                        <div class="flex gap-5 mt-6">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/b6a0e3a150d0e3140972e37e5f4c237c55e6acf39ed9366c0656156c764bcc66?apiKey=bb6773fa61624e21adc05bfe1a2741a5&"
                                class="shrink-0 w-6 aspect-square" />
                            <div class="flex-auto my-auto">0857269412398</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="justify-center items-center py-6 pr-16 pl-32 w-full text-lg font-light text-justify text-white bg-black max-md:px-5 max-md:max-w-full">
            © 2024 Mono Cafe. Hak Cipta Dilindungi Undang-Undang.
        </div>
    </div>
@endsection
