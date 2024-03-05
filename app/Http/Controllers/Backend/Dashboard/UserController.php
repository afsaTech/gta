<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()
            ->whereNull('deleted_at')
            ->get();

        return view(config('system.paths.backend.page') . 'users.index', compact('users'));
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('system.paths.backend.page') . 'users.create');
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param UserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User(
            array_merge($request->validated(), [
                'password' => '1234',
                'created_by' => Auth::id(), 
            ]),
        );

        $user->save();

        return redirect()
            ->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view(config('system.paths.backend.page') . 'users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view(config('system.paths.backend.page') . 'users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get(),
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UserRequest $request)
    {
        $user->update($request->validated());
        $user->syncRoles($request->get('role'));
        $user->updated_by = Auth::id(); 
        $user->save();

        return redirect()
            ->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->deleted_by = auth()->id();
        $user->save();
        $user->delete();

        return redirect()
            ->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
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
            $user = User::withTrashed()->findOrFail($id);
            $user->forceDelete();
        });

        return redirect()
            ->route('users.index')
            ->withSuccess(__('User permanently deleted.'));
    }
}
