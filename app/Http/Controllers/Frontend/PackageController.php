<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Packages\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::latest()->where('status', 'available')->paginate(6);

        return view(config('system.paths.frontend.page') . 'packages.index', compact('packages'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        return view(config('system.paths.frontend.page') . 'packages.show', compact('package'));
    }
}
