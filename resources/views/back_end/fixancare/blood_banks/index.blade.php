@extends('back_end.layouts.app')

@section('PageHead', 'Brand Index')

@section('PageTitle', 'Brand Index')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Mobile Services</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
@endsection

@section('actionTitle', 'Brand Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Brand Read')
                                <x-layouts.div-clearfix>
                                    @can('Brand Create')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route('brands.create') }}" button_icon="fa fa-add" button_name="Add" />
                                    @endcan {{-- Brand Create End --}}
                                    @can('Brand Import')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
                                            href="{{ route('brands.import') }}" button_icon="fa fa-upload" button_name="Import" />
                                    @endcan {{-- Brand Create End --}}
                                    @can('Brand Settings')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm"
                                            href="" button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- Brand Settings End --}}
                                    @can('Brand Table')
                                        <x-form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Brand Table --}}
                                </x-layouts.div-clearfix>
                                @can('Brand Table')
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="text" class="form-control filter-input"
                                                        placeholder="search code" data-column="1" />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control filter-input"
                                                        placeholder="search code" data-column="2" />
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <select data-column="6" class="form-control filter-select">
                                                        <option value="">Select name</option>
                                                        @foreach ($createdByUsers as $user)
                                                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select data-column="7" class="form-control filter-select">
                                                        <option value="">Select name</option>
                                                        @foreach ($updatedByUsers as $user)
                                                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                @can('Brand Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Brand Read Code')
                                                    <th width="10%">code</th>
                                                @endcan
                                                @can('Brand Read Name')
                                                    <th width="20%">Name</th>
                                                @endcan
                                                @can('Brand Read Status')
                                                    <th width="10%">Status</th>
                                                @endcan
                                                @can('Brand Read Created At')
                                                    <th width="20%">Created At</th>
                                                @endcan
                                                @can('Brand Read Updated At')
                                                    <th width="20%">Updated At</th>
                                                @endcan
                                                @can('Brand Read Created By')
                                                    <th width="20%">Created By</th>
                                                @endcan
                                                @can('Brand Read Updated By')
                                                    <th width="20%">Updated By</th>
                                                @endcan
                                                @can('Brand Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Brand Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- ---- --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @can('Brand Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Brand Read Code')
                                                    <th width="10%">code</th>
                                                @endcan
                                                @can('Brand Read Name')
                                                    <th width="20%">Name</th>
                                                @endcan
                                                @can('Brand Read Status')
                                                    <th width="10%">Status</th>
                                                @endcan
                                                @can('Brand Read Created At')
                                                    <th width="20%">Created At</th>
                                                @endcan
                                                @can('Brand Read Updated At')
                                                    <th width="20%">Updated At</th>
                                                @endcan
                                                @can('Brand Read Created By')
                                                    <th width="20%">Created By</th>
                                                @endcan
                                                @can('Brand Read Updated By')
                                                    <th width="20%">Updated By</th>
                                                @endcan
                                                @can('Brand Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Brand Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @endcan{{-- Brand Table end --}}
                                @endcan {{-- Brand Read end --}}
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
                    $('.delete-brand').on('click', function() {
                        var brandID = $(this).data('brand_id');
                        var isReady = confirm("Are you sure delete Brand");
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });
                        if (isReady) {
                            fetch("/admin/fixancare/masters/brands/destroy" +
                                brandID, {
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
                    @can('Brand Table Export Excel')
                        'excel',
                    @endcan
                    @can('Brand Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Brand Table Print')
                        'print',
                    @endcan
                    @can('Brand Table Copy')
                        'copy',
                    @endcan
                    @can('Brand Table Column Visible')
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

                ajax: '{!! route('brands.get') !!}',

                columns: [
                    @can('Brand Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Brand Read Code')
                        {
                            data: 'code',
                            name: 'code',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Brand Read Code')
                        {
                            data: 'name',
                            name: 'name',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Brand Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Brand Read Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Brand Read Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Brand Read Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            width: '100%',
                            defaultContent: '',
                        },
                    @endcan
                    @can('Brand Read Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Brand Edit')
                        {
                            data: 'editLink',
                            name: 'editLink',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Brand Delete')
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
