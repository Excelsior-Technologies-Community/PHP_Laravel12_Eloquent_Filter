<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Get all filter parameters from request
        $filters = $request->all();
        
        // Apply filters using Eloquent Filter
        $products = Product::filter($filters)->paginate(10)->withQueryString();
        
        // Get unique categories and brands for filter dropdowns
        $categories = Product::distinct()->pluck('category');
        $brands = Product::distinct()->pluck('brand');
        
        return view('products.index', compact('products', 'categories', 'brands', 'filters'));
    }

    public function create()
    {
        $categories = Product::distinct()->pluck('category');
        $brands = Product::distinct()->pluck('brand');
        
        return view('products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string',
            'brand' => 'required|string',
            'is_active' => 'boolean'
        ]);

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Product::distinct()->pluck('category');
        $brands = Product::distinct()->pluck('brand');
        
        return view('products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string',
            'brand' => 'required|string',
            'is_active' => 'boolean'
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}