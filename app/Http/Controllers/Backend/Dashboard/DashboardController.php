<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Notification;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $rolesCount = Role::count();
        $permissionsCount = Permission::count();
        $logsCount = Log::count();
        $notifCount = Notification::latest()->whereNull('read_at')->count();

        // Get new registered members within a few days from the user's table
        $newRegisteredMembersCount = User::where('created_at', '>=', Carbon::now()->subDays(7))->count();

        // Get the data from the ChartController
        $userCreatedData = (new ChartController)->userCreatedChart();
        $packagePublishedData = (new ChartController)->packagePublishedChart();

        return view(config('system.paths.backend.base') . 'home', [
            'usersCount' => $usersCount,
            'rolesCount' => $rolesCount,
            'permissionsCount' => $permissionsCount,
            'logsCount' => $logsCount,
            'notifCount' => $notifCount,
            'newRegisteredMembersCount' => $newRegisteredMembersCount,
            'userCreatedData' => $userCreatedData,
            'packagePublishedData' => $packagePublishedData,
        ]);
    }
}
