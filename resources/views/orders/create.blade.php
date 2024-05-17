@extends('layouts.app')

@section('content')
    <div class=" text-2xl font-semibold px-4 py-4">Menu</div>
    <div class="grid">
        <div class=" items-center col-span-1">
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
    <!-- Menu Kiri -->
    <div class="container flex mt-9">
        <div class="flex flex-col gap-5 max-md:flex-col max-md:gap-0 px-10">
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
                                    <button
                                        onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})"
                                        class="justify-center px-12 py-3 mt-5 text-center text-white whitespace-nowrap bg-indigo-700 rounded-2xl max-md:px-5 max-md:mr-1.5 cursor-pointer">Tambahkan
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endfor
        </div>
        <!-- Keranjang Belanja Kanan -->
        <div
            class="container cart flex w-[40%] flex-col px-7 py-6 text-black bg-white rounded-lg border border-solid border-neutral-400 ">
            <div class="flex text-xl font-medium">Keranjang</div>
            <div id="cart-items">
            </div>
            <form id="order-form" action="{{ route('orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="cart" id="cartInput">
                <button type="submit" class="px-6 py-3 mt-5 text-white bg-indigo-700 rounded-lg">Proceed to
                    Reservation</button>
            </form>
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

        // Fungsi untuk menambahkan produk ke keranjang belanja
        function addToCart(productId, productName, productPrice) {
            let cart = getCart();
            let existingItemIndex = cart.findIndex(item => item.product_id === productId);
            if (existingItemIndex !== -1) {
                cart[existingItemIndex].quantity++;
            } else {
                cart.push({
                    product_id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: 1
                });
            }
            setCart(cart);
            updateCartDisplay();
        }

        // Fungsi untuk mendapatkan keranjang dari localStorage
        function getCart() {
            let cart = localStorage.getItem('cart');
            return cart ? JSON.parse(cart) : [];
        }

        // Fungsi untuk menghapus produk dari keranjang belanja berdasarkan index
        function removeFromCart(index) {
            let cart = getCart();
            cart.splice(index, 1);
            setCart(cart);
            updateCartDisplay();
        }

        // Fungsi untuk menghapus produk dari keranjang belanja berdasarkan product_id
        function removeProductFromCart(productId) {
            let cart = getCart();
            let updatedCart = cart.filter(item => item.product_id !== productId);
            setCart(updatedCart);
            updateCartDisplay();
        }

        // Fungsi untuk menyimpan keranjang ke localStorage
        function setCart(cart) {
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        // Fungsi untuk memperbarui tampilan keranjang belanja
        function updateCartDisplay() {
            let cart = getCart();
            let cartItemsDiv = document.getElementById('cart-items');
            cartItemsDiv.innerHTML = '';

            if (cart.length > 0) {
                let groupedCart = groupCartByProductName(cart);
                let totalSemuaPrice = 0;

                Object.keys(groupedCart).forEach(productName => {
                    let totalQuantity = groupedCart[productName].reduce((acc, cur) => acc + cur.quantity, 0);
                    let totalPrice = groupedCart[productName][0].price * totalQuantity;
                    totalSemuaPrice += totalPrice;

                    let itemDiv = document.createElement('div');
                    itemDiv.innerHTML = `
                    <div>${productName}
                        <input type="number" value="${totalQuantity}" style="width: 50px; padding: 5px;" onchange="updateQuantity('${productName}', this.value)" readonly>${totalPrice}
                        <button onclick="removeProductFromCart(${groupedCart[productName][0].product_id})">
                        <svg class="h-10 w-10 text-slate-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6" />
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                        </svg>
                    </button> 
                    </div>
                        <div>${groupedCart[productName][0].price}</div>
                    
                    
                `;
                    cartItemsDiv.appendChild(itemDiv);
                });

                // Menampilkan total harga dari semua item dalam keranjang
                let totalDiv = document.createElement('div');
                totalDiv.innerHTML = `
                    <div class="text-xl mt-4">Total : ${totalSemuaPrice}</div>
                `;
                cartItemsDiv.appendChild(totalDiv);
            } else {
                let emptyCartDiv = document.createElement('div');
                emptyCartDiv.textContent = 'Keranjang belanja kosong';
                cartItemsDiv.appendChild(emptyCartDiv);
            }


            document.getElementById('cartInput').value = JSON.stringify(cart);
        }

        // Fungsi untuk mengelompokkan produk dengan nama yang sama dalam keranjang belanja
        function groupCartByProductName(cart) {
            return cart.reduce((acc, cur) => {
                if (!acc[cur.name]) {
                    acc[cur.name] = [];
                }
                acc[cur.name].push(cur);
                return acc;
            }, {});
        }

        // Memanggil fungsi updateCartDisplay saat halaman dimuat
        document.addEventListener('DOMContentLoaded', updateCartDisplay);
    </script>
@endsection
