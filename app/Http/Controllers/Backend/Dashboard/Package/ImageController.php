<?php

namespace App\Http\Controllers\Backend\Dashboard\Package;

use App\Http\Controllers\Controller;
use App\Http\Requests\Packages\ImageRequest;
use App\Models\Packages\Image;
use App\Models\Packages\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        $packageImages = Image::latest()
        ->whereNull('deleted_at')
        ->get()
        ->groupBy('package_id');

         return view(config('system.paths.backend.page') . 'packages.images.index', compact('packageImages'));
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        $packages = Package::latest()
        ->whereNull('deleted_at')
        ->get();

        return view(config('system.paths.backend.page') . 'packages.images.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(ImageRequest $request, Image $image)
    {
        $validatedData = $request->validated();

        $url = $this->storeImages($request, $image);
        
        Image::create([
            'package_id' => $validatedData['package_id'],
            'url' => $url,
        ]);

        return redirect()->route('package-images.index')->withSuccess(__('Package image created successfully.'));        
    }

    /**
     * Display the specified resource.
    */
    public function show(Image $image)
    {
        return view(config('system.paths.backend.page') . 'packages.images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Image $image)
    {
        $packages = Package::latest()
        ->whereNull('deleted_at')
        ->get();

        return view(config('system.paths.backend.page') . 'packages.images.edit', compact(['packages', 'image']));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(ImageRequest $request, Image $image)
    {
        $validatedData = $request->validated();

        $url = $request->fileValidator($request, $image);

        $image->update([
            'package_id' => $validatedData['package_id'],
            'url' => $url,
        ]);

        return redirect()->route('package-images.index')->withSuccess(__('Package image updated successfully.'));        
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->route('package-images.index')->withSuccess(__('Package image deleted successfully.'));
    }
    
    /**
     * Remove the specified resource from the database permanently.
    */
    public function forceDelete(Image $image)
    {
        // Get the image URL from the DB
        $imageUrl = $image->url;
        $msg = "";

        // Delete the image file from the storage folder
        if(Storage::disk('public')->delete($imageUrl)) {
            // Delete the image record from the DB
            $image->forceDelete();   
            
            $msg = redirect()->route('package-images.index')->withSuccess(__('Image deleted permanently'));
         } else {
            $msg = redirect()->route('package-images.index')->withErrors(__('Image deletion unsuccessful'));
         }   
         
         return $msg;
    }

    /**
     * Store the images associated with the package.
     */
    protected function storeImages(ImageRequest $request, Image $packageImage)
    {
        $url = "";

        if ($request->hasFile('url')) {
            $image = $request->file('url');

            // Generate a unique name for the image using timestamp and UUID
            $imageName = now()->timestamp . '_' . Str::uuid()->toString() . '.' . $image->getClientOriginalExtension();

            // Store the image in the specified folder
            $url = $image->storeAs('package/images', $imageName, 'public');
        }

        return $url;
    }
}
