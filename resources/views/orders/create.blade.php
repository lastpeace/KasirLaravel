@extends('layouts.app')

@section('content')
    <div class="flex">
        <div class="flex justify-between items-center flex-col md:flex-row">
            <button id="semuaBtn"
                class="w-[69px] md:w-[142px] h-[19.54px] md:h-[42.17px] bg-black text-white rounded-[50px] mb-2 md:mb-0">Semua</button>
            <button id="minumanBtn"
                class="w-[69px] md:w-[142px] h-[19.54px] md:h-[42.17px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Minuman</button>
            <button id="makananBtn"
                class="w-[69px] md:w-[142px] h-[19.54px] md:h-[42.17px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Makanan</button>
            <button id="snackBtn"
                class="w-[47px] md:w-[142px] h-[19.54px] md:h-[42.17px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Snack</button>
        </div>
    </div>

    <div class="flex mt-9">
        <div class="flex flex-col gap-5 max-md:flex-col max-md:gap-0">
            @php $rowCount = ceil($products->count() / 3); @endphp
            @for ($i = 0; $i < $rowCount; $i++)
                <div class="flex max-md:flex-row max-md:w-full gap-20">
                    @foreach ($products->skip($i * 3)->take(3) as $product)
                        <div class="flex max-md:ml-0 max-md:w-[33.33%] w-full menu-item {{ strtolower($product->type) }}">
                            <div class="flex flex-col grow justify-center text-sm text-black max-md:mt-10">
                                <div
                                    class="flex flex-col px-4 py-4 bg-white rounded-2xl border border-solid border-neutral-400 ">
                                    <img loading="lazy" src="{{ asset($product->image) }}"
                                        class="self-center aspect-square w-[180px]" />
                                    <div class="mt-3 text-base font-medium max-md:mr-2.5">{{ $product->name }}</div>
                                    <div class="mt-2.5 font-light">{{ $product->price }}</div>
                                    <div onclick="addToCart('{{ $product->name }}', {{ $product->price }})"
                                        class="justify-center px-12 py-3 mt-5 text-center text-white whitespace-nowrap bg-indigo-700 rounded-2xl max-md:px-5 max-md:mr-1.5 cursor-pointer">
                                        Tambahkan
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endfor
        </div>

        <div
            class="flex w-[40%] flex-col px-7 py-6 text-black bg-white rounded-lg border border-solid border-neutral-400 max-md:px-5 ">
            <div class="text-xl font-medium mb-4">Keranjang Belanja</div>
            <div id="cart-items">
                @if (session('cart'))
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach (session('cart') as $index => $item)
                        @php
                            $totalItemPrice = $item['price'] * $item['quantity'];
                            $totalPrice += $totalItemPrice;
                        @endphp
                        <div class="flex justify-between items-center mb-2">
                            <div>{{ $item['name'] }}</div>
                            <div>{{ $item['price'] }} {{ $item['quantity'] }} = {{ $totalItemPrice }}</div>
                            <div>
                                <input type="number" value="{{ $item['quantity'] }}"
                                    onchange="updateQuantity({{ $index }}, this.value)">
                            </div>
                        </div>
                    @endforeach
                    <div class="text-xl mt-4">Total: {{ $totalPrice }}</div>
                @else
                    <div>Keranjang belanja kosong</div>
                @endif
            </div>
        </div>
        <div>
            <form id="orderForm" method="POST" action="{{ route('orders.store') }}">
                @csrf
                <input type="hidden" name="cart" id="cartInput" value="">
                <button type="submit" id="continueToReservation"
                    class="px-6 py-3 mt-5 text-white bg-indigo-700 rounded-lg">Lanjutkan ke Reservasi</button>
            </form>
        </div>
    </div>
    </div>
    <script>
        document.getElementById("semuaBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "block";
            });
        });

        document.getElementById("minumanBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "none";
            });
            document.querySelectorAll(".minuman").forEach(function(item) {
                item.style.display = "block";
            });
        });

        document.getElementById("snackBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "none";
            });
            document.querySelectorAll(".snack").forEach(function(item) {
                item.style.display = "block";
            });
        });

        document.getElementById("makananBtn").addEventListener("click", function() {
            document.querySelectorAll(".menu-item").forEach(function(item) {
                item.style.display = "none";
            });
            document.querySelectorAll(".makanan").forEach(function(item) {
                item.style.display = "block";
            });
        });


        function addToCart(itemName, itemPrice) {
            let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
            let existingItem = cart.find(item => item.name === itemName);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({
                    name: itemName,
                    price: itemPrice,
                    quantity: 1
                });
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartDisplay();
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart'));
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartDisplay();
        }

        function updateQuantity(index, newQuantity) {
            let cart = JSON.parse(localStorage.getItem('cart'));
            cart[index].quantity = parseInt(newQuantity);
            if (cart[index].quantity <= 0) {
                cart.splice(index, 1);
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartDisplay();
        }

        function updateCartDisplay() {
            let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
            let cartItemsDiv = document.getElementById('cart-items');
            cartItemsDiv.innerHTML = '';
            if (cart.length > 0) {
                let totalPrice = 0;
                cart.forEach((item, index) => {
                    let totalItemPrice = item.price * item.quantity;
                    totalPrice += totalItemPrice;
                    let itemDiv = document.createElement('div');
                    itemDiv.innerHTML = `
                        <img src='${item.name}'></img>
                        <div>${item.name}
                            <input type="number" value="${item.quantity}" onchange="updateQuantity(${index}, this.value)" readonly>${totalItemPrice}
                            <button onclick="removeFromCart(${index})">
                                <svg class="h-10 w-10 text-slate-900"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                    </svg>
                            </button>
                        </div>
                        <div>${item.price} </div>
                        <div>
                        </div>
                    `;
                    cartItemsDiv.appendChild(itemDiv);
                });
                let totalDiv = document.createElement('div');
                totalDiv.textContent = `Total: ${totalPrice}`;
                totalDiv.classList.add('text-xl', 'mt-4');
                cartItemsDiv.appendChild(totalDiv);
            } else {
                let emptyCartDiv = document.createElement('div');
                emptyCartDiv.textContent = 'Keranjang belanja kosong';
                cartItemsDiv.appendChild(emptyCartDiv);
            }
            document.getElementById('cartInput').value = JSON.stringify(cart);
        }
        document.addEventListener('DOMContentLoaded', updateCartDisplay);


        document.getElementById('continueToReservation').addEventListener('click', function(event) {
            event.preventDefault(); // Menghentikan default behavior dari tombol submit

            // Mengambil data keranjang dari local storage
            let cart = JSON.parse(localStorage.getItem('cart'));

            // Mengirim data keranjang ke server menggunakan AJAX
            fetch('{{ route('orders.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        cart: cart
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal menyimpan data ke database');
                    }
                    // Hapus data keranjang dari local storage setelah berhasil disimpan
                    localStorage.removeItem('cart');
                    // Redirect pengguna ke halaman reservasi
                    window.location.href = '{{ route('reservations.create') }}';
                })
                .catch(error => {
                    console.error(error);
                    alert('Terjadi kesalahan. Mohon coba lagi.');
                });
        });
    </script>
@endsection
