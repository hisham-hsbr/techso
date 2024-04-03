@extends('back_end.layouts.app')

@section('PageHead', 'Image Controller Index')

@section('PageTitle', 'Image Controller Index')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('images.index') }}">Image Controller</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
@endsection

@section('actionTitle', 'Image Controller Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Image Controller Read')
                                <x-layouts.div-clearfix>
                                    @can('Image Controller Create')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route('images.create') }}" button_icon="fa fa-add" button_name="Add" />
                                    @endcan {{-- Image Controller Create End --}}
                                    @can('Image Controller Import')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
                                            href="{{ route('images.import') }}" button_icon="fa fa-upload" button_name="Import" />
                                    @endcan {{-- Image Controller Create End --}}
                                    @can('Image Controller Settings')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm"
                                            href="" button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- Image Controller Settings End --}}
                                    @can('Image Controller Table')
                                        <x-form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Image Controller Table --}}
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
                                                {{-- @can('Mobile Service Read Contact Number')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Contact Number</label>
                                                        <input type="text" class="form-control filter-input" id="contact_number"
                                                            placeholder="Search Contact Number" data-column="12" />
                                                    </div>
                                                @endcan --}}

                                                @can('Image Controller Read Type')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Image Type</label>
                                                        <select data-column="4" class="form-control select2 filter-select">
                                                            <option value="">Select Image Type</option>
                                                            @foreach ($image_types as $image_type)
                                                                <option value="{{ $image_type }}">
                                                                    {{ $image_type }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endcan
                                                @can('Image Controller Read Group')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Image Group</label>
                                                        <select data-column="5" class="form-control select2 filter-select">
                                                            <option value="">Select Image Group</option>
                                                            @foreach ($image_groups as $image_group)
                                                                <option value="{{ $image_group }}">
                                                                    {{ $image_group }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endcan
                                                @can('Image Controller Read Parent')
                                                    <div class="form-group col-sm-4">
                                                        <label class="col-form-label">Image Parent</label>
                                                        <select data-column="6" class="form-control select2 filter-select">
                                                            <option value="">Select Image Parent</option>
                                                            @foreach ($image_parents as $image_parent)
                                                                <option value="{{ $image_parent }}">
                                                                    {{ $image_parent }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endcan
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>

                                @can('Image Controller Read')
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @can('Image Controller Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Image Controller Read Code')
                                                    <th>code</th>
                                                @endcan
                                                @can('Image Controller Read Title')
                                                    <th>Title</th>
                                                @endcan
                                                @can('Image Controller Read Name')
                                                    <th>Name</th>
                                                @endcan
                                                @can('Image Controller Read Type')
                                                    <th>Type</th>
                                                @endcan
                                                @can('Image Controller Read Group')
                                                    <th>Group</th>
                                                @endcan
                                                @can('Image Controller Read Parent')
                                                    <th>Parent</th>
                                                @endcan
                                                @can('Image Controller Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Image Controller Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Image Controller Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Image Controller Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Image Controller Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Image Controller Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Image Controller Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- ---- --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @can('Image Controller Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Image Controller Read Code')
                                                    <th>code</th>
                                                @endcan
                                                @can('Image Controller Read Title')
                                                    <th>Title</th>
                                                @endcan
                                                @can('Image Controller Read Name')
                                                    <th>Name</th>
                                                @endcan
                                                @can('Image Controller Read Type')
                                                    <th>Type</th>
                                                @endcan
                                                @can('Image Controller Read Group')
                                                    <th>Group</th>
                                                @endcan
                                                @can('Image Controller Read Parent')
                                                    <th>Parent</th>
                                                @endcan
                                                @can('Image Controller Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Image Controller Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Image Controller Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Image Controller Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Image Controller Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Image Controller Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Image Controller Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @endcan{{-- Image Controller Table end --}}
                                @endcan {{-- Image Controller Read end --}}
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
                    $('.delete-image').on('click', function() {
                        var jobTypeID = $(this).data('image_id');
                        var isReady = confirm("Are you sure delete Image");
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });
                        if (isReady) {
                            fetch("/admin/fixancare/images/destroy" +
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
                            toastr.error("Image Deleting.....");
                        }

                    });
                },

                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('Image Controller Table Export Excel')
                        'excel',
                    @endcan
                    @can('Image Controller Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Image Controller Table Print')
                        'print',
                    @endcan
                    @can('Image Controller Table Copy')
                        'copy',
                    @endcan
                    @can('Image Controller Table Column Visible')
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

                ajax: '{!! route('images.get') !!}',

                columns: [
                    @can('Image Controller Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Read Code')
                        {
                            data: 'code',
                            name: 'code',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Read Title')
                        {
                            data: 'title',
                            name: 'title',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Read Name')
                        {
                            data: 'name',
                            name: 'name',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Read Type')
                        {
                            data: 'type',
                            name: 'type',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Read Group')
                        {
                            data: 'group',
                            name: 'group',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Read Parent')
                        {
                            data: 'parent',
                            name: 'parent',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Read Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Read Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Read Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Read Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Edit')
                        {
                            data: 'editLink',
                            name: 'editLink',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Image Controller Delete')
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
