<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parentCategory')->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all(); 
        return view('dashboard.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'category_type' => 'nullable|in:hannah,gender reveal,wedding,engagement,graduation', // تعديل هنا
            'category_id' => 'nullable|exists:categories,id',
            'user_id' => 'exists:users,id',

        ]);

        $path = null; 
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/image/';
            $file->move(public_path($path), $filename);
        }

        Category::create([
            'user_id' => 1, 
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path ? $path . $filename : null, 
            'category_type' => $request->category_type,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'category_type' => 'required|in:hannah,gender reveal,wedding,engagement.graduation',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $category = Category::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath ?? $category->image,
            'category_type' => $request->category_type,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

    public function show($id)
{
    $category = Category::findOrFail($id); 
    return view('dashboard.categories.show', compact('category')); 
}



}
