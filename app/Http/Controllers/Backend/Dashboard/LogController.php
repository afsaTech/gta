<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LogController extends Controller
{
    /**
     * Display a listing of the logs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve only logs where deleted_at is null
        $logs = Log::latest()
            ->whereNull('deleted_at')
            ->get();

        return view(config('system.paths.backend.page') . 'logs.index', compact('logs'));
    }

    /**
     * Display logs filtered by the role.
     *
     * @param  int  $roleID
     * @return \Illuminate\Http\Response
     */
    public function logsByRole($roleID)
    {
        // Get the logs for the specified user.
        $logs = Log::where('user_id', $roleID)->get();

        // Return the logs to the view.
        return view(config('system.paths.backend.page') . 'logs.index', compact('logs'));
    }

    /**
     * Display logs filtered by action.
     *
     * @param  string  $action
     * @return \Illuminate\Http\Response
     */
    public function logsByAction($action)
    {
        // Get the logs for the specified action.
        $logs = Log::where('action', $action)->get();

        // Return the logs to the view.
        return view(config('system.paths.backend.page') . 'logs.index', compact('logs'));
    }

    /**
     * Display logs filtered by date range.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logsByDateRange(Request $request)
    {
        // Get the start and end dates from the request.
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Get the logs for the specified date range.
        $logs = Log::whereBetween('created_at', [$startDate, $endDate])->get();

        // Return the logs to the view.
        return view(config('system.paths.backend.page') . 'logs.index', compact('logs'));
    }

    /**
     * Return a logs filter view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter()
    {
        $tables = Schema::getConnection()
            ->getDoctrineSchemaManager()
            ->listTableNames();
        $roles = Role::all();

        return view(config('system.paths.backend.page') . 'logs.filter', compact('tables', 'roles'));
    }

    public function handleFilter(Request $request)
    {
        // Get filter criteria from the request
        $actionTypes = $request->input('action_type', []);
        $tableNames = $request->input('table_name', []);
        $roles = $request->input('role', []);
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');
        $orderBy = $request->input('order_by');
        $sortOrder = $request->input('sort_order');

        // Build your query based on the filter criteria
        $query = Log::query();

        if (!empty($actionTypes)) {
            $query->whereIn('action', $actionTypes);
        }

        if (!empty($tableNames)) {
            $query->whereIn('table_name', $tableNames);
        }

        if (!empty($roles)) {
            $query->whereHas('user', function ($q) use ($roles) {
                $q->whereIn('role_id', $roles);
            });
        }

        if (!empty($roles)) {
            $query->join('model_has_roles', 'logs.user_id', '=', 'model_has_roles.model_id')->whereIn('model_has_roles.role_id', $roles);
        }

        if ($dateFrom && $dateTo) {
            $query->whereBetween('created_at', [$dateFrom, $dateTo]);
        }

        if ($orderBy && $sortOrder) {
            $query->orderBy($orderBy, $sortOrder);
        }

        // Execute the query and get the filtered results
        $logs = $query->get();

        // Pass the filtered results back to the view
        return response()->json(['logs' => $logs]);
    }

    /**
     * Show logs by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = Log::findOrFail($id);

        return view(config('system.paths.backend.page') . 'logs.show', compact('log'));
    }

    /**
     * GetUserDetails from the logs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getUserDetails($id)
    {
        $user = User::with('roles.permissions')->findOrFail($id);
        return response()->json($user);
    }

    /**
     * Soft delete a log entry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $log = Log::findOrFail($id);
        $log->deleted_by = auth()->id(); // Set the user who deleted
        $log->delete();

        return redirect()
            ->route('logs.index')
            ->withSuccess(__('Log deleted successfully (soft delete).'));
    }

    /**
     * Force delete a log entry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        DB::transaction(function () use ($id) {
            $log = Log::withTrashed()->findOrFail($id);
            $log->forceDelete();
        });

        return redirect()
            ->route('logs.index')
            ->withSuccess(__('Log permanently deleted.'));
    }
}
