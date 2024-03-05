<?php

namespace App\Http\Controllers\Backend\Dashboard\Package;

use App\Http\Controllers\Controller;
use App\Models\Packages\Category;
use App\Models\Packages\Image;
use App\Models\Packages\Package;
use App\Http\Requests\Packages\PackageRequest;
use App\Http\Requests\Packages\ImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::latest()
        ->whereNull('deleted_at')
        ->get();

         return view(config('system.paths.backend.page') . 'packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->whereNull('deleted_at')->get();

        return view(config('system.paths.backend.page') . 'packages.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageRequest $request, ImageRequest $imageRequest)
    {
        $package = Package::create($request->validated());

        // Handle image validation and storage
        $this->storeImages($imageRequest, $package);

        return redirect()->route('packages.index')->withSuccess(__('Package created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        return view(config('system.paths.backend.page') . 'packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        $categories = Category::latest()->whereNull('deleted_at')->get();

        return view(config('system.paths.backend.page') . 'packages.edit', compact('categories', 'package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PackageRequest $request, Package $package)
    {
        if($request->hasFile('images') || $request->hasFile('image')) {
            return redirect()->route('package-images.index')->withErrors(__('Edit package images here!'));
        }

        $validatedData = $request->validated();
        $package->update($validatedData);

        return redirect()->route('packages.index')->withSuccess(__('Package updated successfully.'));        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('packages.index')->withSuccess(__('Package deleted successfully.'));
    }

    /**
     * Remove the specified resource from the database permanently.
    */
    public function forceDelete(Package $package)
    {
        $package->forceDelete();
    
        return redirect()->route('packages.index')->withSuccess(__('Package permanently deleted.'));
    }

    /**
     * Store the images associated with the package.
     */
    protected function storeImages(ImageRequest $request, Package $package)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Validate the image using ImageRequest rules
                $imageRequest = new ImageRequest([
                    'package_id' => $package->id,
                    'url' => $image,
                ]);
                                
                // Generate a unique name for the image using timestamp and UUID
                $imageName = now()->timestamp . '_' . Str::uuid()->toString() . '.' . $image->getClientOriginalExtension();

                // Store the image in the specified folder
                $url = $image->storeAs('package/images', $imageName, 'public');

                // Create record in the database for the image
                Image::create([
                    'package_id' => $package->id,
                    'url' => $url,
                ]);
            }
        }
    }
}
