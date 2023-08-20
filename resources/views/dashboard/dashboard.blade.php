@extends('dashboard.layout.master')

@section('title')
{{__('aside.dashboard')}}
@stop

@section('style')

@stop

@section('breadcrumb')

@stop

@section('content')
    <div class="row">
        <div class="col-xl-3">
            <!--begin::Stats Widget 30-->
            <div class="card card-custom card-stretch gutter-b" style="background-color: #3B92D5">
                <!--begin::Body-->
                <div class="card-body">
                        <span class="svg-icon svg-icon-2x svg-icon-white">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                 height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none"
                                   fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path
                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path
                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    <span
                        class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$users}}</span>
                    <span class="font-weight-bold text-white font-size-sm">{{__('aside.user')}}</span>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 30-->
        </div>

        <div class="col-xl-3">
            {{--            bg-danger--}}
            <!--begin::Stats Widget 30-->
            <div class="card card-custom card-stretch gutter-b" style="background-color: #FFBA50">
                <!--begin::Body-->
                <div class="card-body">
                        <span class="svg-icon svg-icon-2x svg-icon-white">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                 height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none"
                                   fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path
                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path
                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    <span
                        class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$categories}}</span>
                    <span class="font-weight-bold text-white font-size-sm">{{__('aside.category')}}</span>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 30-->
        </div>

        <div class="col-xl-3">
            <!--begin::Stats Widget 30-->
            <div class="card card-custom card-stretch gutter-b" style="background-color: #3B92D5">
                <!--begin::Body-->
                <div class="card-body">
                        <span class="svg-icon svg-icon-2x svg-icon-white">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                 height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none"
                                   fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path
                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path
                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    <span
                        class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$cities}}</span>
                    <span class="font-weight-bold text-white font-size-sm">{{__('aside.city')}}</span>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 30-->
        </div>

        <div class="col-xl-3">
            <!--begin::Stats Widget 30-->
            <div class="card card-custom card-stretch gutter-b" style="background-color: #FFBA50">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Other1.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <circle fill="#000000" cx="12" cy="5" r="2"/>
                                            <circle fill="#000000" cx="12" cy="12" r="2"/>
                                            <circle fill="#000000" cx="12" cy="19" r="2"/>
                                        </g>
                        </svg><!--end::Svg Icon--></span>
                    <!--end::Svg Icon-->

                    <span
                        class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$regions}}</span>
                    <span class="font-weight-bold text-white font-size-sm">{{__('aside.region')}}</span>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 30-->
        </div>

        <div class="col-xl-3">
            <!--begin::Stats Widget 30-->
            <div class="card card-custom card-stretch gutter-b" style="background-color: #3B92D5">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Other1.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <circle fill="#000000" cx="12" cy="5" r="2"/>
                                            <circle fill="#000000" cx="12" cy="12" r="2"/>
                                            <circle fill="#000000" cx="12" cy="19" r="2"/>
                                        </g>
                        </svg><!--end::Svg Icon--></span>
                    <!--end::Svg Icon-->

                    <span
                        class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$reals}}</span>
                    <span class="font-weight-bold text-white font-size-sm">{{__('aside.real')}}</span>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 30-->
        </div>

        <div class="col-xl-3">
            <!--begin::Stats Widget 30-->
            <div class="card card-custom card-stretch gutter-b" style="background-color: #FFBA50">
                <!--begin::Body-->
                <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Files\Pictures1.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path
                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                fill="#000000" opacity="0.3"/>
                            <polygon fill="#000000" opacity="0.3" points="4 19 10 11 16 19"/>
                            <polygon fill="#000000" points="11 19 15 14 19 19"/>
                            <path
                                d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z"
                                fill="#000000" opacity="0.3"/>
                        </g>
                        </svg><!--end::Svg Icon--></span>
                    <span
                        class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$contacts}}</span>
                    <span class="font-weight-bold text-white font-size-sm">{{__('aside.contact')}}</span>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 30-->
        </div>

        <div class="col-xl-3">
            <!--begin::Stats Widget 30-->
            <div class="card card-custom card-stretch gutter-b" style="background-color: #3B92D5">
                <!--begin::Body-->
                <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Clipboard.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path
                                    d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                    fill="#000000" opacity="0.3"/>
                                <path
                                    d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                    fill="#000000"/>
                                <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
                            </g>
                            </svg><!--end::Svg Icon--></span>
                    <span
                        class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$sliders}}</span>
                    <span class="font-weight-bold text-white font-size-sm">{{__('aside.sliders')}}</span>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 30-->
        </div>


    </div>
@stop

@section('script')

@stop
