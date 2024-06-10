@extends('back_end.layouts.app')

@section('PageHead')
    {{ $head_name }} Index
@endsection

@section('PageTitle')
    {{ $head_name }} Index
@endsection

@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
@endsection

@section('actionTitle')
    {{ $head_name }} Index
@endsection
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Sale Register Read')
                                <x-layouts.div-clearfix>
                                    @can('Sale Register Notification')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route('services.create.notification') }}" button_icon="fa-solid fa-paper-plane"
                                            button_name="Send Notify" />
                                    @endcan
                                    @can('Sale Register Create')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route($route_name . '.create') }}" button_icon="fa fa-add" button_name="Add" />
                                    @endcan {{-- Services Create End --}}
                                    @can('Sale Register Import')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
                                            href="{{ route('services.import') }}" button_icon="fa fa-upload" button_name="Import" />
                                    @endcan {{-- Services Create End --}}
                                    @can('Sale Register Settings')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm"
                                            href="" button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- Services Settings End --}}
                                    @can('Sale Register Read')
                                        <x-form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Services Read --}}
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
                                                        <select data-column="9" class="form-control select2 filter-select">
                                                            <option value="">Select Pending/Delivered</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="delivered">Delivered</option>
                                                        </select>
                                                    </div>
                                                @endcan
                                                {{-- @can('Mobile Service Read Contact Number')
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
                                                            placeholder="Search Contact Name" data-column="4" />
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
                                                                <option value="{{ $job_type->name }}">{{ $job_type->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endcan
                                                @can('Mobile Service Read Mobile Model')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Mobile Model</label>
                                                        <select data-column="7" class="form-control select2 filter-select">
                                                            <option value="">Select Mobile Model</option>
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->name }}">{{ $product->name }}
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
                                                            @foreach ($complaints as $complaint)
                                                                <option value="{{ $complaint->name }}">
                                                                    {{ $complaint->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endcan --}}
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>

                                    @can('Sale Register Table')
                                        <table id="example1" class="table table-bordered table-striped"
                                            style="text-overflow: ellipsis; white-space: nowrap;">
                                            <thead>
                                                <tr>
                                                    @can('Sale Register Read')
                                                        <th>Sn</th>
                                                    @endcan
                                                    @can('Sale Register Read Action')
                                                        <th>Action</th>
                                                    @endcan
                                                    @can('Sale Register Read Date')
                                                        <th>Date</th>
                                                    @endcan
                                                    @can('Sale Register Read Sale Number')
                                                        <th>Sale Number</th>
                                                    @endcan
                                                    @can('Sale Register Read Customer Name')
                                                        <th>Customer Name</th>
                                                    @endcan
                                                    @can('Sale Register Read Status')
                                                        <th>Status</th>
                                                    @endcan
                                                    @can('Sale Register Read Created At')
                                                        <th>Created At</th>
                                                    @endcan
                                                    @can('Sale Register Read Updated At')
                                                        <th>Updated At</th>
                                                    @endcan
                                                    @can('Sale Register Read Created By')
                                                        <th>Created By</th>
                                                    @endcan
                                                    @can('Sale Register Read Updated By')
                                                        <th>Updated By</th>
                                                    @endcan
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- ---- --}}
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    @can('Sale Register Read')
                                                        <th>Sn</th>
                                                    @endcan
                                                    @can('Sale Register Read Action')
                                                        <th>Action</th>
                                                    @endcan
                                                    @can('Sale Register Read Date')
                                                        <th>Date</th>
                                                    @endcan
                                                    @can('Sale Register Read Sale Number')
                                                        <th>Sale Number</th>
                                                    @endcan
                                                    @can('Sale Register Read Customer Name')
                                                        <th>Customer Name</th>
                                                    @endcan
                                                    @can('Sale Register Read Status')
                                                        <th>Status</th>
                                                    @endcan
                                                    @can('Sale Register Read Created At')
                                                        <th>Created At</th>
                                                    @endcan
                                                    @can('Sale Register Read Updated At')
                                                        <th>Updated At</th>
                                                    @endcan
                                                    @can('Sale Register Read Created By')
                                                        <th>Created By</th>
                                                    @endcan
                                                    @can('Sale Register Read Updated By')
                                                        <th>Updated By</th>
                                                    @endcan
                                                </tr>
                                            </tfoot>
                                        </table>
                                        @endcan{{-- Services Table end --}}
                                    @endcan {{-- Services Read end --}}
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

    <x-links.footer-links-dataTable />

    <script>
        $(function() {
            var table = $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "processing": true,


                dom: '<"html5buttons"B>lTftigp',
                "fnDrawCallback": function(oSettings) {
                    $('.delete-service').on('click', function() {
                        var serviceID = $(this).data('service_id');
                        var isReady = confirm("Are you sure delete service");
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });
                        if (isReady) {
                            fetch("/admin/techso/sales/destroy" +
                                serviceID, {
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
                            toastr.error("Sale Deleting.....");
                        }

                    });
                },

                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('Sale Register Table Export Excel')
                        'excel',
                    @endcan
                    @can('Sale Register Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Sale Register Table Print')
                        'print',
                    @endcan
                    @can('Sale Register Table Copy')
                        'copy',
                    @endcan
                    @can('Sale Register Table Column Visible')
                        'colvis',
                    @endcan
                ],
                select: true,
                scrollY: '80vh',
                scrollX: true,
                scrollCollapse: true,

                pagingType: "full_numbers",
                processing: true,
                serverSide: true,

                ajax: '{!! route('sales-registers.get') !!}',
                // <--- colum serial number order with id
                "columnDefs": [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                "order": [
                    [2, 'dec']
                ],
                // colum serial number order with id --->

                columns: [
                    @can('Sale Register Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Sale Register Read Action')
                        {
                            data: 'action',
                            name: 'action',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Sale Register Read Date')
                        {
                            data: 'date',
                            name: 'date',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Sale Register Read Sale Number')
                        {
                            data: 'saleNumber',
                            name: 'saleNumber',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Sale Register Read Customer Name')
                        {
                            data: 'customerName',
                            name: 'customerName',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Sale Register Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Sale Register Read Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Sale Register Read Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Sale Register Read Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Sale Register Read Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
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
        });
    </script>

@endsection
