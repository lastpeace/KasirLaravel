<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('orders.create', compact('products', 'users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'cart' => 'required|json'
        ]);

        $cart = json_decode($request->input('cart'), true);

        // Periksa apakah $cart adalah array
        if (!is_array($cart)) {
            return redirect()->back()->withErrors(['cart' => 'Invalid cart data']);
        }

        foreach ($cart as $item) {
            // Periksa apakah setiap item memiliki kunci yang dibutuhkan
            if (isset($item['product_id'], $item['quantity'], $item['price'])) {
                Order::create([
                    'user_id' => auth()->id(),
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'total_price' => $item['price'] * $item['quantity'],
                    'status' => 'pending',
                ]);
            }
        }

        return redirect()->route('reservations.create')
            ->with('success', 'Order created successfully. Proceed to reservation.');
    }


    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,completed',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }


}
