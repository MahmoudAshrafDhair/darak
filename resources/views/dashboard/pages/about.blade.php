@extends('dashboard.layout.master')

@section('title')
    {{__('page.about_us')}}
@stop

@section('style')

@stop

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.dashboard')}}" class="text-muted">{{__('aside.dashboard')}}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('admin.pages.about_us')}}" class="text-muted">{{__('page.about_us')}}</a>
    </li>

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom ">
                <div class="card-header">
                    <h3 class="card-title">{{__('page.about_us')}}</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('admin.pages.about_us_update')}}"
                      enctype="multipart/form-data">

                    <div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>{{__('page.about_us_ar')}}</label>
                                <textarea class="summernote form-control" id="kt_summernote_1" name="about_us_ar">{{$setting->getTranslation('about_us','ar')}}</textarea>
                                @error('about_us_ar')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>{{__('page.about_us_en')}}</label>
                                <textarea class="summernote form-control" id="kt_summernote_1" name="about_us_en">{{$setting->getTranslation('about_us','en')}}</textarea>
                                @error('about_us_en')
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
                            <div class="col-lg-6 text-lg-right">
                                {{--                                <button type="reset" class="btn btn-danger">Delete</button>--}}
                            </div>
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
    <script src="{{asset('assets/js/pages/crud/forms/editors/summernote.js')}}"></script>
    <!--end::Page Scripts-->
@stop
