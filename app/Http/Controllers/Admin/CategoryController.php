<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(12);
        return view("admin.categories.index", compact("categories"));
    }
    
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $path = null;
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/categories');
        }

        Category::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'image' => $path 
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
{
    // Step 1: Validate incoming data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Step 2: Prepare data for update
    $data = [
        'name' => $validated['name'],
        'slug' => \Str::slug($validated['name']),
    ];

    // Step 3: Handle image upload if present
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('public/categories');
    }

    // Step 4: Perform the update
    $category->update($data);

    // Step 5: Redirect with success message
    return redirect()->route('categories.index')
        ->with('success', 'Category updated successfully');
}


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'Category Deleted Successfully.');
    }
}