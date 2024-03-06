<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {

/* -----------------------------------------------
    GTA WEBSITE LANDING PAGE ROUTE 
  -------------------------------------------------*/

Route::get('/', function () {
  $latestPackages = Package::where('status', 'active')->where('is_popular', 'on')->take(3)->get();

  return view('welcome', compact(['latestPackages']));
});

    /* -----------------------------------------------
     AUTH ROUTES
    -------------------------------------------------*/
    Route::middleware('guest')->group(function () {
        // Register Routes
        Route::get('/register', 'RegisterController@show')->name('register.show-form');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        // Login Routes
        Route::get('/login', 'LoginController@show')->name('login.show-form');
        Route::post('/login', 'LoginController@authenticate')->name('login.authenticate');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Backend\Dashboard'], function () {

    // Auth Middleware Route
    Route::middleware('auth')->group(function () {

            // Logout Route
            Route::get('/logout', 'LogoutController@perform')->name('logout');

            // Permission Middleware Routes
            Route::middleware('permission')->group(function () {

                // Dashboard Route
                Route::get('/dashboard', 'DashboardController@index')->name('dashboard.home');

                
                /* -----------------------------------------------
                 USER MANAGEMENT ROUTES
                 -------------------------------------------------*/
                // User Profile Routes
                Route::prefix('profile')->name('profile.')->group(function () {
                    Route::get('/', 'ProfileController@show')->name('show');
                    Route::get('/change-password', 'ProfileController@showChangePassword')->name('show-change-password');
                    Route::patch('/{profile}', 'ProfileController@update')->name('update');
                    Route::patch('/change-password/{profile}', 'ProfileController@changePassword')->name('change-password');
                });

                // Users Routes
                Route::resource('users', 'UserController');
                Route::delete('users/{user}/delete', 'UserController@forceDelete')->name('users.forceDelete');

                // Role and Permission Routes (using resourceful routing)
                Route::resource('roles', 'RoleController');
                Route::resource('permissions', 'PermissionController');

                
                /* -----------------------------------------------
                 SYSTEM MONITORING ROUTES
                 -------------------------------------------------*/
                // Logs Routes
                Route::prefix('logs')->name('logs.')->group(function () {
                    Route::get('/', 'LogController@index')->name('index');
                    Route::get('/{log}', 'LogController@show')->name('show');
                    Route::get('/user-details/{id}', 'LogController@getUserDetails')->name('user-details');
                    Route::get('/filter', 'LogController@filter')->name('filter');
                    Route::get('/logs-by-role/{role}', 'LogController@filter')->name('logsByRole');
                    Route::get('/logs-by-action/{action}', 'LogController@filter')->name('logsByAction');
                    Route::get('/logs-by-date-range/{daterange}', 'LogController@filter')->name('logsByDateRange');
                    Route::post('/handle-filter', 'LogController@handleFilter')->name('handleFilter');
                    Route::delete('/{log}', 'LogController@destroy')->name('destroy');
                    Route::delete('/{log}/delete', 'LogController@forceDelete')->name('forceDelete');
                });

                // Notification Routes
                Route::prefix('notifications')->name('notifications.')->group(function () {
                    Route::get('/get-unread', 'NotificationController@getUnreadNotifications')->name('get-unread');
                    Route::get('/{notification}', 'NotificationController@show')->name('show');
                    Route::post('/mark-as-read/{notification}', 'NotificationController@markAsRead')->name('mark-as-read');
                });


/* -----------------------------------------------
      PACKAGE RESOURCE
    -------------------------------------------------*/
Route::resource('Packages', PackageController::class);
Route::get('/admin/packages/{status}', [PackageController::class, 'show'])->name('packageStatus');

//Display admin Dashboard route
Route::get('/admin/dashboard', [dashboardController::class, 'dashboard'])->name('dashboard');

Route::controller(loginController::class)->group(function () {
  Route::get('/admin', 'login')->name('login');
  Route::post('/authenticate', 'authenticate')->name('authenticate');
});

//GTA admin logout route.
Route::post('/logout', [logoutController::class, 'logout'])->name('logout');
