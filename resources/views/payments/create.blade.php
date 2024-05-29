@extends('layouts.app')

@section('content')
    <div class="px-14 pb-20 bg-slate-50 max-md:px-5">
        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-[58%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-col grow max-md:mt-7 max-md:max-w-full">
                    <img loading="lazy" srcset="{{ asset('favicon.png') }}" class="z-10 max-w-full aspect-[1.16] w-[170px]" />
                    <div class="flex flex-col self-end px-12 py-7 mt-0 max-w-full bg-white rounded-lg w-[704px] max-md:px-5">
                        <div class="max-md:max-w-full">
                            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                                <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                                    <form id="paymentForm" action="{{ route('payments.store') }}" method="POST">
                                        @csrf
                                        @foreach ($userOrders as $order)
                                            <input type="hidden" name="order_ids[]" value="{{ $order->id }}">
                                        @endforeach

                                        <!-- Metode Pembayaran -->
                                        <div class="flex flex-col grow max-md:mt-3 mb-4">
                                            <div class="text-xl font-medium text-black">
                                                Metode Pembayaran
                                                <span class="text-sm font-light">(pilih salah satu)</span>
                                            </div>
                                            <div class="mt-4 text-xs font-light leading-5 text-black">
                                                Pembayaran hanya bisa dilakukan dengan QRIS
                                            </div>
                                            <div class="flex gap-5 mt-4">
                                                <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                                                    <div class="flex flex-col justify-center my-auto">
                                                        <input type="radio" id="payment_50_percent" name="status"
                                                            value="50%" onchange="updatePaymentDetails()">
                                                        <label for="payment_50_percent"
                                                            class="text-sm font-medium leading-5 text-black">Bayar
                                                            50%</label>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                                                    <div class="flex flex-col justify-center my-auto">
                                                        <input type="radio" id="payment_full" name="status"
                                                            value="full" onchange="updatePaymentDetails()">
                                                        <label for="payment_full"
                                                            class="text-sm font-medium leading-5 text-black">Bayar
                                                            Penuh</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex gap-5 mt-4">
                                                <div class="text-xs font-light leading-4 text-justify text-red-600 w-6/12">
                                                    (Tidak dapat dikembalikan jika reservasi dibatalkan)
                                                </div>
                                                <div class="text-xs font-light leading-4 text-justify text-red-600 w-6/12">
                                                    (Pengembalian 50% dari total pesanan tersedia jika pemesanan dibatalkan)
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tombol submit -->
                                        <div class="mb-4" hidden>
                                            <button type="submit"
                                                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Process Payment
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-9 text-xl font-medium text-black max-md:max-w-full">
                            Ringkasan Pesanan
                        </div>
                        <div class="flex flex-col gap-5 justify-between mt-5 w-full max-md:flex-wrap max-md:max-w-full">
                            @php
                                $totalKeseluruhan = 0; // Inisialisasi total keseluruhan
                            @endphp
                            @forelse($userOrders as $order)
                                <div class="flex gap-5 max-md:flex-wrap">
                                    <div class="flex flex-auto gap-5 ">
                                        <img loading="lazy" src="{{ asset($order->product->image) }}"
                                            class="shrink-0 aspect-square w-[75px]" />
                                        <div class="flex flex-col self-start mt-2.5">
                                            <div class="text-base font-medium">{{ $order->product->name }}</div>
                                            <div class="mt-3.5 text-sm font-light">x {{ $order->quantity }}</div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex gap-5 justify-between items-center self-start px-px mt-2 whitespace-nowrap">
                                        <div class="self-stretch my-auto text-lg font-medium">
                                            {{ number_format($order->total_price, 0, '', '.') }}
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $totalKeseluruhan += $order->total_price;
                                @endphp
                            @empty
                                <div class="flex gap-5 justify-between">
                                    <div class="text-red-500">No pending orders found for this reservation.</div>
                                </div>
                            @endforelse
                            <div
                                class="flex gap-5 justify-between self-end mt-28 max-w-full text-xl font-medium text-black whitespace-nowrap w-[212px] max-md:mt-10">
                                <div>TOTAL</div>
                                <div id="totalPrice">{{ number_format($totalKeseluruhan, 0, '', '.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col ml-5 w-[42%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-col grow py-8 mt-32 w-full bg-white rounded-lg max-md:mt-10 max-md:max-w-full">
                    <div class="flex flex-col pr-16 pb-12 pl-8 max-md:px-5 max-md:max-w-full">
                        <div class="max-md:pr-5 max-md:max-w-full">
                            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                                <div class="flex flex-col w-[69%] max-md:ml-0 max-md:w-full">
                                    <div class="flex flex-col grow text-base text-black max-md:mt-10">
                                        <div class="text-xl font-medium">Rincian Reservasi</div>
                                        @if ($reservation)
                                            <div class="self-start mt-8 ml-6 max-md:ml-2.5">Nama</div>
                                            <div class="mt-2.5 font-light">{{ $reservation->name }}</div>
                                            <div class="flex flex-col px-7 mt-7 max-md:px-5">
                                                <div>Tanggal</div>
                                                <div class="mt-3.5 font-light">{{ $reservation->date }}</div>
                                                <div class="mt-5">Jumlah Orang</div>
                                                <div class="mt-3.5 font-light">{{ $reservation->number_of_people }}</div>
                                                <div class="mt-4">Catatan</div>
                                                <div>{{ $reservation->notes }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex flex-col ml-5 w-[31%] max-md:ml-0 max-md:w-full">
                                    <div class="flex flex-col mt-12 text-base text-black max-md:mt-10">
                                        <div>No Telpon</div>
                                        <div class="mt-2 font-light">{{ $reservation->phone_number }}</div>
                                        <div class="mt-7">Jam</div>
                                        <div class="mt-4 font-light">{{ $reservation->time }}</div>
                                        <div class="mt-6">Meja</div>
                                        <div class="mt-3.5 font-light">{{ $reservation->table_number }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex z-10 flex-col mt-20 text-black max-md:mt-10 max-md:max-w-full">
                            <div class="text-xl font-medium max-md:max-w-full">
                                Rincian Pembayaran
                            </div>
                            <div class="flex flex-col pl-5 mt-6 text-base max-md:max-w-full">
                                <div class="max-md:max-w-full">Total Pesanan </div>
                                <div class="mt-8 max-md:max-w-full" id="paymentMethod">Metode Pembayaran - Bayar Penuh</div>
                                <div id="paymentDetails" class="self-end mt-0 text-base font-light text-black">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col px-16 mt-24 text-xl font-semibold text-black whitespace-nowrap max-md:px-5 max-md:mt-10 max-md:max-w-full">
                        <div class="z-10 max-md:max-w-full">TOTAL</div>
                        <div class="self-end mt-0" id="totalPayment">{{ number_format($totalKeseluruhan, 0, '', '.') }}
                        </div>
                    </div>
                    <div class="justify-center items-center self-center px-16 py-5 mt-5 max-w-full text-lg font-medium text-center text-white bg-black rounded-[50px] w-[447px] max-md:px-5"
                        onclick="openModal()">
                        Bayar Sekarang
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="qrisModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Icon QRIS -->
                            <img src="{{ asset('favicon.png') }}" alt="">
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Pindai QRIS ini
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Pindai kode QR di atas dengan aplikasi e-wallet Anda untuk melakukan pembayaran.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="submitPaymentForm()"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Sudah Transfer
                    </button>
                    <button type="button" onclick="closeModal()"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updatePaymentDetails() {
            let totalPrice = parseFloat(document.getElementById('totalPrice').innerText.replaceAll('.',
            '')); // Mengambil total harga
            let paymentMethod = document.querySelector('input[name="status"]:checked').value;
            let paymentDetails = document.getElementById('paymentDetails');
            let paymentMethodText = document.getElementById('paymentMethod');

            let paymentAmount;
            if (paymentMethod === "full") {
                paymentAmount = totalPrice;
                paymentMethodText.innerText = "Metode Pembayaran - Bayar Penuh";
            } else if (paymentMethod === "50%") {
                paymentAmount = totalPrice * 0.5; // Harga 50% dari total keseluruhan
                paymentMethodText.innerText = "Metode Pembayaran - Bayar 50%";
            }

            paymentDetails.innerText = paymentAmount.toLocaleString();
        }

        function openModal() {
            document.getElementById('qrisModal').classList.remove('hidden');
            document.getElementById('qrisModal').classList.add('fixed');
        }

        function closeModal() {
            document.getElementById('qrisModal').classList.add('hidden');
            document.getElementById('qrisModal').classList.remove('fixed');
        }

        function submitPaymentForm() {
            updatePaymentDetails(); // Perbarui rincian pembayaran sebelum disubmit
            document.getElementById('paymentForm').submit(); // Submit form
        }
    </script>
@endsection
