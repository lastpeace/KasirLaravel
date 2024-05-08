<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Table;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $tables = Table::all();
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
            'table_number' => 'required|exists:tables,id',
            'notes' => 'nullable|string',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation created successfully.');
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

    public function konfirmasi(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        return view('konfirmasi', compact('reservation'));
    }


    public function confirm(Reservation $reservations)
    {
        $reservations = Reservation::all();
        return view('konfirmasi', compact('reservation'));
    }

    public function storeConfirmation(Request $request, Reservation $reservation)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'phone' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'guests' => 'required|integer',
            'table' => 'required|exists:tables,id',
            'notes' => 'nullable|string',
        ]);

        // Simpan data konfirmasi
        $reservation->update([
            'name' => $validatedData['name'],
            'user_id' => 'required|exists:users,id',
            'phone' => $validatedData['phone'],
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'guests' => $validatedData['guests'],
            'table_id' => $validatedData['table'],
            'notes' => $validatedData['notes'],
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dikonfirmasi');
    }
}
