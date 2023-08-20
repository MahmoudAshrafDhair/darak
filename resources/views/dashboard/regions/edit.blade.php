@extends('dashboard.layout.master')

@section('title')
    {{__('region.edit')}}
@stop

@section('style')

@stop

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.dashboard')}}" class="text-muted">{{__('aside.dashboard')}}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{route('admin.regions.index')}}" class="text-muted"> {{__('aside.region')}}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{route('admin.regions.edit',$region->id)}}" class="text-muted">{{__('region.edit')}}</a>
    </li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">{{__('region.edit')}}</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('admin.regions.update',$region->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{__('city.name_ar')}}</label>
                                <input type="text" class="form-control" name="name_ar"
                                       placeholder="{{__('city.name_ar')}}" value="{{$region->getTranslation('name', 'ar')}}"/>
                                @error('name_ar')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{{__('city.name_en')}}</label>
                                <input type="text" class="form-control" name="name_en"
                                       placeholder="{{__('city.name_en')}}" value="{{$region->getTranslation('name', 'en')}}"/>
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

@stop
