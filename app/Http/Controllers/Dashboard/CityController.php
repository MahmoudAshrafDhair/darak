<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    public function index(){
        if(request()->ajax()){
            $s_name = request()->get('s_name');
            $cities = City::query()->latest()
                ->when('s_name',function ($query) use ($s_name){
                    $query->where('name->'.app()->getLocale(),'like','%'. $s_name .'%');
                })->get();
            return DataTables::make($cities)
                ->escapeColumns([])
                ->addIndexColumn()
                ->addColumn('name',function ($city){
                    return $city->getTranslation('name', app()->getLocale());
                })
                ->addColumn('actions',function ($category){
                    return $category->action_buttons;
                })
                ->rawColumns(['actions','name'])
                ->make();
        }
        return view('dashboard.cities.index');
    }

    public function create(){
        return view('dashboard.cities.create');
    }

    public function store(CityRequest $request){
        $data = $request->except('_token','name_ar','name_en');
        $data['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        City::query()->create($data);
        toastr()->success(__('general.add_toastr'));
        return redirect()->route('admin.cities.index');
    }

    public function edit($id){
        $city = City::query()->find($id);
        if(!$city){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.cities.index');
        }
        return view('dashboard.cities.edit',compact('city'));
    }

    public function update($id,CategoryRequest $request){
        $city = City::query()->find($id);
        $data = $request->except('_token','name_ar','name_en');
        $data['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        if(!$city){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.cities.index');
        }
        $city->update($data);
        toastr()->success(__('general.update_toastr'));
        return redirect()->route('admin.cities.index');
    }

    public function destroy(Request $request){
        $city = City::query()->find($request->id);
        if(!$city){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.cities.index');
        }
        $city->delete();
        return response()->json(['success' => true]);
    }

}
