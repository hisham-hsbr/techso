@extends('back_end.layouts.app')

@section('PageHead', 'Stock Ledger')

@section('PageTitle', 'Stock Ledger')
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

@section('actionTitle', 'Stock Ledger')
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
                                            <form class="form-horizontal" id="quickForm"
                                                action="{{ route('inventories.stock.ledger.report') }}" method="GET">
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <label for="date" class="col-sm-2 col-form-label required">Date
                                                            Range</label>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="date_range" class="form-control float-right"
                                                            id="date_range" />
                                                        <div class="ml-2 pb-2">
                                                            <select class="form-control m-3" id="presetDateRanges">
                                                                <option value="custom">Custom Range</option>
                                                                <option value="as_on">As on</option>
                                                                <option value="last_month">Last Month</option>
                                                                <option value="last_week">Last Week</option>
                                                                <option value="six_months">Last Six Months</option>
                                                                <option value="one_year">Last Year</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group input-group mt-2">
                                                        <label for="product_id"
                                                            class="col-sm-2 col-form-label required">Product</label>
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
                                                    <div class="form-group input-group mt-2">
                                                        <label for="layout_id"
                                                            class="col-sm-2 col-form-label required">Layout</label>
                                                        <select class="form-control float-right select2" name="layout_id"
                                                            id="layout_id">
                                                            <option disabled selected>-- Select layout --</option>
                                                            <option value="layout_1">Plain</option>
                                                            <option value="layout_2">Option</option>
                                                            <option selected value="layout_3">Detail</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    @can('Service Create')
                                                        <button type="submit"
                                                            class="btn btn-primary float-right ml-1">Search</button>
                                                    @endcan
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

    <x-links.footer-link-jquery-validation />

    <script>
        $(function() {
            jQuery.validator.addMethod("noSpace", function(value, element) {
                return value.indexOf(" ") < 0 && value != "";
            });
            $('#quickForm').validate({
                rules: {
                    date_range: {
                        required: true,
                    },
                    product_id: {
                        required: true,
                    },
                    layout_id: {
                        required: true,
                    },
                },
                messages: {
                    date_range: {
                        required: "Please Select a date range",
                    },
                    product_id: {
                        required: "Please select a product",
                    },
                    layout_id: {
                        required: "Please select a layout",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize Select2
            $("#presetDateRanges").select2();

            // Initialize Daterangepicker
            $("#date_range").daterangepicker({
                    opens: "left",
                    autoUpdateInput: false,
                },
                function(start, end, label) {
                    $("#date_range").val(
                        start.format("YYYY-MM-DD") + " to " + end.format("YYYY-MM-DD")
                    );
                }
            );

            // Handle change event for Select2
            $("#presetDateRanges").on("change", function() {
                var option = $(this).val();
                var startDate, endDate;

                switch (option) {
                    case "last_month":
                        startDate = moment().subtract(1, "months").startOf("month");
                        endDate = moment().subtract(1, "months").endOf("month");
                        break;
                    case "last_week":
                        startDate = moment().subtract(1, "weeks").startOf("isoWeek");
                        endDate = moment().subtract(1, "weeks").endOf("isoWeek");
                        break;
                    case "six_months":
                        startDate = moment().subtract(6, "months").startOf("month");
                        endDate = moment();
                        break;
                    case "one_year":
                        startDate = moment().subtract(1, "years").startOf("year");
                        endDate = moment();
                        break;
                    case "as_on":
                        startDate = '01/01/2023';
                        endDate = moment();
                        break;
                    case "custom":
                        $("#date_range").val("");
                        return;
                }

                // Set the date range in the Daterangepicker
                $("#date_range").data("daterangepicker").setStartDate(startDate);
                $("#date_range").data("daterangepicker").setEndDate(endDate);
                $("#date_range").val(
                    startDate.format("YYYY-MM-DD") +
                    " to " +
                    endDate.format("YYYY-MM-DD")
                );
            });
        });
    </script>

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
