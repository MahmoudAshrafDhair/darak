<?php

use App\Http\Controllers\Dashboard\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(["prefix" => "admin",'middleware' => 'guest:admin'],function (){
        // You Are Not Required Login
        Route::get('login',[AuthController::class,'showForm'])->name('admin.show.form');
        Route::post('login',[AuthController::class,'login'])->name('admin.login');
    });

    Route::group(["prefix" => "admin",'middleware' => 'auth:admin'],function (){
        // You Are Required Login
        Route::get('dashboard',[AuthController::class,'showDashboard'])->name('admin.dashboard');
        Route::post('logout',[AuthController::class,'logout'])->name('admin.logout');
    });

});




