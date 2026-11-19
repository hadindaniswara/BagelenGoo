<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::orderBy('id')->get();

        return view('product', [
            'products' => $products,
            'selected' => null
        ]);
    }

    // Menampilkan detail produk
    public function show($slug)
    {
        $selected = Product::where('slug', $slug)
            ->firstOrFail();

        $products = Product::where('id', '!=', $selected->id)
            ->orderBy('id')
            ->get();

        return view('product', compact('products', 'selected'));
    }
}
