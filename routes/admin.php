<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\RealEstateController;
use App\Http\Controllers\Dashboard\RegionController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\WelcomePageController;
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
        Route::get('edit-profile',[AuthController::class,'edit_profile'])->name('admin.edit_profile');
        Route::post('edit-profile',[AuthController::class,'edit_profile_update'])->name('admin.edit_profile_update');
        ///////////////////////////// User Management //////////////////////////////////////////
        Route::group(['prefix' => 'users'],function (){
            Route::get('/',[UserController::class,'index'])->name('admin.users.index');
            Route::get('/create',[UserController::class,'create'])->name('admin.users.create');
            Route::post('/store',[UserController::class,'store'])->name('admin.users.store');
            Route::get('/edit/{id}',[UserController::class,'edit'])->name('admin.users.edit');
            Route::post('/update/{id}',[UserController::class,'update'])->name('admin.users.update');
            Route::post('/destroy',[UserController::class,'destroy'])->name('admin.users.destroy');
        });
        ///////////////////////////// Category Management //////////////////////////////////////////
        Route::group(['prefix' => 'categories'],function (){
            Route::get('/',[CategoryController::class,'index'])->name('admin.categories.index');
            Route::get('/create',[CategoryController::class,'create'])->name('admin.categories.create');
            Route::post('/store',[CategoryController::class,'store'])->name('admin.categories.store');
            Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.categories.edit');
            Route::post('/update/{id}',[CategoryController::class,'update'])->name('admin.categories.update');
            Route::post('/destroy',[CategoryController::class,'destroy'])->name('admin.categories.destroy');
        });

        ///////////////////////////// City Management //////////////////////////////////////////
        Route::group(['prefix' => 'cities'],function (){
            Route::get('/',[CityController::class,'index'])->name('admin.cities.index');
            Route::get('/create',[CityController::class,'create'])->name('admin.cities.create');
            Route::post('/store',[CityController::class,'store'])->name('admin.cities.store');
            Route::get('/edit/{id}',[CityController::class,'edit'])->name('admin.cities.edit');
            Route::post('/update/{id}',[CityController::class,'update'])->name('admin.cities.update');
            Route::post('/destroy',[CityController::class,'destroy'])->name('admin.cities.destroy');
        });

        ///////////////////////////// Regions Management //////////////////////////////////////////
        Route::group(['prefix' => 'regions'],function (){
            Route::get('/',[RegionController::class,'index'])->name('admin.regions.index');
            Route::get('/create',[RegionController::class,'create'])->name('admin.regions.create');
            Route::post('/store',[RegionController::class,'store'])->name('admin.regions.store');
            Route::get('/edit/{id}',[RegionController::class,'edit'])->name('admin.regions.edit');
            Route::post('/update/{id}',[RegionController::class,'update'])->name('admin.regions.update');
            Route::post('/destroy',[RegionController::class,'destroy'])->name('admin.regions.destroy');
        });

        ///////////////////////////// Real Estate Management //////////////////////////////////////////
        Route::group(['prefix' => 'reals'],function (){
            Route::get('/',[RealEstateController::class,'index'])->name('admin.reals.index');
//            Route::get('/create',[RealEstateController::class,'create'])->name('admin.reals.create');
//            Route::post('/store',[RealEstateController::class,'store'])->name('admin.reals.store');
//            Route::get('/edit/{id}',[RealEstateController::class,'edit'])->name('admin.reals.edit');
//            Route::post('/update/{id}',[RealEstateController::class,'update'])->name('admin.reals.update');
            Route::post('/destroy',[RealEstateController::class,'destroy'])->name('admin.reals.destroy');
        });

        ///////////////////////////// Slider Management //////////////////////////////////////////
        Route::group(['prefix' => 'sliders'],function (){
            Route::get('/',[SliderController::class,'index'])->name('admin.sliders.index');
            Route::get('/create',[SliderController::class,'create'])->name('admin.sliders.create');
            Route::post('/store',[SliderController::class,'store'])->name('admin.sliders.store');
            Route::get('/edit/{id}',[SliderController::class,'edit'])->name('admin.sliders.edit');
            Route::post('/update/{id}',[SliderController::class,'update'])->name('admin.sliders.update');
            Route::post('/destroy',[SliderController::class,'destroy'])->name('admin.sliders.destroy');
        });

        ///////////////////////////// Welcome Page Management //////////////////////////////////////////
        Route::group(['prefix' => 'welcomes'],function (){
            Route::get('/',[WelcomePageController::class,'index'])->name('admin.welcomes.index');
            Route::get('/create',[WelcomePageController::class,'create'])->name('admin.welcomes.create');
            Route::post('/store',[WelcomePageController::class,'store'])->name('admin.welcomes.store');
            Route::get('/edit/{id}',[WelcomePageController::class,'edit'])->name('admin.welcomes.edit');
            Route::post('/update/{id}',[WelcomePageController::class,'update'])->name('admin.welcomes.update');
            Route::post('/destroy',[WelcomePageController::class,'destroy'])->name('admin.welcomes.destroy');
        });

        ///////////////////////////// Contact Us Management //////////////////////////////////////////
        Route::group(['prefix' => 'contacts'],function (){
            Route::get('/',[ContactController::class,'index'])->name('admin.contacts.index');
            Route::get('/show',[ContactController::class,'show'])->name('admin.contacts.show');
            Route::post('/destroy',[ContactController::class,'destroy'])->name('admin.contacts.destroy');
        });

        ///////////////////////////// Pages Management //////////////////////////////////////////
        Route::group(['prefix' => 'pages'],function (){
            Route::get('/about-us',[PageController::class,'about_us'])->name('admin.pages.about_us');
            Route::post('/about-us',[PageController::class,'about_us_update'])->name('admin.pages.about_us_update');
            Route::get('/terms-and-conditions',[PageController::class,'terms_and_conditions'])->name('admin.pages.terms_and_conditions');
            Route::post('/terms-and-conditions',[PageController::class,'terms_and_conditions_update'])->name('admin.pages.terms_and_conditions_update');
            Route::get('/privacy-policy',[PageController::class,'privacy_policy'])->name('admin.pages.privacy_policy');
            Route::post('/privacy-policy',[PageController::class,'privacy_policy_update'])->name('admin.pages.privacy_policy_update');
        });
    });

});




