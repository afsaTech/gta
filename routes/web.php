<?php

use App\Models\Package;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* -----------------------------------------------
    GTA WEBSITE LANDING PAGE ROUTE 
  -------------------------------------------------*/
  Route::get('/',function(){
    $latestPackages=Package::where('status','active')->where('is_popular','on')->take(3)->get();
    return view('welcome',compact(['latestPackages']));
  });
  
  /* -----------------------------------------------
    ROUTE TO SHOW ALL ACTIVE PACKAGES 
  -------------------------------------------------*/
  Route::get('/packages',function(){
    $packages=Package::latest()->where('status','active')->paginate(6);
    return view('packages.packages',compact(['packages']));
  });
  
  /* -----------------------------------------------
      ROUTE TO SHOW SINGLE PACKAGE
    -------------------------------------------------*/
  Route::get('/package/{id}',function($id){
    $package=Package::find($id);
    return view('packages.package',compact(['package',]));
  });
  
  /* -----------------------------------------------
      GTA ADMIN PANNEL ROUTES
    -------------------------------------------------*/
  Route::get('/admin',function(){ 
    return view('admin.index');
  });
  
  Route::get('/admin/pages',function(){  
    return view('admin.pages.page');
  });
  
  /* -----------------------------------------------
      PACKAGE ROUTES
    -------------------------------------------------*/
  Route::get('/admin/packages/{status}',[PackageController::class,'index'])->name('packages.status');
  Route::resource('Packages',PackageController::class);
  
  /*Route::middleware(['Auth'])->group(function(){
  
  });*/