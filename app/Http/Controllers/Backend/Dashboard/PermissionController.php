<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::whereNull('deleted_at')->get();

        return view(config('system.paths.backend.page') . 'permissions.index', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Show form for creating permissions
     *
     * @return \Illuminate\Http\Response
     */
    public function getRoutes()
    {
        $routes = Route::getRoutes();

        $routeNames = [];
        foreach ($routes as $route) {
            if ($route->getName() != null && file_exists(base_path('routes/web.php'))) {
                if (!in_array($route->getName(), ['sanctum.csrf-cookie', 'ignition.healthCheck', 'ignition.executeSolution', 'ignition.updateConfig'])) {
                    $routeNames[$route->getName()] = $route->getName();
                }
            }
        }

        $permissionNames = Permission::pluck('name')->toArray();

        $unregisteredRoutes = array_diff($routeNames, $permissionNames);

        return $unregisteredRoutes;
    }

    public function create()
    {
        $routeNames = PermissionController::getRoutes();
        return view(config('system.paths.backend.page') . 'permissions.create', compact('routeNames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_array($request->input('name'))) {
            $request->validate([
                'name' => 'required|array|unique:permissions,name',
            ]);

            foreach ($request->input('name') as $name) {
                $permission = new Permission([
                    'name' => $name,
                    'created_by' => Auth::id(), // Set the creator
                ]);
                // print_r($permission->name);
                $permission->save();
            }
        } else {
            $request->validate([
                'name' => 'required|unique:permissions,name',
            ]);

            $permission = new Permission([
                'name' => $request->input('name'),
                'created_by' => Auth::id(), // Set the creator
            ]);
            // print_r($permission->name);
            $permission->save();
        }

        return redirect()
            ->route('permissions.index')
            ->withSuccess(__('Permissions created successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view(config('system.paths.backend.page') . 'permissions.edit', [
            'permission' => $permission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);

        $permission->name = $request->input('name');
        $permission->updated_by = Auth::id(); // Set the updater
        $permission->save();

        return redirect()
            ->route('permissions.index')
            ->withSuccess(__('Permission updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->deleted_by = Auth::id(); // Set the deleter
        $permission->save();
        $permission->forceDelete();

        return redirect()
            ->route('permissions.index')
            ->withSuccess(__('Permission deleted successfully.'));
    }
}
