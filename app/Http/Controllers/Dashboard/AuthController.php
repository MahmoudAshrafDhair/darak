<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact_Us;
use App\Models\RealEstate;
use App\Models\Region;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showForm(){
        return view('dashboard.auth.login');
    }

    public function login(AdminLoginRequest $request){
        $remember = $request->has('remember');
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$remember)){
            return redirect()->route('admin.dashboard');
        }
        //toastr()->error('Email Or Password Are Not Correct');
        return redirect()->back()->with('error','Email Or Password Are Not Correct');
    }


    public function showDashboard(){
        $users = User::query()->count();
        $categories = Category::query()->count();
        $cities = City::query()->count();
        $regions = Region::query()->count();
        $reals = RealEstate::query()->count();
        $contacts = Contact_Us::query()->count();
        $sliders = Slider::query()->count();
        return view('dashboard.dashboard',compact('users','categories','cities','regions','reals','contacts','sliders'));
    }

    public function logout(Request $request){
        \auth()->guard('admin')->logout();
        return redirect()->route('admin.show.form')->with('success','Logout Successfully');
    }

    public function edit_profile(){
        $admin = Auth::guard('admin')->user();
        return view('dashboard.admins.profile',compact('admin'));
    }

    public function edit_profile_update(AdminRequest $request){
        $admin = Admin::query()->find(Auth::guard('admin')->id());
        $data = $request->except('_token','image','password');
        if (!$admin){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.edit_profile');
        }
        if ($request->hasFile('image')){
            if($admin->image != null){
                Storage::disk('public')->delete($admin->image);
                $data['image'] = uploadImage($request->file('image'),'admins');
            }else{
                $data['image'] = uploadImage($request->file('image'),'admins');
            }
        }
        $data['password'] = $request->has('password') && $request->password != null ? Hash::make($request->password) : $admin->password;
        $admin->update($data);
        toastr()->success(__('general.update_toastr'));
        return redirect()->route('admin.edit_profile');
    }
}
