@extends('back_end.layouts.app')

@section('PageHead', 'Mobile Complaint Index')

@section('PageTitle', 'Mobile Complaint Index')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('mobile-complaints.index') }}">Mobile Complaint</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
@endsection

@section('actionTitle', 'Mobile Complaint Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Mobile Complaint Read')
                                <x-layouts.div-clearfix>
                                    @can('Mobile Complaint Create')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route('mobile-complaints.create') }}" button_icon="fa fa-add"
                                            button_name="Add" />
                                    @endcan {{-- Mobile Complaint Create End --}}
                                    @can('Mobile Complaint Import')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
                                            href="{{ route('mobile-complaints.import') }}" button_icon="fa fa-upload"
                                            button_name="Import" />
                                    @endcan {{-- Mobile Complaint Create End --}}
                                    @can('Mobile Complaint Settings')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm"
                                            href="" button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- Mobile Complaint Settings End --}}
                                    @can('Mobile Complaint Read')
                                        <x-form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Mobile Complaint Read --}}
                                </x-layouts.div-clearfix>
                                @can('Mobile Complaint Table')
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @can('Mobile Complaint Table')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Mobile Complaint Read Code')
                                                    <th>code</th>
                                                @endcan
                                                @can('Mobile Complaint Read Name')
                                                    <th>Name</th>
                                                @endcan
                                                @can('Mobile Complaint Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Mobile Complaint Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Mobile Complaint Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Mobile Complaint Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Mobile Complaint Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Mobile Complaint Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Mobile Complaint Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- ---- --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @can('Mobile Complaint Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Mobile Complaint Read Code')
                                                    <th>code</th>
                                                @endcan
                                                @can('Mobile Complaint Read Name')
                                                    <th>Name</th>
                                                @endcan
                                                @can('Mobile Complaint Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Mobile Complaint Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Mobile Complaint Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Mobile Complaint Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Mobile Complaint Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Mobile Complaint Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Mobile Complaint Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @endcan{{-- Mobile Complaint Table end --}}
                                @endcan {{-- Mobile Complaint Read end --}}
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
                    $('.delete-mobile_complaint').on('click', function() {
                        var jobTypeID = $(this).data('mobile_complaint_id');
                        var isReady = confirm("Are you sure delete Mobile Complaint");
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });
                        if (isReady) {
                            fetch("/admin/fixancare/masters/mobile-complaints/destroy" +
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
                            toastr.error("Mobile Complaint Deleting.....");
                        }

                    });
                },

                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('Mobile Complaint Table Export Excel')
                        'excel',
                    @endcan
                    @can('Mobile Complaint Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Mobile Complaint Table Print')
                        'print',
                    @endcan
                    @can('Mobile Complaint Table Copy')
                        'copy',
                    @endcan
                    @can('Mobile Complaint Table Column Visible')
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

                ajax: '{!! route('mobile-complaints.get') !!}',

                columns: [
                    @can('Mobile Complaint Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Complaint Read Code')
                        {
                            data: 'code',
                            name: 'code',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Complaint Read Code')
                        {
                            data: 'name',
                            name: 'name',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Complaint Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Complaint Read Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Complaint Read Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Complaint Read Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Complaint Read Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Complaint Edit')
                        {
                            data: 'editLink',
                            name: 'editLink',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Mobile Complaint Delete')
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
