@extends('dashboard.layout.master')

@section('title')
    {{__('category.edit')}}
@stop

@section('style')

@stop

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.dashboard')}}" class="text-muted">{{__('aside.dashboard')}}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{route('admin.categories.index')}}" class="text-muted"> {{__('aside.category')}}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{route('admin.categories.edit',$category->id)}}" class="text-muted">{{__('category.edit')}}</a>
    </li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">{{__('category.edit')}}</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('admin.categories.update',$category->id)}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$category->id}}">
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{__('category.name_ar')}}</label>
                                <input type="text" class="form-control" name="name_ar"
                                       placeholder="{{__('category.name_ar')}}" value="{{$category->getTranslation('name', 'ar')}}"/>
                                @error('name_ar')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{{__('category.name_en')}}</label>
                                <input type="text" class="form-control" name="name_en"
                                       placeholder="{{__('category.name_en')}}" value="{{$category->getTranslation('name', 'en')}}"/>
                                @error('name_en')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary mr-2">{{__('general.update')}}</button>
                                {{--                                <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                            </div>
                            {{--                            <div class="col-lg-6 text-lg-right">--}}
                            {{--                                <button type="reset" class="btn btn-danger">Delete</button>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>
@stop

@section('script')

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>
    <!--end::Page Scripts-->


@stop
