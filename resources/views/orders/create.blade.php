@extends('layouts.app')

@section('content')
    <style>
        .cart-item-image {
            width: 75px;
            height: 75px;
            object-fit: cover;
            border-radius: 4px;
        }

        .cart {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            position: relative;
        }

        .quantity-btn {
            width: 25px;
            height: 25px;
            cursor: pointer;
        }
    </style>

    <div class="text-2xl font-semibold px-4 py-4">Menu</div>
    <div class="w-full flex flex-col md:flex-row-reverse">
        <div class="w-full md:w-[347px] px-4 py-2 mt-4 md:mt-0">
            <button id="semuaBtn" class="w-40 h-[42px] bg-black text-white rounded-[50px] mb-2 md:mb-0">Semua</button>
            <button id="minumanBtn"
                class="w-40 h-[42px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Minuman</button>
            <button id="makananBtn"
                class="w-40 h-[42px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Makanan</button>
            <button id="snackBtn" class="w-40 h-[42px] bg-gray-200 text-zinc-600 rounded-[50px] mb-2 md:mb-0">Snack</button>
        </div>

        <div class="container mx-auto flex flex-col md:flex-row">
            {{-- Bagian kiri --}}
            <div class="w-full md:w-[90%] mt-4 md:mt-0" style="overflow-y: auto; max-height: calc(100vh - 150px);">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-7 mt-5">
                    @foreach ($products as $product)
                        <div
                            class="flex flex-col justify-center text-sm text-black max-w-[209px] menu-item {{ strtolower($product->type) }}">
                            <div
                                class="flex flex-col px-4 py-4 bg-white rounded-2xl border border-solid border-neutral-400">
                                <div class="flex w-full">
                                    <img id="imagePreview_{{ $product->id }}" loading="lazy"
                                        src="{{ asset($product->image) }}"
                                        class="self-center aspect-square w-[180px] rounded-2xl" />
                                </div>
                                <div class="flex flex-col mt-3 ml-4">
                                    <div class="text-base font-medium">{{ $product->name }}</div>
                                    <div class="mt-2.5 font-light">{{ number_format($product->price, 0, '', '.') }}</div>
                                    <div class="flex justify-between mt-5">
                                        <div>
                                            <button
                                                onclick="addToCart('{{ $product->id }}', '{{ asset($product->image) }}', '{{ $product->name }}', {{ $product->price }})"
                                                class="px-4 py-3 bg-indigo-700 text-white rounded-full">{{ __('Tambahkan') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>




            {{-- Bagian kanan --}}
            <div class="w-full md:w-[10%] mt-4 ml-10 ">
                <div class="flex text-xl font-medium">Keranjang</div>
                <div
                    class="container cart flex flex-col px-7 py-6 text-black bg-white rounded-lg border border-solid border-neutral-400">

                    <div id="cart-items" class="flex-grow overflow-y-auto max-h-[400px]"></div>
                    <div class="total-container">
                        <div
                            class="flex gap-5 justify-between text-xl font-medium uppercase whitespace-nowrap max-md:flex-wrap max-md:mt-10 max-md:max-w-full">
                            <div>Total</div>
                            <div id="total-price" class="text-right">0</div>
                        </div>
                        <div>
                            <form id="order-form" action="{{ route('orders.store') }}" method="POST"
                                onsubmit="updateCartInput()">
                                @csrf
                                <input type="hidden" name="cart" id="cartInput">
                                <div class="bg-black text-white flex justify-center items-center rounded-full">
                                    <button type="submit" class="px-6 py-3 mt-5 text-white rounded-full">Proceed to
                                        Reservation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

        function addToCart(productId, productImage, productName, productPrice) {
            let cart = getCart();
            let existingItemIndex = cart.findIndex(item => item.product_id === productId);
            if (existingItemIndex !== -1) {
                cart[existingItemIndex].quantity++;
            } else {
                cart.push({
                    product_id: productId,
                    image: productImage,
                    name: productName,
                    price: productPrice,
                    quantity: 1
                });
            }
            setCart(cart);
            updateCartDisplay();
        }

        function increaseQuantity(productId) {
            let cart = getCart();
            let itemIndex = cart.findIndex(item => item.product_id === productId);
            if (itemIndex !== -1) {
                cart[itemIndex].quantity++;
                setCart(cart);
                updateCartDisplay();
            }
        }

        function decreaseQuantity(productId) {
            let cart = getCart();
            let itemIndex = cart.findIndex(item => item.product_id === productId);
            if (itemIndex !== -1 && cart[itemIndex].quantity > 1) {
                cart[itemIndex].quantity--;
                setCart(cart);
                updateCartDisplay();
            }
        }

        function getCart() {
            let cart = localStorage.getItem('cart');
            return cart ? JSON.parse(cart) : [];
        }

        function removeProductFromCart(productId) {
            let cart = getCart();
            let updatedCart = cart.filter(item => item.product_id !== productId);
            setCart(updatedCart);
            updateCartDisplay();
        }

        function setCart(cart) {
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function updateCartInput() {
            let cart = getCart();
            document.getElementById('cartInput').value = JSON.stringify(cart);
        }

        function updateCartDisplay() {
            let cart = getCart();
            let cartItemsDiv = document.getElementById('cart-items');
            let totalPriceDiv = document.getElementById('total-price');
            cartItemsDiv.innerHTML = '';
            let totalSemuaPrice = 0;

            if (cart.length > 0) {
                cart.forEach((item, index) => {
                    let totalItemPrice = item.price * item.quantity;
                    totalSemuaPrice += totalItemPrice;

                    let itemDiv = document.createElement('div');
                    itemDiv.classList.add('flex', 'flex-col', 'px-7', 'py-6', 'text-black', 'bg-white',
                        'rounded-lg', 'max-md:px-5',
                        'max-md:max-w-full');

                    itemDiv.innerHTML = `
        <div class="flex gap-5 max-md:flex-wrap">
            <div class="flex flex-auto gap-5 ">
                <img loading="lazy" src="${item.image}" class="shrink-0 aspect-square w-[75px]" />
                <div class="flex flex-col self-start mt-2.5">
                    <div class="text-base font-medium">${item.name}</div>
                    <div class="mt-3.5 text-sm font-light">${item.price.toLocaleString()}</div>
                </div>
            </div>
            <div class="flex gap-5 justify-between items-center self-start px-px mt-2 whitespace-nowrap">
                <div class="flex items-center">
                    <button class="quantity-btn" onclick="decreaseQuantity('${item.product_id}')">-</button>
                    <span id="quantity_${item.product_id}" class="mx-2">${item.quantity}</span>
                    <button class="quantity-btn" onclick="increaseQuantity('${item.product_id}')">+</button>
                </div>
                <div class="self-stretch my-auto text-lg font-medium">${totalItemPrice.toLocaleString()}</div>
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/4a26f71d9ca019e294cc9bd96adf2068692e5ad06979f90b0ebd1f55d52a7ddb?apiKey=bb6773fa61624e21adc05bfe1a2741a5&" class="shrink-0 self-stretch my-auto w-6 aspect-square cursor-pointer" onclick="removeProductFromCart('${item.product_id}')"/>
            </div>
        </div>
    `;

                    cartItemsDiv.appendChild(itemDiv);
                });

                totalPriceDiv.innerText = totalSemuaPrice.toLocaleString();
            } else {
                totalPriceDiv.innerText = '0';
            }
        }

        // Muat tampilan keranjang saat halaman dimuat
        document.addEventListener('DOMContentLoaded', updateCartDisplay);
    </script>
@endsection
