@extends('dashboard.layout.master')

@section('title')
    {{__('category.add')}}
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
        <a href="{{route('admin.categories.create')}}" class="text-muted">{{__('category.add')}}</a>
    </li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">{{__('category.add')}}</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{__('category.name_ar')}}</label>
                                <input type="text" class="form-control" name="name_ar"
                                       placeholder="{{__('category.name_ar')}}" value="{{old('name_ar')}}"/>
                                @error('name_ar')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{{__('category.name_en')}}</label>
                                <input type="text" class="form-control" name="name_en"
                                       placeholder="{{__('category.name_en')}}" value="{{old('name_en')}}"/>
                                @error('name_en')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


{{--                        <div class="form-group row">--}}
{{--                            <div class="col-lg-6">--}}
{{--                                <label>{{__('general.image')}}</label>--}}
{{--                                <div class="custom-file">--}}
{{--                                    <input type="file" class="custom-file-input" id="customFile" name="image"--}}
{{--                                           onchange="readURL(this);"/>--}}
{{--                                    <label class="custom-file-label"--}}
{{--                                           for="customFile">{{__('general.image')}}</label>--}}
{{--                                </div>--}}
{{--                                @error('image')--}}
{{--                                <span class="form-text text-danger">{{$message}}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="offset-2"></div>--}}

{{--                            <div class="col-md-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <img id="blah" class="media-object img-thumbnail" width="150" height="150"--}}
{{--                                         --}}{{--                                         src="{{$setting->who_are_we_image == null ? asset('assets/image/defoult.png') : asset('storage/'.$setting->who_are_we_image)}}"--}}
{{--                                         src="{{asset('assets/image/defoult.png')}}"--}}
{{--                                         alt="Avatar">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}



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
