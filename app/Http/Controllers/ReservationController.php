<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Table;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        $user = auth()->user();
        $payments = Payment::all();
        $orders = Order::all();
        $reservations = $user->reservations;
        return view('reservations.index', compact('reservations', 'payments', 'orders'));
    }

    public function create()
    {
        $orders = Order::all();
        $tables = Table::where('status', 'available')->get();

        return view('reservations.create', ['tables' => $tables]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'phone_number' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'number_of_people' => 'required|integer|min:1',
            'table_number' => 'required|integer|exists:tables,id',
            'notes' => 'nullable|string',
        ]);


        $reservation = Reservation::create($request->all());

        // Update table status to occupied
        $table = Table::where('id', $request->table_number)->first();
        $table->status = 'full';
        $table->save();

        return redirect()->route('payments.create', ['reservationId' => $reservation->id])
            ->with('success', 'Reservation created successfully.');

    }

    public function createPayment($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        $orders = Order::all();

        return view('payments.index', compact('reservation', 'orders'));
    }

    public function storePayment(Request $request, $reservationId)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|in:50%,full',
        ]);

        $order = Order::findOrFail($request->order_id);
        $amount = $request->input('status') == '50%' ? $order->total_price / 2 : $order->total_price;
        $reservation = Reservation::findOrFail($reservationId);
        $reservation->createPayment([
            'reservation_id' => $reservationId,
            'order_id' => $order->id,
            'total_price' => $amount,
            'status' => $request->input('status'),
            // Atribut lainnya sesuai kebutuhan
        ]);

        if ($request->input('status') == 'full') {
            $order->status = 'completed';
            $order->save();
        }

        return redirect()->route('reservations.index')
            ->with('success', 'Payment processed successfully.');
    }
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'name' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'phone_number' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'number_of_people' => 'required|integer|min:1',
            'table_number' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation updated successfully');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation deleted successfully');
    }


}
