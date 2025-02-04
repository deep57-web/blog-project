<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of categories.
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form for creating a new category.
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a newly created category in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|max:255',
            'meta_title'       => 'nullable|max:255',
            'meta_description' => 'nullable',
        ]);

        Category::create($request->only(['name', 'meta_title', 'meta_description']));

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category created successfully.');
    }

    // Show the form for editing the specified category.
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Update the specified category in storage.
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'             => 'required|max:255',
            'meta_title'       => 'nullable|max:255',
            'meta_description' => 'nullable',
        ]);

        $category->update($request->only(['name', 'meta_title', 'meta_description']));

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from storage.
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}
