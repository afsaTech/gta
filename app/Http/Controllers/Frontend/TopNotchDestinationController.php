<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TopNotchDestination as TopNotch;

class TopNotchDestinationController extends Controller
{
    /**
     * Display a listing of the top notch destinations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topNotch = TopNotch::latest()->get();

        return view(config('system.paths.backend.page') . 'topnotchdestinations.index')->with('tnds', $topNotch);
    }

    /**
     * Display the specified top notch destination.
     *
     * @param  \App\Models\TopNotchDestination  $topNotchDestination
     * @return \Illuminate\Http\Response
     */
    public function show(TopNotch $topNotch)
    {
        return view(config('system.paths.backend.page') . 'topnotchdestinations.show')->with('tnd', $topNotch);
    }
}