<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->simplePaginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'details' => ['required', 'string'],
        ]);
        $category = Category::create($attributes);
        return redirect()->route('categories.index')->with('success', "Category $category->title created successfully");
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $attributes = request()->validate([
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'details' => ['required', 'string'],
        ]);
        $category->update($attributes);

        return redirect()->route('categories.index')->with('success', "Category $category->title updated successfully");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('danger', "Category $category->title deleted successfully");
    }
}

