@extends('back_end.layouts.app')

@section('PageHead', 'Services Index')

@section('PageTitle', 'Services Index')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
@endsection

@section('actionTitle', 'Services Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Services Read')
                                <x-layouts.div-clearfix>
                                    @can('Services Create')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route('services.create') }}" button_icon="fa fa-add" button_name="Add" />
                                    @endcan {{-- Services Create End --}}
                                    @can('Services Import')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
                                            href="{{ route('services.import') }}" button_icon="fa fa-upload" button_name="Import" />
                                    @endcan {{-- Services Create End --}}
                                    @can('Services Settings')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm"
                                            href="" button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- Services Settings End --}}
                                    @can('Services Read')
                                        <x-form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Services Read --}}
                                </x-layouts.div-clearfix>
                                @can('Services Table')
                                    <table id="example1" class="table table-bordered table-striped"
                                        style="text-overflow: ellipsis; white-space: nowrap;">
                                        <thead>
                                            <tr>
                                                @can('Services Table')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Services Read Date')
                                                    <th>Date</th>
                                                @endcan
                                                @can('Services Read Job Number')
                                                    <th>Job Number</th>
                                                @endcan
                                                @can('Services Read Job Type')
                                                    <th>Job Type</th>
                                                @endcan
                                                @can('Services Read Customer Name')
                                                    <th>Customer Name</th>
                                                @endcan
                                                @can('Services Read Product Name')
                                                    <th>Product Name</th>
                                                @endcan
                                                @can('Services Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Services Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Services Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Services Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Services Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Services Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Services Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- ---- --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @can('Services Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Services Read Date')
                                                    <th>Date</th>
                                                @endcan
                                                @can('Services Read Job Number')
                                                    <th>Job Number</th>
                                                @endcan
                                                @can('Services Read Job Type')
                                                    <th>Job Type</th>
                                                @endcan
                                                @can('Services Read Customer Name')
                                                    <th>Customer Name</th>
                                                @endcan
                                                @can('Services Read Product Name')
                                                    <th>Product Name</th>
                                                @endcan
                                                @can('Services Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Services Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Services Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Services Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Services Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Services Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Services Delete')
                                                    <th>Delete</th>
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
                    $('.delete-customer').on('click', function() {
                        var customerID = $(this).data('customer_id');
                        var isReady = confirm("Are you sure delete customer");
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });
                        if (isReady) {
                            fetch("/admin/fixancare/masters/customers/destroy" +
                                customerID, {
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
                            toastr.error("Brand Deleting.....");
                        }

                    });
                },

                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('Services Table Export Excel')
                        'excel',
                    @endcan
                    @can('Services Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Services Table Print')
                        'print',
                    @endcan
                    @can('Services Table Copy')
                        'copy',
                    @endcan
                    @can('Services Table Column Visible')
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

                ajax: '{!! route('services.get') !!}',

                columns: [
                    @can('Services Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Read Date')
                        {
                            data: 'date',
                            name: 'date',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Read Job Number')
                        {
                            data: 'jobNumber',
                            name: 'jobNumber',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Read Job Type')
                        {
                            data: 'jobType',
                            name: 'jobType',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Read Customer Name')
                        {
                            data: 'customerName',
                            name: 'customerName',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Read Product Name')
                        {
                            data: 'productName',
                            name: 'productName',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Read Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Read Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Read Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Read Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Edit')
                        {
                            data: 'editLink',
                            name: 'editLink',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Services Delete')
                        {
                            data: 'deleteLink',
                            name: 'deleteLink',
                            defaultContent: ''
                        },
                    @endcan
                ]
            });
            // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
