<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{

    /**
     * Instantiate a new AdminDashboard instance.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a dashboard to Admin users.
     *
     * @return \Illuminate\Http\Response
     */


    public function dashboard()
    {
        if (Auth::check()) {

            return view('admin.dashboard');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Please login to access the dashboard.',

        ])->onlyInput('email');
    }
}
