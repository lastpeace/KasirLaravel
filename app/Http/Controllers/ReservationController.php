<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\User;
use App\Models\Product;

class ReservationController extends Controller
{

    public function indexForAdmin()
    {
        $reservations = Reservation::all();
        $user = User::all();
        $products = Product::all();
        $orders = Order::all();
        $payments = Payment::all();
        $userOrders = Order::with('user', 'product')->get();
        return view('admin.reservations.index', compact('reservations', 'payments', 'orders', 'user', 'userOrders'));
    }
    public function index()
    {
        $reservation = Reservation::all()->first();
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

        return redirect()->route('payments.create')
            ->with('success', 'Reservation created successfully.');

    }

    public function createPayment($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        $orders = Order::all();

        return view('payments.index', compact('reservation', 'orders'));
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
