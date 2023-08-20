<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\WelcomePageRequest;
use App\Models\WelcomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class WelcomePageController extends Controller
{
    public function index(){
        if(request()->ajax()){
            $welcomes = WelcomePage::query()->latest()->get();
            return DataTables::make($welcomes)
                ->escapeColumns([])
                ->addIndexColumn()
                ->addColumn('image',function ($welcome){
                    return '<img src="'.asset('storage/'.$welcome->image).'" class="img-thumbnail" alt="..." width="70" height="40">';
                })
                ->addColumn('actions',function ($welcome){
                    return $welcome->action_buttons;
                })
                ->addColumn('title',function ($welcome){
                    return  $welcome->getTranslation('title', app()->getLocale());
                })
                ->rawColumns(['actions','image','title'])
                ->make();
        }
        return view('dashboard.welcomes.index');
    }

    public function create(){
        return view('dashboard.welcomes.create');
    }

    public function store(WelcomePageRequest $request){
        $data = $request->except('_token','image','title_ar','title_en','description_ar','description_en');
        if ($request->hasFile('image')) {
            $data['image'] = uploadImage($request->file('image'),'welcomePages');
        }
        $data['title'] = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $data['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];
        WelcomePage::query()->create($data);
        toastr()->success(__('general.add_toastr'));
        return redirect()->route('admin.welcomes.index');
    }


    public function edit($id){
        $welcome = WelcomePage::query()->find($id);
        if (!$welcome){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.welcomes.index');
        }
        return view('dashboard.welcomes.edit',compact('welcome'));
    }

    public function update($id,WelcomePageRequest $request){
        $welcome = WelcomePage::query()->find($id);
        $data = $request->except('_token','image','title_ar','title_en','description_ar','description_en');
        if (!$welcome){
            toastr()->error(__('general.error_toastr'));
            return redirect()->route('admin.welcomes.index');
        }
        if ($request->hasFile('image')){
            if($welcome->image != null){
                Storage::disk('public')->delete($welcome->image);
                $data['image'] = uploadImage($request->file('image'),'welcomePages');
            }else{
                $data['image'] = uploadImage($request->file('image'),'welcomePages');
            }
        }
        $data['title'] = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $data['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];
        $welcome->update($data);
        toastr()->success(__('general.update_toastr'));
        return redirect()->route('admin.welcomes.index');
    }

    public function destroy(Request $request){
        $welcome = WelcomePage::query()->find($request->id);
        if ($welcome->image != null){
            Storage::disk('public')->delete($welcome->image);
        }
        $welcome->delete();
        return response()->json(['success' => true]);
    }
}
