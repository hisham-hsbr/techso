@extends('back_end.layouts.app')

@section('PageHead', 'Permission Index')

@section('PageTitle', 'Permission Index')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/users-management/permissions">Permissions</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
@endsection

@section('actionTitle', 'Permissions Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Permission Read')
                                <x-layouts.div-clearfix>
                                    @can('Permission Create')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route('permissions.create') }}" button_icon="fa fa-add" button_name="Add" />
                                    @endcan {{-- Permission Create End --}}
                                    @can('Permission Import')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
                                            href="{{ route('permissions.import') }}" button_icon="fa fa-upload"
                                            button_name="Import" />
                                    @endcan {{-- Permission Create End --}}
                                    @can('Permission Settings')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm"
                                            href="" button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- Permission Settings End --}}
                                    @can('Permission Table')
                                        <x-form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Permission Table --}}
                                </x-layouts.div-clearfix>
                                @can('Permission Table')
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @can('Permission Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Permission Read Name')
                                                    <th>Name</th>
                                                @endcan
                                                @can('Permission Read Parent')
                                                    <th>Parent</th>
                                                @endcan
                                                @can('Permission Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Permission Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Permission Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Permission Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Permission Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Permission Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Permission Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- ---- --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @can('Permission Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Permission Read Name')
                                                    <th>Name</th>
                                                @endcan
                                                @can('Permission Read Parent')
                                                    <th>Parent</th>
                                                @endcan
                                                @can('Permission Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Permission Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Permission Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Permission Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Permission Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Permission Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Permission Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                @endcan {{-- Permission Table end --}}
                            @endcan {{-- Permission Read end --}}
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
                "fnDrawCallback": function(oSettings) {
                    $('.delete-permission').on('click', function() {
                        var permissionID = $(this).data('permission_id');
                        var isReady = confirm("Are you sure to delete");
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });
                        if (isReady) {
                            fetch("/admin/users-management/permissions/destroy" +
                                permissionID, {
                                    method: 'DELETE',
                                    headers: myHeaders,
                                }).then(function(response) {
                                return response.json();
                            });
                            $('#example1').DataTable().ajax.reload();
                            toastr.danger("Permission Deleted");
                        }

                    });
                },

                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('Permission Table Export Excel')
                        'excel',
                    @endcan
                    @can('Permission Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Permission Table Print')
                        'print',
                    @endcan
                    @can('Permission Table Copy')
                        'copy',
                    @endcan
                    @can('Permission Table Column Visible')
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

                ajax: '{!! route('permissions.get') !!}',

                columns: [
                    @can('Permission Table')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Permission Read Name')
                        {
                            data: 'name',
                            name: 'name',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Permission Read Parent')
                        {
                            data: 'parent',
                            name: 'parent',
                            defaultContent: '',
                            orderable: false,
                            searchable: false
                        },
                    @endcan
                    @can('Permission Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Permission Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Permission Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Permission Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Permission Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Permission Edit')
                        {
                            data: 'editLink',
                            name: 'editLink',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Permission Delete')
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
    <script>
        function Refresh() {
            $('#example1').DataTable().ajax.reload();
            toastr.success("Refreshed");
        }
    </script>

@endsection
