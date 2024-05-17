<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function create()
    {
        $latestOrder = Order::latest()->first();
        $order = Session::get('order');
        $reservation = Session::get('reservation');
        return view('payment.create', compact('order', 'reservation'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,completed',
        ]);

        // Ambil data pesanan dan reservasi dari session
        $data = [
            'user_id' => auth()->id(),
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'total_price' => $request->input('total_price'),
            'status' => $request->input('status', 'pending'),
        ];

        // Simpan pesanan ke database
        $cart = Order::create($data);

        // Hapus pesanan dari session setelah berhasil disimpan
        Session::forget('order');

        // Redirect ke halaman reservasi
        return redirect()->route('reservations.create')->with('success', 'Pesanan berhasil disimpan.');
    }

    public function showPayment()
    {
        // Mendapatkan pesanan terbaru
        $latestOrder = Order::latest()->first();

        return view('payment.create', compact('latestOrder'));
    }
}
