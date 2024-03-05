<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Packages\Package;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function userCreatedChart()
    {
        $users = User::select('created_at')
            ->whereBetween('created_at', [now()->subDays(30), now()])
            ->get();

        $data = $users
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d M');
            })
            ->map->count();

        return $data;
    }

    public function packagePublishedChart()
    {
        $packages = Package::select('created_at')
            ->whereBetween('created_at', [now()->subDays(30), now()])
            ->get();

        $data = $packages
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d M');
            })
            ->map->count();

        return $data;
    }
}
