<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the user's profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();

        return view(config('system.paths.backend.page') . 'profile.show', compact('user'));
    }

    /**
     * Show the user's profile change password page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePassword()
    {
        $user = Auth::user();

        return view(config('system.paths.backend.page') . 'profile.change_password', compact('user'));
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $profile, UpdateUserRequest $request)
    {
        $validatedData = $request->validated();
        unset($validatedData['password']); // Remove password from validated data

        $profile->update($validatedData);
        $profile->updated_by = Auth::id();
        $profile->save();

        return redirect()
            ->route('profile.show')
            ->withSuccess(__('Profile updated successfully.'));
    }

    /**
     * Change the user's password.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(User $profile, Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        // Verify if the old password matches the one in the database
        if (Hash::check($request->input('old_password'), $profile->password)) {
            // Old password matches, proceed to update the password
            $profile->password = $request->input('password');
            $profile->updated_by = Auth::id();
            $profile->save();

            return redirect()
                ->route('profile.show')
                ->withSuccess(__('Password changed successfully.'));
        } else {
            // Old password does not match, return with an error message
            return redirect()
                ->route('profile.change-password')
                ->withErrors(__(['old_password' => 'Incorrect old password']));
        }
    }
}
