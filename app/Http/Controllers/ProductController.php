<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->latest()->simplePaginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'brand' => ['required', 'string', 'min:3', 'max:250'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'details' => ['required', 'string'],
            'price' => ['required', 'numeric'],
        ]);

        $attributes['image'] = $attributes['image']->store('products');
        $product = Product::create($attributes);

        return redirect()->route('products.index')->with('success', "Product $product->title created successfully");
    }

    public function show(Product $product)
    {
        return view('dashboard.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit', get_defined_vars());
    }

    public function update(Product $product)
    {
        $attributes = request()->validate([
            'category_id' => ['sometimes', Rule::exists('categories', 'id')],
            'title' => ['sometimes', 'string', 'min:3', 'max:250'],
            'brand' => ['sometimes', 'string', 'min:3', 'max:250'],
            'image' => ['sometimes', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'details' => ['sometimes', 'string'],
            'price' => ['sometimes', 'numeric'],
        ]);
        if (request()->hasFile('image')) {
            $image = request()->file('image')->store('products');
            $attributes['image'] = $image;
        }
        $product->update($attributes);

        return redirect()->route('products.index')->with('success', "Product $product->title updated successfully");
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('danger', "Product $product->title deleted successfully");
    }


}

