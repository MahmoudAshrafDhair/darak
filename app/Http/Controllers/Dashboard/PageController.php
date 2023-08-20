<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about_us(){
        $setting = Setting::query()->first();
        return view('dashboard.pages.about',compact('setting'));
    }

    public function about_us_update(Request $request){
        $setting = Setting::query()->first();
        $setting->update([
            'about_us' => [
                'ar' => $request->about_us_ar,
                'en' => $request->about_us_en,
            ]
        ]);
        return redirect()->route('admin.pages.about_us');
    }

    public function terms_and_conditions(){
        $setting = Setting::query()->first();
        return view('dashboard.pages.terms',compact('setting'));
    }

    public function terms_and_conditions_update(Request $request){
        $setting = Setting::query()->first();
        $setting->update([
            'terms_and_conditions' => [
                'ar' => $request->terms_and_conditions_ar,
                'en' => $request->terms_and_conditions_en,
            ]
        ]);
        return redirect()->route('admin.pages.terms_and_conditions');
    }

    public function privacy_policy(){
        $setting = Setting::query()->first();
        return view('dashboard.pages.privacy',compact('setting'));
    }

    public function privacy_policy_update(Request $request){
        $setting = Setting::query()->first();
        $setting->update([
            'privacy_police' => [
                'ar' => $request->privacy_police_ar,
                'en' => $request->privacy_police_en,
            ]
        ]);
        return redirect()->route('admin.pages.privacy_policy');
    }
}
