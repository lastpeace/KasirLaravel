<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Metode lain di sini...

    public function indexForAdmin()
    {
        $user = User::all();
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'status' => 'required|in:available,out_of_stock',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = preg_replace('/\s+/', '-', strtolower($request->input('name'))) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/images', $imageName);

            Product::create([
                'name' => $request->input('name'),
                'type' => $request->input('type'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
                'image' => $imageName
            ]);
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'status' => 'required|in:available,out_of_stock',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['name', 'type', 'price', 'description', 'status']);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/images/' . $product->image);
            }

            $image = $request->file('image');
            $imageName = preg_replace('/\s+/', '-', strtolower($request->input('name'))) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete('public/images/' . $product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
