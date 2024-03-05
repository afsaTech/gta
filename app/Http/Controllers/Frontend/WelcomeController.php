<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TopNotchDestination;
use App\Models\Packages\Package;

class WelcomeController extends Controller
{
    public function index()
    {
        $latestPackages = Package::where('status', 'available')->where('is_popular','yes')->take(3)->get();
        $discountedPackages = Package::where('discount', true)->latest()->take(3)->get();

        $topNotches = TopNotchDestination::latest()->take(3)->get();
      
        return view(config('system.paths.frontend.base') . 'welcome', compact(['latestPackages','discountedPackages', 'topNotches']));
    }
}
