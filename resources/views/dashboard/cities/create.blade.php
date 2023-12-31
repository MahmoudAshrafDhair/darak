@extends('dashboard.layout.master')

@section('title')
    {{__('city.add')}}
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
        <a href="{{route('admin.cities.create')}}" class="text-muted">{{__('city.add')}}</a>
    </li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">{{__('city.add')}}</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('admin.cities.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{__('city.name_ar')}}</label>
                                <input type="text" class="form-control" name="name_ar"
                                       placeholder="{{__('city.name_ar')}}" value="{{old('name_ar')}}"/>
                                @error('name_ar')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{{__('city.name_en')}}</label>
                                <input type="text" class="form-control" name="name_en"
                                       placeholder="{{__('city.name_en')}}" value="{{old('name_en')}}"/>
                                @error('name_en')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                    </div>


                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary mr-2">{{__('general.save')}}</button>
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

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').show();
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


@stop
