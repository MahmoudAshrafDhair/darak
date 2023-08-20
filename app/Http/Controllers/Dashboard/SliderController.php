<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\RealEstate;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
    public function index(){
        if(request()->ajax()){
            $sliders = Slider::query()->latest()->get();
            return DataTables::make($sliders)
                ->escapeColumns([])
                ->addIndexColumn()
                ->addColumn('image',function ($slider){
                    return '<img src="'.asset('storage/'.$slider->image).'" class="img-thumbnail" alt="..." width="70" height="40">';
                })
                ->addColumn('actions',function ($slider){
                    return $slider->action_buttons;
                })
                ->addColumn('real',function ($slider){
                    return $slider->real_estate_id != null ? $slider->real->getTranslation('name', app()->getLocale()) : __('general.notFound');
                })
                ->rawColumns(['actions','image','real'])
                ->make();
        }
        return view('dashboard.sliders.index');
    }

    public function create(){
        $reals = RealEstate::query()->latest()->get();
        return view('dashboard.sliders.create',compact('reals'));
    }

    public function store(SliderRequest $request){
        $data = $request->except('_token','image','real_estate_id');
        if ($request->hasFile('image')) {
            $data['image'] = uploadImage($request->file('image'),'sliders');
        }
        $data['real_estate_id'] = $request->real_estate_id != 0 ? $request->real_estate_id : null;
        Slider::query()->create($data);
        toastr()->success(__('general.add_toastr'));
        return redirect()->route('admin.sliders.index');
    }

    public function edit($id){
        $slider = Slider::query()->find($id);
        $reals = RealEstate::query()->latest()->get();
        if (!$slider){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.sliders.index');
        }
        return view('dashboard.sliders.edit',compact('slider','reals'));
    }

    public function update($id,SliderRequest $request){
        $slider = Slider::query()->find($id);
        $data = $request->except('_token','image','real_estate_id');
        if (!$slider){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.sliders.index');
        }
        if ($request->hasFile('image')){
            if($slider->image != null){
                Storage::disk('public')->delete($slider->image);
                $data['image'] = uploadImage($request->file('image'),'sliders');
            }else{
                $data['image'] = uploadImage($request->file('image'),'sliders');
            }
        }
        $data['real_estate_id'] = $request->real_estate_id != 0 ? $request->real_estate_id : null;
        $slider->update($data);
        toastr()->success(__('general.update_toastr'));
        return redirect()->route('admin.sliders.index');
    }

    public function destroy(Request $request){
        $sldier = Slider::query()->find($request->id);
        if ($sldier->image != null){
            Storage::disk('public')->delete($sldier->image);
        }
        $sldier->delete();
        return response()->json(['success' => true]);
    }
}
