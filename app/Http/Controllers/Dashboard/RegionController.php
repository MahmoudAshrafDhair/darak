<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RegionController extends Controller
{
    public function index(){
        if(request()->ajax()){
            $s_name = request()->get('s_name');
            $regions = Region::query()->latest()
                ->when('s_name',function ($query) use ($s_name){
                    $query->where('name->'.app()->getLocale(),'like','%'. $s_name .'%');
                })->get();
            return DataTables::make($regions)
                ->escapeColumns([])
                ->addIndexColumn()
                ->addColumn('name',function ($region){
                    return $region->getTranslation('name', app()->getLocale());
                })
                ->addColumn('actions',function ($region){
                    return $region->action_buttons;
                })
                ->rawColumns(['actions','name'])
                ->make();
        }
        return view('dashboard.regions.index');
    }


    public function create(){
        return view('dashboard.regions.create');
    }

    public function store(RegionRequest $request){
        $data = $request->except('_token','name_ar','name_en');
        $data['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        Region::query()->create($data);
        toastr()->success(__('general.add_toastr'));
        return redirect()->route('admin.regions.index');
    }

    public function edit($id){
        $region = Region::query()->find($id);
        if(!$region){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.regions.index');
        }
        return view('dashboard.regions.edit',compact('region'));
    }

    public function update($id,RegionRequest $request){
        $region = Region::query()->find($id);
        $data = $request->except('_token','name_ar','name_en');
        $data['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        if(!$region){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.regions.index');
        }
        $region->update($data);
        toastr()->success(__('general.update_toastr'));
        return redirect()->route('admin.regions.index');
    }

    public function destroy(Request $request){
        $region = Region::query()->find($request->id);
        if(!$region){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.regions.index');
        }
        $region->delete();
        return response()->json(['success' => true]);
    }
}
