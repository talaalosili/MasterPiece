<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
class ProductController extends Controller
{
    public function index()
{
    $products = Product::all();
    return view('dashboard.products.index', compact('products'));
}


public function create()
{
    $categories = Category::all(); // Fetch categories
    return view('dashboard.products.create', compact('categories')); // Pass to the view
}

public function store(Request $request)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|mimes:png,jpg,jpeg,webp',
    ]);

    
    $path = null;

 
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/image/';
        $file->move(public_path($path), $filename);
        $path = $path . $filename; 
    }

   
    Product::create([
        'name' => $request->name, 
        'description' => $request->description,
        'price' => $request->price,
        'image' => $path, 
        'category_id' => $request->category_id, 
    ]);

    
    return redirect()->route('products.index')->with('success', 'Product created successfully!');
}

    

public function show($id)
{
    $product = Product::findOrFail($id);
    return view('dashboard.products.show', compact('product'));
}
public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all(); // Fetch all categories

   

    return view('dashboard.products.edit', compact('product', 'categories'));
}



public function update(Request $request, $id)
{
    
    $product = Product::findOrFail($id);

   
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        'category_id' => 'required|exists:categories,id',
    ]);

    
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/image/';
        $file->move(public_path($path), $filename);
        $path = $path . $filename; 

        
        $product->update([
            'image' => $path,
        ]);
    }

    
    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}



public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}



}
