@extends('dashboard.layout.master')

@section('title')
    {{__('contact.show')}}
@stop

@section('style')

@stop

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.dashboard')}}" class="text-muted">{{__('aside.dashboard')}}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{route('admin.welcomes.index')}}" class="text-muted"> {{__('aside.welcome')}}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="{{route('admin.welcomes.show',$contact->id)}}" class="text-muted">{{__('welcome.show')}}</a>
    </li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">{{__('contact.show')}}</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{__('contact.name')}}</label>
                                <input type="text" class="form-control" name="title_ar"
                                       placeholder="{{__('contact.name')}}" disabled value="{{$contact->name}}"/>
                            </div>

                            <div class="col-lg-6">
                                <label>{{__('contact.email')}}</label>
                                <input type="text" class="form-control" name="title_en"
                                       placeholder="{{__('contact.email')}}" disabled value="{{$contact->email}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{__('contact.phone')}}</label>
                                <input type="text" class="form-control" name="title_en"
                                       placeholder="{{__('contact.phone')}}" disabled value="{{$contact->phone}}"/>
                            </div>

                            <div class="col-lg-6">
                                <label>{{__('contact.message')}}</label>
                                <textarea type="text" class="form-control" name="description_en" cols="4" rows="4"
                                          placeholder="{{__('contact.message')}}">{{$contact->message}}</textarea>

                            </div>
                        </div>



                    </div>


                    <div class="card-footer">
                        <div class="row">
{{--                            <div class="col-lg-6">--}}
{{--                                <button type="submit" class="btn btn-primary mr-2">{{__('general.save')}}</button>--}}
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
