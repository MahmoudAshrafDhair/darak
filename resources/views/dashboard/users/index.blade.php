@extends('dashboard.layout.master')

@section('title')
    {{__('aside.user')}}
@stop

@section('style')
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.dashboard')}}" class="text-muted">{{__('aside.dashboard')}}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('admin.users.index')}}" class="text-muted">{{__('aside.user')}}</a>
    </li>
@stop

@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{__('user.title')}}
                {{--                    <span class="text-muted pt-2 font-size-sm d-block">Javascript array as data source</span></h3>--}}
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{route('admin.users.create')}}" class="btn btn-info font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<i class="fa fa-plus"></i>
											</span>{{__('user.add')}}</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin::Search Form-->
            <div class="mb-5">
                <form class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="{{__('general.search_username')}}" name="s_username" id="s_username" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="{{__('general.search_email')}}" name="s_email" id="s_email" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="{{__('general.search_phone')}}" name="s_phone" id="s_phone" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
{{--                            <div class="col-md-4 my-2 my-md-0">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>--}}
{{--                                    <select class="form-control" id="kt_datatable_search_status_2">--}}
{{--                                        <option value="">All</option>--}}
{{--                                        <option value="1">Pending</option>--}}
{{--                                        <option value="2">Delivered</option>--}}
{{--                                        <option value="3">Canceled</option>--}}
{{--                                        <option value="4">Success</option>--}}
{{--                                        <option value="5">Info</option>--}}
{{--                                        <option value="6">Danger</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4 my-2 my-md-0">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>--}}
{{--                                    <select class="form-control" id="kt_datatable_search_type_2">--}}
{{--                                        <option value="">All</option>--}}
{{--                                        <option value="1">Online</option>--}}
{{--                                        <option value="2">Retail</option>--}}
{{--                                        <option value="3">Direct</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <button type="submit" class="btn btn-light-primary px-6 font-weight-bold" id="kt_search">{{__('general.search')}}</button>
                    </div>
                </form>
            </div>
            <!--end::Search Form-->

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="data-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('general.image')}}</th>
                    <th>{{__('user.username')}}</th>
                    <th>{{__('user.full_name')}}</th>
                    <th>{{__('user.phone')}}</th>
                    <th>{{__('user.email')}}</th>
                    <th>{{__('general.action')}}</th>
                </tr>
                </thead>
            </table>

            <!--end: Datatable -->

        </div>
    </div>
    <!--end::Card-->

    <!-- Modal -->
    <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('general.delete')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <h5>{{__('general.delete_message')}}</h5>
                    <form method="post" action="">
                        @csrf
                        <input type="hidden" id="id_item" name="id_item">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('general.cancel')}}</button>
                    <button type="button"  class="delete btn btn-danger">{{__('general.delete')}}</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {

            $(document).on('click', '.delete-item', (function () {
                var id = $(this).data("id");
                $('.modal-body #id_item').val(id);
            }));


            $('.delete').click(function (e) {
                e.preventDefault();
                var id = $('#id_item').val();
                var token = $('#id_item').prev().val();
                var url = '{{route('admin.users.destroy')}}';
                var type = "post";
                $.ajax({
                    type: type,
                    url: url,
                    data: {
                        'id': id,
                        '_token': token
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.success === true) {
                            $('#deleteModel').css('display','none');
                            $('.modal-backdrop').css('display','none');
                            @if(app()->getLocale() == 'ar')
                            toastr.success('تمت عملية الحذف بنجاح');
                            @else
                            toastr.success('Deleted Successfully');
                            @endif
                            $('#data-table').DataTable().ajax.reload();
                        }
                    },
                    error: function (data) {

                    }
                });
            });


            $(function () {
                $('#data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ordering: true,
                    searching: false,
                    dom: 'lBfrtip',
                    // buttons: [
                    //     'excel'
                    // ],

                    @if(app()->getLocale() == 'ar')
                    language: {
                        url: "http://cdn.datatables.net/plug-ins/1.10.21/i18n/Arabic.json"
                    },
                    @endif
                    ajax: {
                        url: '{{ route('admin.users.index') }}',
                        data: function (d) {
                            d.s_username = $("#s_username").val();
                            d.s_email = $("#s_email").val();
                            d.s_phone = $("#s_phone").val();
                        }
                    },
                    columnDefs: [
                        {
                            "targets": 0, // your case first column
                            "className": "text-center",
                        },
                        {
                            "targets": 1, // your case first column
                            "className": "text-center",
                        },
                        {
                            "targets": 2, // your case first column
                            "className": "text-center",
                        },
                        {
                            "targets": 3, // your case first column
                            "className": "text-center",
                        },
                        {
                            "targets": 4, // your case first column
                            "className": "text-center",
                        },
                        {
                            "targets": 5, // your case first column
                            "className": "text-center",
                        },
                        {
                            "targets": 6, // your case first column
                            "className": "text-center",
                        },
                    ],
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'image', name: 'image'},
                        {data: 'username', name: 'username'},
                        {data: 'full_name', name: 'full_name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'email', name: 'email'},
                        {data: 'actions', name: 'actions'}
                    ],
                });

                $('#kt_search').click(function(e){
                    e.preventDefault();
                    console.log("test");
                   // table.draw()
                     $('#data-table').DataTable().draw(true);
                });
            });

        });
    </script>
@stop
