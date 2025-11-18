<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'photo_product' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_product')) {
            $data['photo_product'] = $request->file('photo_product')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'photo_product' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_product')) {
            $data['photo_product'] = $request->file('photo_product')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    // Get menu items for frontend
    public function showMenu()
    {
        $products = Product::all(); // Get all menu items
        return view('menu', compact('products'));
    }
}
