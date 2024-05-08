@extends('layouts.app')

@section('content')
    <div class="mt-9 max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            @foreach ($products as $product)
                <div class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col grow justify-center text-sm text-black max-md:mt-10">
                        <div class="flex flex-col px-4 py-4 bg-white rounded-2xl border border-solid border-neutral-400">
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
    </div>
    <div
        class="flex flex-col px-7 py-6 text-black bg-white rounded-lg border border-solid border-neutral-400 max-md:px-5 max-md:max-w-full">
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
                        <div>{{ $item['price'] }} x {{ $item['quantity'] }} = {{ $totalItemPrice }}</div>
                        <div>
                            <input type="number" value="{{ $item['quantity'] }}"
                                onchange="updateQuantity({{ $index }}, this.value)">
                            <button onclick="removeFromCart({{ $index }})"><svg class="h-8 w-8 text-red-500"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="4" y1="7" x2="20" y2="7" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg></button>
                        </div>
                    </div>
                @endforeach
                <div class="text-xl mt-4">Total: {{ $totalPrice }}</div>
            @else
                <div>Keranjang belanja kosong</div>
            @endif
        </div>
        <button id="continueToReservation">Lanjutkan ke Reservasi</button>

    </div>

    <script>
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
                        <div>${item.name} - ${item.price} x ${item.quantity} = ${totalItemPrice}</div>
                        <div>
                            <input type="number" value="${item.quantity}" onchange="updateQuantity(${index}, this.value)">
                            <button onclick="removeFromCart(${index})">Remove</button>
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
        }
        document.addEventListener('DOMContentLoaded', updateCartDisplay);
        document.getElementById('continueToReservation').addEventListener('click', function() {
            window.location.href = "{{ route('reservations.create') }}";
        });
    </script>
@endsection
