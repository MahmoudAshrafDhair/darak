<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RealEstateController extends Controller
{
    public function index(){
        $categories = Category::query()->latest()->get();
        if(request()->ajax()){
            $s_name = request()->get('s_name');
            $type = request()->get('type');
            $category = request()->get('category');
            $reals = RealEstate::query()->latest()
                ->when('s_name',function ($query) use ($s_name){
                    $query->where('name->'.app()->getLocale(),'like','%'. $s_name .'%');
                })->when('type',function ($query) use ($type){
                    if($type != -1){
                        $query->where('type',$type);
                    }
                })->when('category',function ($query) use ($category){
                    if($category != 0){
                        $query->where('category_id' , $category);
                    }

                })->get();
            return DataTables::make($reals)
                ->escapeColumns([])
                ->addIndexColumn()
                ->addColumn('image',function ($real){
                    return '<img src="'.asset('storage/'.$real->image).'" class="img-thumbnail" alt="..." width="70" height="40">';
                })
                ->addColumn('name',function ($real){
                    return  $real->getTranslation('name', app()->getLocale());
                })->addColumn('actions',function ($real){
                    return $real->action_buttons;
                })
                ->addColumn('type',function ($real){
                    if($real->type == 0){
                        $type = '<span class="label label-light-danger label-inline font-weight-bold">' . __('real.sale') . '</span>';
                    }else{
                        $type = '<span class="label label-light-success label-inline font-weight-bold">' . __('real.rent') . '</span>';
                    }
                    return $type ;
                })->addColumn('category',function ($real){
                    return $real->category->getTranslation('name', app()->getLocale());
                })->rawColumns(['actions','image'])
                ->make();
        }
        return view('dashboard.reals.index',compact('categories'));
    }

    public function destroy(Request $request){
        $real = RealEstate::query()->find($request->id);
        if(!$real){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.reals.index');
        }
        $real->delete();
        return response()->json(['success' => true]);
    }
}
