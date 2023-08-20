<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(){
        if(request()->ajax()){
            $s_username = request()->get('s_username');
            $s_email = request()->get('s_email');
            $s_phone = request()->get('s_phone');
            $users = User::query()->latest()
                ->when('s_username',function ($query) use ($s_username){
                    $query->where('username','like','%'. $s_username .'%');
                })->when('s_email',function ($query) use ($s_email){
                    $query->where('email','like','%'. $s_email .'%');
                })->when('s_phone',function ($query) use ($s_phone){
                    $query->where('email','like','%'. $s_phone .'%');
                })->get();
            return DataTables::make($users)
                ->escapeColumns([])
                ->addIndexColumn()
                ->addColumn('image',function ($user){
                    return '<img src="'.asset('storage/'.$user->image).'" class="img-thumbnail" alt="..." width="70" height="40">';
                })
                ->addColumn('actions',function ($category){
                    return $category->action_buttons;
                })
                ->rawColumns(['actions','image'])
                ->make();
        }
        return view('dashboard.users.index');
    }

    public function create(){
        return view('dashboard.users.create');
    }

    public function store(UserRequest $request){
        $data = $request->except('_token','image','password');
        if ($request->hasFile('image')) {
            $data['image'] = uploadImage($request->file('image'),'users');
        }
        $data['password'] = Hash::make($request->password);
        $data['code'] = 1;
        $data['active'] = 1;
        User::query()->create($data);
        toastr()->success(__('general.add_toastr'));
        return redirect()->route('admin.users.index');
    }

    public function edit($id){
        $user = User::query()->find($id);
        if (!$user){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.users.index');
        }
        return view('dashboard.users.edit',compact('user'));
    }

    public function update($id,UserRequest $request){
        $user = User::query()->find($id);
        $data = $request->except('_token','image','password');
        if (!$user){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.users.index');
        }
        if ($request->hasFile('image')){
            if($user->image != null){
                Storage::disk('public')->delete($user->image);
                $data['image'] = uploadImage($request->file('image'),'users');
            }else{
                $data['image'] = uploadImage($request->file('image'),'users');
            }
        }
        $data['password'] = $request->has('password') && $request->password != null ? Hash::make($request->password) : $user->password;
        $user->update($data);
        toastr()->success(__('general.update_toastr'));
        return redirect()->route('admin.users.index');
    }

    public function destroy(Request $request){
        $user = User::query()->find($request->id);
        if ($user->image != null){
            Storage::disk('public')->delete($user->image);
        }
        $user->delete();
        return response()->json(['success' => true]);
    }


}
