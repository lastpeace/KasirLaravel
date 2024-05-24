<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Models\Reservation;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('tables.index', compact('tables'));
    }

    public function create()
    {
        return view('tables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:available,full',
        ]);

        Table::create($request->all());

        return redirect()->route('tables.index')
            ->with('success', 'Table created successfully.');
    }

    public function show(Table $table)
    {
        return view('tables.show', compact('table'));
    }

    public function edit(Table $table)
    {
        return view('tables.edit', compact('table'));
    }

    public function update(Request $request, $id)
    {
        $table = Table::findOrFail($id);
        $table->name = $request->name;
        $table->capacity = $request->capacity;
        $table->status = $request->status;
        $table->save();

        return response()->json(['success' => true]);
    }

    public function destroy(Table $table)
    {
        $table->delete();

        return redirect()->route('tables.index')
            ->with('success', 'Table deleted successfully');
    }


}
