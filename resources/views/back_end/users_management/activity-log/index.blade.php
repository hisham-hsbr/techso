@extends('back_end.layouts.app')

@section('PageHead', 'Activity Logs Index')

@section('PageTitle', 'Activity Logs Index')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/users-management/activity-logs">Activity Logs</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
@endsection

@section('actionTitle', 'Activity Logs Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <x-layouts.div-clearfix>
                                @can('Activity Log Settings')
                                    <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default"
                                        href="" button_icon="fa fa-cog" button_name="Settings" />
                                @endcan {{-- Activity Log Settings End --}}
                                @can('Activity Log Table')
                                    <x-form.button button_type="" button_oneclick="Refresh()" button_class="btn btn-success"
                                        button_icon="fa fa-refresh" button_name="Refresh" />
                                @endcan {{-- Activity Log Table --}}
                            </x-layouts.div-clearfix>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        @can('Activity Log Table')
                                            <th>Sn</th>
                                        @endcan
                                        @can('Activity Log Read Log Name')
                                            <th>Log Name</th>
                                        @endcan
                                        @can('Activity Log Read Description')
                                            <th>Description</th>
                                        @endcan
                                        @can('Activity Log Read Event')
                                            <th>Event</th>
                                        @endcan
                                        @can('Activity Log Read Subject Type')
                                            <th>Subject Type</th>
                                        @endcan
                                        @can('Activity Log Read Event User')
                                            <th>Event User</th>
                                        @endcan
                                        @can('Activity Log Created At')
                                            <th>Created At</th>
                                        @endcan
                                        @can('Activity Log view')
                                            <th>View</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- ---- --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        @can('Activity Log Table')
                                            <th>Sn</th>
                                        @endcan
                                        @can('Activity Log Read Log Name')
                                            <th>Log Name</th>
                                        @endcan
                                        @can('Activity Log Read Description')
                                            <th>Description</th>
                                        @endcan
                                        @can('Activity Log Read Event')
                                            <th>Event</th>
                                        @endcan
                                        @can('Activity Log Read Subject Type')
                                            <th>Subject Type</th>
                                        @endcan
                                        @can('Activity Log Read Event User')
                                            <th>Event User</th>
                                        @endcan
                                        @can('Activity Log Created At')
                                            <th>Created At</th>
                                        @endcan
                                        @can('Activity Log view')
                                            <th>View</th>
                                        @endcan
                                    </tr>
                                </tfoot>
                            </table>
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
                // "fnDrawCallback": function(oSettings) {
                //     $('.delete-permission').on('click', function() {
                //         var permissionID = $(this).data('permission_id');
                //         var isReady = confirm("Are you sure to delete");
                //         var myHeaders = new Headers({
                //             "X-CSRF-TOKEN": $("input[name='_token']").val()
                //         });
                //         if (isReady) {
                //             fetch("/admin/users-management/permissions/destroy" +
                //                 permissionID, {
                //                     method: 'DELETE',
                //                     headers: myHeaders,
                //                 }).then(function(response) {
                //                 return response.json();
                //             });
                //             $('#example1').DataTable().ajax.reload();
                //             toastr.danger("Permission Deleted");
                //         }

                //     });
                // },

                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('Activity Log Table Export Excel')
                        'excel',
                    @endcan
                    @can('Activity Log Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Activity Log Table Print')
                        'print',
                    @endcan
                    @can('Activity Log Table Copy')
                        'copy',
                    @endcan
                    @can('Activity Log Table Column Visible')
                        'colvis',
                    @endcan
                ],
                select: true,
                scrollY: '80vh',
                scrollX: true,
                scrollCollapse: true,
                // lengthMenu: [
                //     [10, 25, 50, 100, -1],
                //     [10, 25, 50, 100, "All"]
                // ],
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                ajax: '{!! route('activityLogs.get') !!}',

                columns: [
                    @can('Activity Log Table')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Activity Log Read Log Name')
                        {
                            data: 'log_name',
                            name: 'log_name',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Activity Log Read Description')
                        {
                            data: 'description',
                            name: 'description',
                            defaultContent: '',
                        },
                    @endcan
                    @can('Activity Log Read Event')
                        {
                            data: 'event',
                            name: 'event',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Activity Log Read Subject Type')
                        {
                            data: 'subject_type',
                            name: 'subject_type',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Activity Log Read Event User')
                        {
                            data: 'created_user',
                            name: 'created_user',
                            defaultContent: ''
                            // searchable: false
                        },
                    @endcan
                    @can('Activity Log Created Ate')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Activity Log View')
                        {
                            data: 'viewLink',
                            name: 'editLink',
                            searchable: false
                        },
                    @endcan
                ]
            });
            // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        function Refresh() {
            $('#example1').DataTable().ajax.reload();
            toastr.success("Refreshed");
        }
    </script>


@endsection
