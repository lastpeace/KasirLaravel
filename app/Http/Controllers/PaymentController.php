<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    public function create($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        $userOrders = Order::where('user_id', $reservation->user_id)->get();
        $user = User::all();
        return view('payments.create', compact('reservation', 'userOrders', 'user'));
    }

    public function store(Request $request, $reservationId)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|in:50%,full',
        ]);

        $order = Order::findOrFail($request->order_id);
        $amount = $request->input('status') == '50%' ? $order->total_price / 2 : $order->total_price;

        $payment = Payment::create([
            'reservation_id' => $reservationId,
            'order_id' => $order->id,
            'total_price' => $amount,
            'status' => $request->input('status'),
        ]);
        $orders = Order::whereIn('id', $request->order_ids)->get();
        foreach ($orders as $order) {
            $order->status = 'complete';
            $order->save();
        }

        return redirect()->route('payments.index')
            ->with('success', 'Payment processed successfully.');
    }
    public function createPayment($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        $userOrders = Order::where('user_id', $reservation->user_id)->get();

        return view('payments.create', compact('reservation', 'userOrders'));
    }

    public function storePayment(Request $request, $reservationId)
    {
        $request->validate([
            'order_ids' => 'required|array',
            'order_ids.*' => 'exists:orders,id',
            'status' => 'required|in:50%,full',
        ]);

        Order::whereIn('id', $request->order_ids)->update(['status' => 'completed']);

        $status = $request->input('status');

        foreach ($request->order_ids as $orderId) {
            $order = Order::findOrFail($orderId);
            $amount = $status == '50%' ? $order->total_price / 2 : $order->total_price;

            Payment::create([
                'reservation_id' => $reservationId,
                'order_id' => $order->id,
                'total_price' => $amount,
                'status' => $status,
            ]);

        }

        return redirect()->route('reservations.index')
            ->with('success', 'Payments processed successfully.');
    }


    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|in:50%,full',
        ]);

        $order = Order::findOrFail($request->order_id);
        $amount = $request->input('status') == '50%' ? $order->total_price / 2 : $order->total_price;

        $payment->update([
            'order_id' => $order->id,
            'total_price' => $amount,
            'status' => $request->input('status'),
        ]);

        if ($request->input('status') == 'full') {
            $order->status = 'completed';
            $order->save();
        }

        return redirect()->route('payments.index')
            ->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')
            ->with('success', 'Payment deleted successfully.');
    }
}
