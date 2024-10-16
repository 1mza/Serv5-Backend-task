<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;

class ProductController
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return response()->json([
            'status' => 1,
            'message' => 'Products retrieved successfully',
            'data' => $products
        ]);
    }

    public function show(Product $product)
    {
        return response()->json([
            'status' => 1,
            'message' => 'Product info retrieved successfully',
            'data' => $product
        ]);
    }
}