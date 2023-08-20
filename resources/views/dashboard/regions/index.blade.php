@extends('dashboard.layout.master')

@section('title')
    {{__('aside.region')}}
@stop

@section('style')
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@stop

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.dashboard')}}" class="text-muted">{{__('aside.dashboard')}}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('admin.regions.index')}}" class="text-muted">{{__('aside.region')}}</a>
    </li>
@stop

@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{__('region.title')}}
                {{--                    <span class="text-muted pt-2 font-size-sm d-block">Javascript array as data source</span></h3>--}}
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{route('admin.regions.create')}}" class="btn btn-info font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<i class="fa fa-plus"></i>
											</span>{{__('region.add')}}</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin::Search Form-->
            <div class="mb-5">
                <form class="row align-items-center">
                    <div class="col-lg-4 col-xl-3">
                        <div class="row align-items-center">
                            <div class="col-md-10 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="{{__('general.search_name')}}" name="s_name" id="s_name" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>

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
                    <th>{{__('region.name')}}</th>
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
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
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
                var url = '{{route('admin.regions.destroy')}}';
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
                        url: '{{ route('admin.regions.index') }}',
                        data: function (d) {
                            d.s_name = $("#s_name").val();
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
                    ],
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'name', name: 'name'},
                        {data: 'actions', name: 'actions'}
                    ],
                });

                $('#kt_search').click(function(e){
                    e.preventDefault();
                   // table.draw()
                    $('#data-table').DataTable().draw(true);
                });
            });

        });
    </script>
@stop
