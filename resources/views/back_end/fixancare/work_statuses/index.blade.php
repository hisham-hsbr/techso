@extends('back_end.layouts.app')

@section('PageHead', 'Work Status Index')

@section('PageTitle', 'Work Status Index')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('work-statuses.index') }}">Work Statuses</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
@endsection

@section('actionTitle', 'Work Status Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Work Status Read')
                                <x-layouts.div-clearfix>
                                    @can('Work Status Create')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route('work-statuses.create') }}" button_icon="fa fa-add" button_name="Add" />
                                    @endcan {{-- Work Status Create End --}}
                                    @can('Work Status Import')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
                                            href="{{ route('work-statuses.import') }}" button_icon="fa fa-upload"
                                            button_name="Import" />
                                    @endcan {{-- Work Status Create End --}}
                                    @can('Work Status Settings')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm"
                                            href="" button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- Work Status Settings End --}}
                                    @can('Work Status Read')
                                        <x-form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Work Status Read --}}
                                </x-layouts.div-clearfix>
                                @can('Work Status Table')
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @can('Work Status Table')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Work Status Read Code')
                                                    <th>code</th>
                                                @endcan
                                                @can('Work Status Read Name')
                                                    <th>Name</th>
                                                @endcan
                                                @can('Work Status Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Work Status Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Work Status Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Work Status Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Work Status Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Work Status Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Work Status Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- ---- --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @can('Work Status Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Work Status Read Code')
                                                    <th>code</th>
                                                @endcan
                                                @can('Work Status Read Name')
                                                    <th>Name</th>
                                                @endcan
                                                @can('Work Status Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Work Status Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Work Status Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Work Status Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Work Status Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Work Status Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Work Status Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @endcan{{-- Work Status Table end --}}
                                @endcan {{-- Work Status Read end --}}
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
                    $('.delete-work_status').on('click', function() {
                        var jobTypeID = $(this).data('work_status_id');
                        var isReady = confirm("Are you sure delete Work Status");
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });
                        if (isReady) {
                            fetch("/admin/fixancare/masters/work-statuses/destroy" +
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
                            toastr.error("Work Status Deleting.....");
                        }

                    });
                },

                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('Work Status Table Export Excel')
                        'excel',
                    @endcan
                    @can('Work Status Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Work Status Table Print')
                        'print',
                    @endcan
                    @can('Work Status Table Copy')
                        'copy',
                    @endcan
                    @can('Work Status Table Column Visible')
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

                ajax: '{!! route('work-statuses.get') !!}',

                columns: [
                    @can('Work Status Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Work Status Read Code')
                        {
                            data: 'code',
                            name: 'code',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Work Status Read Code')
                        {
                            data: 'name',
                            name: 'name',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Work Status Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Work Status Read Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Work Status Read Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Work Status Read Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Work Status Read Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Work Status Edit')
                        {
                            data: 'editLink',
                            name: 'editLink',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Work Status Delete')
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
