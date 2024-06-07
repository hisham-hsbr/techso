@extends('back_end.layouts.app')

@section('PageHead', 'Stock Ledger Report')

@section('PageTitle', 'Stock Ledger Report')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
    <x-links.header-links-select-two />
    <!-- date-range-picker -->
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">

@endsection

@section('actionTitle', 'Stock Ledger Report')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Job Type Read')
                                <x-layouts.div-clearfix>
                                    @can('Job Type Create')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route('job-types.create') }}" button_icon="fa fa-add" button_name="Add" />
                                    @endcan {{-- Job Type Create End --}}
                                    @can('Job Type Import')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
                                            href="{{ route('job-types.import') }}" button_icon="fa fa-upload"
                                            button_name="Import" />
                                    @endcan {{-- Job Type Create End --}}
                                    @can('Job Type Settings')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm"
                                            href="" button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- Job Type Settings End --}}
                                    @can('Job Type Table')
                                        <x-form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Job Type Table --}}
                                </x-layouts.div-clearfix>
                                <div class="row mt-2">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card card-info">

                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form class="form-horizontal"
                                                action="{{ route('inventories.stock.ledger.report') }}" method="GET">
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <label for="date" class="col-sm-2 col-form-label">Date Range</label>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="date_range" class="form-control float-right"
                                                            id="date_range" />
                                                    </div>
                                                    <div class="input-group mt-2">
                                                        <label for="product_id" class="col-sm-2 col-form-label">Product</label>
                                                        <select class="form-control float-right select2" name="product_id"
                                                            id="product_id">
                                                            <option disabled selected>-- Select Product --</option>
                                                            @foreach ($products as $product)
                                                                <option
                                                                    {{ old('product_id') == $product->id ? 'selected' : '' }}
                                                                    value="{{ $product->id }}">
                                                                    {{ $product->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-group mt-2">
                                                        <label for="layout_id" class="col-sm-2 col-form-label">Layout</label>
                                                        <select class="form-control float-right select2" name="layout_id"
                                                            id="layout_id">
                                                            <option disabled selected>-- Select layout --</option>
                                                            <option value="layout_1">Plain</option>
                                                            <option value="layout_2">Option</option>
                                                            <option selected value="layout_3">Detail</option>
                                                            {{-- @foreach ($products as $product)
                                                                <option
                                                                    {{ old('product_id') == $product->id ? 'selected' : '' }}
                                                                    value="{{ $product->id }}">
                                                                    {{ $product->name }}
                                                                </option>
                                                            @endforeach --}}
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    @can('Service Create')
                                                        <button type="submit"
                                                            class="btn btn-primary float-right ml-1">Search</button>
                                                    @endcan
                                                    <a type="button" href="{{ route('services.index') }}"
                                                        class="btn btn-warning float-right ml-1">Back</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')


    <x-message.message />
    <x-message.table-update />
    <x-links.footer-link-select-two />

    <x-links.footer-links-dataTable />

    <!-- date-range-picker -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(function() {
            var table = $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "processing": true,

                // "paging": true,
                // "searching": false,
                // "ordering": true,
                // "info": true,

                // dom: 'Bfrtip',
                dom: '<"html5buttons"B>lTftigp',
                "fnDrawCallback": function(oSettings) {
                    $('.delete-job_type').on('click', function() {
                        var jobTypeID = $(this).data('job_type_id');
                        var isReady = confirm("Are you sure delete Job type");
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });
                        if (isReady) {
                            fetch("/admin/techso/masters/job-types/destroy" +
                                jobTypeID, {
                                    method: 'DELETE',
                                    headers: myHeaders,
                                }).then(function(response) {
                                return response.json();
                            });
                            $('#example1').DataTable().ajax.reload();
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-center",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "3000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };
                            toastr.error("Job Type Deleting.....");
                        }

                    });
                },

                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('Job Type Table Export Excel')
                        'excel',
                    @endcan
                    @can('Job Type Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Job Type Table Print')
                        'print',
                    @endcan
                    @can('Job Type Table Copy')
                        'copy',
                    @endcan
                    @can('Job Type Table Column Visible')
                        'colvis',
                    @endcan
                ],
                select: true,
                scrollY: '80vh',
                scrollX: true,
                scrollCollapse: true,
                // lengthMenu: [
                //     [10, 25, 50, 100, 10, 25, 50, 100, 10, 25, 50, 100],
                //     // [10, 25, 50, 100, "All"]
                // ],
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,

                ajax: '{!! route('job-types.get') !!}',
                // <--- colum serial number order with id
                "columnDefs": [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                "order": [
                    [1, 'asc']
                ],
                // colum serial number order with id --->
                columns: [
                    @can('Job Type Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Job Type Read Code')
                        {
                            data: 'code',
                            name: 'code',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Job Type Read Code')
                        {
                            data: 'name',
                            name: 'name',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Job Type Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Job Type Read Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Job Type Read Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Job Type Read Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            width: '100%',
                            defaultContent: '',
                        },
                    @endcan
                    @can('Job Type Read Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Job Type Edit')
                        {
                            data: 'editLink',
                            name: 'editLink',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Job Type Delete')
                        {
                            data: 'deleteLink',
                            name: 'deleteLink',
                            defaultContent: ''
                        },
                    @endcan
                ]
            });
            // <--- colum serial number order with id
            table.on('order.dt search.dt', function() {
                    let i = 1;

                    table
                        .cells(null, 0, {
                            search: 'applied',
                            order: 'applied'
                        })
                        .every(function(cell) {
                            this.data(i++);
                        });
                })
                .draw();
            // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('.filter-input').keyup(function() {
                $('#example1').DataTable().column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            });

            $('.filter-select').change(function() {
                $('#example1').DataTable().column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            });


        });
    </script>

    <script>
        $(function() {

            //Date range picker
            $("#date_range").daterangepicker();

        });
    </script>


@endsection
