<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public function index(){
        if(request()->ajax()){
            $s_name = request()->get('s_name');
            $categories = Category::query()->latest()
                ->when('s_name',function ($query) use ($s_name){
                    $query->where('name->'.app()->getLocale(),'like','%'. $s_name .'%');
                })->get();
            return DataTables::make($categories)
                ->escapeColumns([])
                ->addIndexColumn()
                ->addColumn('name',function ($category){
                    return $category->getTranslation('name', app()->getLocale());
                })
                ->addColumn('actions',function ($category){
                    return $category->action_buttons;
                })
                ->rawColumns(['actions','name'])
                ->make();
        }
        return view('dashboard.categories.index');
    }

    public function create(){
        return view('dashboard.categories.create');
    }

    public function store(CategoryRequest $request){
        $data = $request->except('_token','image','name_ar','name_en');
        $data['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        Category::query()->create($data);
        toastr()->success(__('general.add_toastr'));
        return redirect()->route('admin.categories.index');
    }

    public function edit($id){
        $category = Category::query()->find($id);
        if(!$category){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.categories.index');
        }
        return view('dashboard.categories.edit',compact('category'));
    }

    public function update($id,CategoryRequest $request){
        $category = Category::query()->find($id);
        $data = $request->except('_token','image','name_ar','name_en');
        $data['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        if(!$category){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.categories.index');
        }
        $category->update($data);
        toastr()->success(__('general.update_toastr'));
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Request $request){
        $category = Category::query()->find($request->id);
        if(!$category){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.categories.index');
        }
        $category->delete();
        return response()->json(['success' => true]);
    }
}
