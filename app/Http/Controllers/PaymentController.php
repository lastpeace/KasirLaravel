<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $user = Auth::user();
        $reservation = Reservation::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        $userOrders = Order::where('user_id', $user->id)->whereIn('status', ['pending', 'complete'])->get();
        return view('payments.create', compact('userOrders', 'user', 'reservation'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_ids' => 'required|array',
            'order_ids.*' => 'exists:orders,id',
            'status' => 'required|in:50%,full',
        ]);

        $user = Auth::user();
        $reservation = Reservation::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        if (!$reservation) {
            return redirect()->route('payments.create')
                ->withErrors('No reservation found for the user.');
        }

        $totalPrice = 0;
        foreach ($request->order_ids as $orderId) {
            $order = Order::findOrFail($orderId);
            $totalPrice += $order->total_price;
        }

        $amount = ($request->input('status') == '50%') ? $totalPrice / 2 : $totalPrice;

        // Create a new payment record
        $payment = Payment::create([
            'reservation_id' => $reservation->id,
            'total_price' => $amount,
            'status' => $request->input('status'),
            'order_id' => $request->order_ids[0], // Assigning the first order_id
        ]);

        // Attach orders to the payment
        $payment->orders()->attach($request->order_ids);

        // Update status of orders to 'complete' if full payment is made
        if ($request->input('status') == 'full') {
            Order::whereIn('id', $request->order_ids)->update(['status' => 'complete']);
        }

        return redirect()->route('reservations.index')
            ->with('success', 'Payment processed successfully.');
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
            $order->status = 'complete';
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
