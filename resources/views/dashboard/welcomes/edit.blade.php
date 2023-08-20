@extends('dashboard.layout.master')

@section('title')
    {{__('welcome.edit')}}
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
        <a href="{{route('admin.welcomes.edit',$welcome->id)}}" class="text-muted">{{__('welcome.edit')}}</a>
    </li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">{{__('welcome.edit')}}</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('admin.welcomes.update',$welcome->id)}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$welcome->id}}">
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{__('general.image')}}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image"
                                           onchange="readURL(this);"/>
                                    <label class="custom-file-label"
                                           for="customFile">{{__('general.image')}}</label>
                                </div>
                                @error('image')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="offset-2"></div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <img id="blah" class="media-object img-thumbnail" width="150" height="150"
                                                                                  src="{{$welcome->image == null ? asset('assets/image/defoult.png') : asset('storage/'.$welcome->image)}}"
{{--                                         src="{{asset('assets/image/defoult.png')}}"--}}
                                         alt="Avatar">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{__('welcome.title_ar')}}</label>
                                <input type="text" class="form-control" name="title_ar"
                                       placeholder="{{__('welcome.title_ar')}}" value="{{$welcome->getTranslation('title', 'ar')}}"/>
                                @error('title_ar')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{{__('welcome.title_en')}}</label>
                                <input type="text" class="form-control" name="title_en"
                                       placeholder="{{__('welcome.title_en')}}" value="{{$welcome->getTranslation('title', 'en')}}"/>
                                @error('title_en')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{{__('welcome.description_ar')}}</label>
                                <textarea type="text" class="form-control" name="description_ar" cols="4" rows="4"
                                          placeholder="{{__('welcome.description_ar')}}">{{$welcome->getTranslation('description', 'ar')}}</textarea>
                                @error('description_ar')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{{__('welcome.description_en')}}</label>
                                <textarea type="text" class="form-control" name="description_en" cols="4" rows="4"
                                          placeholder="{{__('welcome.description_en')}}">{{$welcome->getTranslation('description', 'en')}}</textarea>
                                @error('description_en')
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
