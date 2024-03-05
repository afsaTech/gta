<?php

namespace App\Http\Controllers\Backend\Dashboard\Package;

use App\Http\Controllers\Controller;
use App\Http\Requests\Packages\CategoryRequest;
use App\Models\Packages\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->whereNull('deleted_at')->get();

         return view(config('system.paths.backend.page') . 'packages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(config('system.paths.backend.page') . 'packages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();

        if($validatedData['slug'] == "") {
            $validatedData['slug'] = $this->generateSlug($validatedData['name']);
        }
        
        Category::create($validatedData);

        return redirect()->route('categories.index')->withSuccess(__('Category created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view(config('system.paths.backend.page') . 'packages.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view(config('system.paths.backend.page') . 'packages.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();

        if($validatedData['slug'] == "") {
            $validatedData['slug'] = $this->generateSlug($validatedData['name']);
        }

        $category->update($validatedData);

        return redirect()->route('categories.index')->withSuccess(__('Category updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->withSuccess(__('Category deleted successfully.'));
    }
    
    /**
     * Remove the specified resource from the database permanently.
     */
    public function forceDelete(Category $category)
    {
        $category->forceDelete();
    
        return redirect()->route('categories.index')->withSuccess(__('Category permanently deleted.'));
    }

    /**
     * Generate Slug from the name request
     */
    private function generateSlug($name)
    {
        $slug = Str::slug($name, '-');
        $existingSlug = Category::where('slug', $slug)->where('id', '!=', request()->route('category'))->first();
    
        if ($existingSlug) {
            $slug = $slug . '-' . time();
        }
    
        return $slug;
    }
}
