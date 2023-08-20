<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact_Us;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function index(){
        if(request()->ajax()){
            $s_name = request()->get('s_name');
            $s_email = request()->get('s_email');
            $s_phone = request()->get('s_phone');
            $contacts = Contact_Us::query()->latest()
                ->when('s_name',function ($query) use ($s_name){
                    $query->where('name','like','%'. $s_name .'%');
                })->when('s_email',function ($query) use ($s_email){
                    $query->where('email','like','%'. $s_email .'%');
                })->when('s_phone',function ($query) use ($s_phone){
                    $query->where('phone','like','%'. $s_phone .'%');
                })->get();
            return DataTables::make($contacts)
                ->escapeColumns([])
                ->addIndexColumn()
                ->addColumn('actions',function ($contact){
                    return $contact->action_buttons;
                })
                ->rawColumns(['actions'])
                ->make();
        }
        return view('dashboard.contacts.index');
    }

    public function show($id){
        $contact = Contact_Us::query()->find($id);
        if(!$contact){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.contacts.index');
        }
        return view('dashboard.contacts.show',compact('contact'));
    }

    public function destroy(Request $request){
        $contact = Contact_Us::query()->find($request->id);
        if(!$contact){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.contacts.index');
        }
        $contact->delete();
        return response()->json(['success' => true]);
    }
}
