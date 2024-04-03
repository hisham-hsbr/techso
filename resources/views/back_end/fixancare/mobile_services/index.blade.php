@extends('back_end.layouts.app')

@section('PageHead', 'Mobile Services Index')

@section('PageTitle', 'Mobile Services Index')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('mobile-services.index') }}">Mobile Services</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
    <x-links.header-links-select-two />
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('back_end_links/adminLinks/plugins/daterangepicker/daterangepicker.css') }}">
@endsection

@section('actionTitle', 'Mobile Services Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Mobile Service Read')
                                <x-layouts.div-clearfix>
                                    @can('Mobile Service Create')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route('mobile-services.create') }}" button_icon="fa fa-add"
                                            button_name="Add" />
                                    @endcan {{-- Mobile Service Create End --}}
                                    @can('Mobile Service Import')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
                                            href="{{ route('mobile-services.import') }}" button_icon="fa fa-upload"
                                            button_name="Import" />
                                    @endcan {{-- Mobile Service Create End --}}
                                    @can('Mobile Service Settings')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm"
                                            href="" button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- Mobile Service Settings End --}}
                                    @can('Mobile Service Table')
                                        <x-form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Mobile Service Table --}}
                                </x-layouts.div-clearfix>


                                <div class="col-md-12">
                                    <div class="card card-success collapsed-card">
                                        <div class="card-header">

                                            <h3 class="card-title"><i class="fa-solid fa-filter"></i> Filter</h3>
                                            <div class="card-tools">
                                                {{-- <x-form.button button_type="" button_oneclick="Refresh()"
                                                    button_class="btn btn-success btn-sm"
                                                    button_icon="fa-solid fa-filter-circle-xmark" button_name="Refresh" /> --}}
                                                <button type="" class="btn btn-tool" onClick="Reset()"><i
                                                        class="fa-solid fa-filter-circle-xmark"></i> Reset
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                        class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div id="myFilter" class="row">
                                                @can('Mobile Service Read Job Status')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Pending/Delivered</label>
                                                        <select data-column="5" class="form-control select2 filter-select">
                                                            <option value="">Select Pending/Delivered</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="delivered">Delivered</option>
                                                        </select>
                                                    </div>
                                                @endcan
                                                @can('Mobile Service Read Contact Number')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Contact Number</label>
                                                        <input type="text" class="form-control filter-input" id="contact_number"
                                                            placeholder="Search Contact Number" data-column="12" />
                                                    </div>
                                                @endcan
                                                @can('Mobile Service Read Contact Name')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Contact Name</label>
                                                        <input type="text" class="form-control filter-input" id="contact_name"
                                                            placeholder="Search Contact Name" data-column="6" />
                                                    </div>
                                                @endcan
                                                @can('Mobile Service Read Job Number')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Job number</label>
                                                        <select data-column="2" class="form-control select2 filter-select"
                                                            id="job_number">
                                                            <option value="">Select Job number</option>
                                                            @foreach ($job_number as $job_number)
                                                                <option value="{{ $job_number }}">F-{{ $job_number }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endcan
                                                @can('Mobile Service Read Job Type')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Job type</label>
                                                        <select data-column="3" class="form-control select2 filter-select">
                                                            <option value="">Select Job Type</option>
                                                            @foreach ($job_types as $job_type)
                                                                <option value="{{ $job_type->name }}">{{ $job_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endcan
                                                @can('Mobile Service Read Mobile Model')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Mobile Model</label>
                                                        <select data-column="7" class="form-control select2 filter-select">
                                                            <option value="">Select Mobile Model</option>
                                                            @foreach ($mobile_models as $mobile_model)
                                                                <option value="{{ $mobile_model->name }}">{{ $mobile_model->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endcan
                                                @can('Mobile Service Read Job Status')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Job Status</label>
                                                        <select data-column="5" class="form-control select2 filter-select">
                                                            <option value="">Select Job Status</option>
                                                            @foreach ($job_statuses as $job_status)
                                                                <option value="{{ $job_status->name }}">{{ $job_status->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endcan
                                                @can('Mobile Service Read Work Status')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Work Status</label>
                                                        <select data-column="4" class="form-control select2 filter-select">
                                                            <option value="">Select Work Status</option>
                                                            @foreach ($work_statuses as $work_status)
                                                                <option value="{{ $work_status->name }}">{{ $work_status->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endcan
                                                @can('Mobile Service Read Mobile Complaint')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Mobile Complaint</label>
                                                        <select data-column="8" class="form-control select2 filter-select">
                                                            <option value="">Select Mobile Complaint</option>
                                                            @foreach ($mobile_complaints as $mobile_complaint)
                                                                <option value="{{ $mobile_complaint->name }}">
                                                                    {{ $mobile_complaint->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endcan
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>





                                @can('Mobile Service Read')
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @can('Mobile Service Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Mobile Service Read Date')
                                                    <th>Date</th>
                                                @endcan
                                                @can('Mobile Service Read Job Number')
                                                    <th>Job Number</th>
                                                @endcan
                                                @can('Mobile Service Read Job Type')
                                                    <th>Job Type</th>
                                                @endcan
                                                @can('Mobile Service Read Work Status')
                                                    <th>Work Status</th>
                                                @endcan
                                                @can('Mobile Service Read Job Status')
                                                    <th>Job Status</th>
                                                @endcan
                                                @can('Mobile Service Read Contact Name')
                                                    <th>Contact Name</th>
                                                @endcan
                                                @can('Mobile Service Read Mobile Model')
                                                    <th>Mobile Model</th>
                                                @endcan
                                                @can('Mobile Service Read Mobile Complaint')
                                                    <th>Mobile Complaint</th>
                                                @endcan
                                                @can('Mobile Service Read Complaint Details')
                                                    <th>Complaint Details</th>
                                                @endcan
                                                @can('Mobile Service Read Work Details')
                                                    <th>Work Details</th>
                                                @endcan
                                                @can('Mobile Service Read Delivered At')
                                                    <th>Delivered At</th>
                                                @endcan
                                                @can('Mobile Service Read Contact Number')
                                                    <th>Contact Number</th>
                                                @endcan
                                                @can('Mobile Service Read Contact Address')
                                                    <th>Contact Address</th>
                                                @endcan
                                                @can('Mobile Service Read IMEI')
                                                    <th>IMEI</th>
                                                @endcan
                                                @can('Mobile Service Read Lock')
                                                    <th>Lock</th>
                                                @endcan
                                                @can('Mobile Service Read Payment')
                                                    <th>Payment</th>
                                                @endcan
                                                @can('Mobile Service Read Advance')
                                                    <th>Advance</th>
                                                @endcan
                                                @can('Mobile Service Read Balance')
                                                    <th>Balance</th>
                                                @endcan
                                                @can('Mobile Service Read Description')
                                                    <th>Description</th>
                                                @endcan
                                                @can('Mobile Service Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Mobile Service Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Mobile Service Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Mobile Service Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Mobile Service Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Mobile Service Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Mobile Service PDF')
                                                    <th>PDF</th>
                                                @endcan
                                                @can('Mobile Service Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- ---- --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @can('Mobile Service Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Mobile Service Read Date')
                                                    <th>Date</th>
                                                @endcan
                                                @can('Mobile Service Read Job Number')
                                                    <th>Job Number</th>
                                                @endcan
                                                @can('Mobile Service Read Job Type')
                                                    <th>Job Type</th>
                                                @endcan
                                                @can('Mobile Service Read Work Status')
                                                    <th>Work Status</th>
                                                @endcan
                                                @can('Mobile Service Read Job Status')
                                                    <th>Job Status</th>
                                                @endcan
                                                @can('Mobile Service Read Contact Name')
                                                    <th>Contact Name</th>
                                                @endcan
                                                @can('Mobile Service Read Mobile Model')
                                                    <th>Mobile Model</th>
                                                @endcan
                                                @can('Mobile Service Read Mobile Complaint')
                                                    <th>Mobile Complaint</th>
                                                @endcan
                                                @can('Mobile Service Read Complaint Details')
                                                    <th>Complaint Details</th>
                                                @endcan
                                                @can('Mobile Service Read Work Details')
                                                    <th>Work Details</th>
                                                @endcan
                                                @can('Mobile Service Read Delivered At')
                                                    <th>Delivered At</th>
                                                @endcan
                                                @can('Mobile Service Read Contact Number')
                                                    <th>Contact Number</th>
                                                @endcan
                                                @can('Mobile Service Read Contact Address')
                                                    <th>Contact Address</th>
                                                @endcan
                                                @can('Mobile Service Read IMEI')
                                                    <th>IMEI</th>
                                                @endcan
                                                @can('Mobile Service Read Lock')
                                                    <th>Lock</th>
                                                @endcan
                                                @can('Mobile Service Read Payment')
                                                    <th>Payment</th>
                                                @endcan
                                                @can('Mobile Service Read Advance')
                                                    <th>Advance</th>
                                                @endcan
                                                @can('Mobile Service Read Balance')
                                                    <th>Balance</th>
                                                @endcan
                                                @can('Mobile Service Read Description')
                                                    <th>Description</th>
                                                @endcan
                                                @can('Mobile Service Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Mobile Service Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Mobile Service Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Mobile Service Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Mobile Service Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Mobile Service Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Mobile Service PDF')
                                                    <th>PDF</th>
                                                @endcan
                                                @can('Mobile Service Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @endcan{{-- Mobile Service Table end --}}
                                @endcan {{-- Mobile Service Read end --}}
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

    {{-- filter reset --}}
    <script>
        function Reset() {
            $('#contact_number').val("");
            $('#contact_name').val("");
            $('#job_number').val("");
        }
    </script>

    <x-links.footer-links-dataTable />

    <!-- date-range-picker -->
    <script src="{{ asset('back_end_links/adminLinks/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script>
        $(function() {
            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
        })
        $(function() {
            $("#example1").DataTable({
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
                    $('.delete-priceLists').on('click', function() {
                        var priceListsID = $(this).data('priceLists_id');
                        var isReady = confirm("Are you sure" + priceListsID);
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });
                        if (isReady) {
                            fetch("/admin/users-management/mobile-services/" +
                                priceListsID, {
                                    method: 'DELETE',
                                    headers: myHeaders,
                                }).then(function(response) {
                                return response.json();
                            });
                            $('#example1').DataTable().ajax.reload();
                        }

                    });
                },


                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('Mobile Service Table Export Excel')
                        'excel',
                    @endcan
                    @can('Mobile Service Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Mobile Service Table Print')
                        'print',
                    @endcan
                    @can('Mobile Service Table Copy')
                        'copy',
                    @endcan
                    @can('Mobile Service Table Column Visible')
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

                ajax: '{!! route('mobile-services.get') !!}',

                columns: [
                    @can('Mobile Service Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Date')
                        {
                            data: 'date',
                            name: 'date',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Job Number')
                        {
                            data: 'jobNumber',
                            name: 'jobNumber',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Job Type')
                        {
                            data: 'jobType',
                            name: 'jobType',
                            // "searchable": false,
                            "defaultContent": ""
                        },
                    @endcan
                    @can('Mobile Service Read Work Status')
                        {
                            data: 'workStatus',
                            name: 'workStatus',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Job Status')
                        {
                            data: 'jobStatus',
                            name: 'jobStatus',
                            width: '200%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Contact Name')
                        {
                            data: 'contact_name',
                            name: 'contact_name',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Mobile Model')
                        {
                            data: 'mobileModel',
                            name: 'mobileModel',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Mobile Complaint')
                        {
                            data: 'mobileComplaint',
                            name: 'mobileComplaint',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Complaint Details')
                        {
                            data: 'complaint_details',
                            name: 'complaint_details',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Work Details')
                        {
                            data: 'work_details',
                            name: 'work_details',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Delivered At')
                        {
                            data: 'delivered_at',
                            name: 'delivered_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Contact Number')
                        {
                            data: 'contact_number',
                            name: 'contact_number',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Contact Address')
                        {
                            data: 'contact_address',
                            name: 'contact_address',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read IMEI')
                        {
                            data: 'imei',
                            name: 'imei',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Lock')
                        {
                            data: 'lock',
                            name: 'lock',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Payment')
                        {
                            data: 'payment',
                            name: 'payment',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Advance')
                        {
                            data: 'advance',
                            name: 'advance',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Balance')
                        {
                            data: 'balance',
                            name: 'balance',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Description')
                        {
                            data: 'description',
                            name: 'description',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Read Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Edit')
                        {
                            data: 'editLink',
                            name: 'editLink',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service PDF')
                        {
                            data: 'pdfLink',
                            name: 'pdfLink',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Service Delete')
                        {
                            data: 'deleteLink',
                            name: 'deleteLink',
                            defaultContent: ''
                        },
                    @endcan
                ]
            });
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



@endsection
