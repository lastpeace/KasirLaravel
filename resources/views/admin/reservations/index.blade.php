@extends('layouts.app2')

@section('content')
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[150px] overflow-y-auto text-center bg-indigo-700">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center">
                <img loading="lazy" srcset="{{ asset('favicon.png') }}" class="aspect-[1.11] w-[115px]" />
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>
        <div
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-neutral-50 text-white item">
            <i class="bi bi-house-door-fill hover:text-indigo-700"></i>
            <a href="{{ route('admin.dashboard') }}" class="text-[15px] ml-4 text-gray-200 font-bold">Home</a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <a href="{{ route('admin.products.index') }}" class="text-[15px] ml-4 text-gray-200 font-bold">Menu</a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <a class="text-[15px] ml-4 text-gray-200 font-bold" href="{{ route('admin.reservations.index') }}">Reservasi</a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <a class="text-[15px] ml-4 text-gray-200 font-bold" href="{{ route('tables.index') }}">Meja</a>
        </div>
        <div class="my-4 bg-black h-[1px]"></div>

        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-box-arrow-in-right"></i>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-[15px] ml-4 text-gray-200 font-bold">Logout</button>
            </form>
        </div>

    </div>

    <div class="container mx-auto ml-auto px-20">
        <div class="flex gap-5 self-start mt-8 text-2xl font-semibold text-black">

            <div class="flex-auto">Reservasi Keseluruhan</div>
        </div>
        <div
            class="flex flex-col justify-center px-5 py-5 mt-7 text-lg font-medium text-black bg-white rounded-lg shadow-2xl max-md:px-5 max-md:max-w-full">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Id Booking
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Meja
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jam
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Atas Nama
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Catatan
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pembayaran
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td class="px-14 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $reservation->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Meja
                                    {{ $reservation->table_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ \Carbon\Carbon::parse($reservation->date)->isoFormat('DD MMM YYYY') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reservation->time }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reservation->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <button onclick="openModal('{{ $reservation->notes }}')" class="">
                                        <svg class="h-8 w-8 text-slate-900" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18" />
                                            <line x1="13" y1="8" x2="15" y2="8" />
                                            <line x1="13" y1="12" x2="15" y2="12" />
                                        </svg>
                                    </button>
                                </td>

                                <td class="hidden">{{ $reservation->payments->first()->total_price ?? 'N/A' }}</td>

                                @php
                                    $payment = $reservation->payment;
                                @endphp
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @if ($reservation->payment)
                                        @if ($reservation->payment->status == '50%')
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                50%
                                            </span>
                                        @elseif ($reservation->payment->status == 'full')
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Full
                                            </span>
                                        @endif
                                    @else
                                        <span class="text-gray-500">Belum ada pembayaran</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @if ($reservation->payment)
                                        {{ $reservation->payment->status }}
                                    @else
                                        <span class="text-gray-500">Belum ada pesanan</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <button onclick="openDetailModal({{ $reservation }})"
                                        class="px-4 py-2 text-sm font-semibold text-white bg-blue-500 rounded-md">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg max-w-[90%] md:max-w-2xl w-full p-6 mx-4 md:mx-0">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-indigo-700">Rincian Pesanan</h2>
                <button onclick="closeDetailModal()" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-col items-start mt-4 w-full overflow-y-auto max-h-[80vh]">
                <div class="mt-4 w-full">
                    <div class="flex gap-5 flex-wrap md:flex-col md:gap-0">
                        <div class="flex flex-wrap relative">
                            <div id="detailId" class="text-sm font-semibold text-neutral-500"></div>
                            <div class="w-full p-2">
                                <div class="self-start mt-4 text-xs text-black">Nama</div>
                                <div id="detailName" class="px-4 py-5 mt-1.5 rounded-lg border border-black w-full"></div>
                            </div>
                            <div class="w-full p-2">
                                <div class="self-start mt-1.5 text-xs text-black">No Telepon</div>
                                <div id="detailPhone" class="px-4 py-5 mt-1.5 rounded-lg border border-black w-full">
                                </div>
                            </div>
                            <div class="flex flex-wrap w-full">
                                <div class="w-1/2 p-2 flex flex-col">
                                    <div class="self-start text-xs text-black">Tanggal</div>
                                    <div id="detailDate"
                                        class="flex-1 px-4 py-3 mt-1.5 rounded-lg border border-black text-slate-700">
                                    </div>
                                </div>
                                <div class="w-1/2 p-2 flex flex-col">
                                    <div class="self-start text-xs text-black mt-1.5">Jumlah orang</div>
                                    <div id="detailPeople"
                                        class="flex-1 px-4 py-3 mt-1.5 rounded-lg border border-black text-slate-700">
                                    </div>
                                </div>
                            </div>

                            <div class="w-full p-2">
                                <div class="self-start mt-1.5 text-xs text-black">Catatan</div>
                                <div id="detailNotes"
                                    class="px-4 py-7 mt-2 rounded-lg border border-black text-slate-700"></div>
                            </div>
                            <div class="flex flex-wrap w-full">
                                <div class="w-1/2 p-2 flex flex-col">
                                    <div class="self-start text-xs text-black">Jam</div>
                                    <div id="detailTime"
                                        class="flex-1 px-4 py-3 mt-1.5 rounded-lg border border-black text-slate-700">
                                    </div>
                                </div>
                                <div class="w-1/2 p-2 flex flex-col">
                                    <div class="self-start text-xs text-black mt-1.5">Meja</div>
                                    <div id="detailTable"
                                        class="flex-1 px-4 py-3 mt-1.5 rounded-lg border border-black text-slate-700">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col w-full md:w-1/4">
                            <div class="text-sm font-semibold text-neutral-500">Pesanan</div> <br>
                            @forelse($userOrders as $order)
                                <div class="flex flex-col md:flex-row justify-between gap-5 mb-4">
                                    <div class="flex gap-5">
                                        <img loading="lazy" src="{{ asset('storage/images/' . $order->product->image) }}"
                                            class="aspect-square w-[100px]" />
                                        <div class="flex flex-col mt-2.5">
                                            <div class="text-base font-medium">{{ $order->product->name }}</div>
                                            <div class="mt-3.5 text-sm font-light">x {{ $order->quantity }}</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-end mt-2 md:mt-0">
                                        <div class="text-lg font-medium">
                                            {{ number_format($order->total_price, 0, '', '.') }}</div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-red-500">No pending orders found for this reservation.</div>
                            @endforelse
                            <div id="detailOrders" class="mt-2 space-y-2"></div>
                        </div>

                        <div class="flex flex-col">
                            <div class="text-sm font-semibold text-neutral-500">Rincian Pembayaran</div>
                            <div id="detailPayments" class="mt-4 space-y-2"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="flex justify-center w-full mt-4">
                <button onclick="closeDetailModal()"
                    class="px-16 py-3 text-sm font-semibold text-white bg-indigo-700 rounded-lg">Simpan</button>
            </div>
        </div>
    </div>


    <div id="myModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg max-w-[90%] md:max-w-2xl w-full p-6 mx-4 md:mx-0">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-indigo-700">Catatan Reservasi</h2>
                <button onclick="closeModal()" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="modalText" class="mt-4 text-sm text-gray-700"></div>
        </div>
    </div>

    <script>
        function openModal(notes) {
            var modal = document.getElementById("myModal");
            var modalText = document.getElementById("modalText");
            modalText.innerHTML = notes;
            modal.classList.remove("hidden");
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.classList.add("hidden");
        }

        function openDetailModal(reservation) {
            document.getElementById("detailId").innerHTML = `ID RESERVASI : ${reservation.id}`;
            document.getElementById("detailName").innerHTML = reservation.name;
            document.getElementById("detailPhone").innerHTML = reservation.phone_number;
            document.getElementById("detailDate").innerHTML = new Date(reservation.date).toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            });
            document.getElementById("detailPeople").innerHTML = reservation.number_of_people;
            document.getElementById("detailTime").innerHTML = reservation.time;
            document.getElementById("detailTable").innerHTML = `Meja ${reservation.table_number}`;
            document.getElementById("detailNotes").innerHTML = reservation.notes || 'Tidak ada catatan';


            // Populate payments
            var paymentsContainer = document.getElementById("detailPayments");
            paymentsContainer.innerHTML = '';
            if (reservation.payments && reservation.payments.length > 0) {
                reservation.payments.forEach(payment => {
                    var paymentDiv = document.createElement('div');
                    paymentDiv.className = 'px-4 py-2 text-xs text-indigo-700 rounded-lg border border-indigo-700';
                    paymentDiv.textContent = `Pembayaran - Rp ${payment.total_price} x ${payment.status}`;
                    paymentsContainer.appendChild(paymentDiv);
                });
            } else {
                paymentsContainer.innerHTML =
                    '<div class="px-4 py-2 text-xs text-indigo-700 rounded-lg border border-indigo-700">Tidak ada pembayaran</div>';
            }

            var modal = document.getElementById("detailModal");
            modal.classList.remove("hidden");
        }

        function closeDetailModal() {
            var modal = document.getElementById("detailModal");
            modal.classList.add("hidden");
        }
    </script>
@endsection
