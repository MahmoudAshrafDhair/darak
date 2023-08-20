@extends('dashboard.layout.master')

@section('title')
    {{__('city.edit')}}
@stop

@section('style')

@stop

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.dashboard')}}" class="text-muted">{{__('aside.dashboard')}}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{route('admin.cities.index')}}" class="text-muted"> {{__('aside.city')}}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{route('admin.cities.edit',$city->id)}}" class="text-muted">{{__('city.edit')}}</a>
    </li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">{{__('city.edit')}}</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('admin.cities.update',$city->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{__('city.name_ar')}}</label>
                                <input type="text" class="form-control" name="name_ar"
                                       placeholder="{{__('city.name_ar')}}" value="{{$city->getTranslation('name', 'ar')}}"/>
                                @error('name_ar')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{{__('city.name_en')}}</label>
                                <input type="text" class="form-control" name="name_en"
                                       placeholder="{{__('city.name_en')}}" value="{{$city->getTranslation('name', 'en')}}"/>
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

@stop
