@extends('back_end.layouts.app')

@section('PageHead', 'Product Type Index')

@section('PageTitle', 'Product Type Index')
@section('pageNavHeader')
<li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
<li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />

@endsection

@section('actionTitle', 'Product Type Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Product Type Read')
                                <x-layouts.div-clearfix>
                                    @can('Product Type Create')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route('product-types.create') }}" button_icon="fa fa-add" button_name="Add" />
                                    @endcan {{-- Product Type Create End --}}
                                    @can('Product Type Import')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
                                            href="{{ route('product-types.import') }}" button_icon="fa fa-upload"
                                            button_name="Import" />
                                    @endcan {{-- Product Type Create End --}}
                                    @can('Product Type Settings')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm"
                                            href="" button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- Product Type Settings End --}}
                                    @can('Product Type Table')
                                        <x-form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Product Type Table --}}
                                </x-layouts.div-clearfix>


                                @can('Product Type Filter')
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
                                                    @can('Product Type Read Code')
                                                        <div class="form-group col-sm-4">
                                                            <label class="col-form-label">Code</label>
                                                            <input type="text" class="form-control filter-input" id="code"
                                                                placeholder="Search Code" data-column="1" />
                                                        </div>
                                                    @endcan
                                                    @can('Product Type Read Name')
                                                        <div class="form-group col-sm-4">
                                                            <label class="col-form-label">Name</label>
                                                            <input type="text" class="form-control filter-input" id="name"
                                                                placeholder="Search Name" data-column="2" />
                                                        </div>
                                                    @endcan
                                                    @can('Product Type Read Created By')
                                                        <div class="form-group col-sm-4">
                                                            <label class="col-form-label">Created By</label>
                                                            <select data-column="6" class="form-control select2 filter-select">
                                                                <option value="">Select Created By</option>
                                                                @foreach ($createdByUsers as $createdByUser)
                                                                    <option value="{{ $createdByUser->name }}">
                                                                        {{ $createdByUser->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endcan
                                                    @can('Product Type Read Updated By')
                                                        <div class="form-group col-sm-4">
                                                            <label class="col-form-label">Updated By</label>
                                                            <select data-column="7" class="form-control select2 filter-select">
                                                                <option value="">Select Updated By</option>
                                                                @foreach ($updatedByUsers as $updatedByUser)
                                                                    <option value="{{ $updatedByUser->name }}">
                                                                        {{ $updatedByUser->name }}
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
                                @endcan

                                @can('Product Type Table')
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @can('Product Type Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Product Type Read Code')
                                                    <th width="10%">code</th>
                                                @endcan
                                                @can('Product Type Read Name')
                                                    <th width="20%">Name</th>
                                                @endcan
                                                @can('Product Type Read Status')
                                                    <th width="10%">Status</th>
                                                @endcan
                                                @can('Product Type Read Created At')
                                                    <th width="20%">Created At</th>
                                                @endcan
                                                @can('Product Type Read Updated At')
                                                    <th width="20%">Updated At</th>
                                                @endcan
                                                @can('Product Type Read Created By')
                                                    <th width="20%">Created By</th>
                                                @endcan
                                                @can('Product Type Read Updated By')
                                                    <th width="20%">Updated By</th>
                                                @endcan
                                                @can('Product Type Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Product Type Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- ---- --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @can('Product Type Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Product Type Read Code')
                                                    <th width="10%">code</th>
                                                @endcan
                                                @can('Product Type Read Name')
                                                    <th width="20%">Name</th>
                                                @endcan
                                                @can('Product Type Read Status')
                                                    <th width="10%">Status</th>
                                                @endcan
                                                @can('Product Type Read Created At')
                                                    <th width="20%">Created At</th>
                                                @endcan
                                                @can('Product Type Read Updated At')
                                                    <th width="20%">Updated At</th>
                                                @endcan
                                                @can('Product Type Read Created By')
                                                    <th width="20%">Created By</th>
                                                @endcan
                                                @can('Product Type Read Updated By')
                                                    <th width="20%">Updated By</th>
                                                @endcan
                                                @can('Product Type Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Product Type Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @endcan{{-- Product Type Table end --}}
                                @endcan {{-- Product Type Read end --}}
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

                // "paging": true,
                // "searching": false,
                // "ordering": true,
                // "info": true,

                // dom: 'Bfrtip',
                dom: '<"html5buttons"B>lTftigp',
                "fnDrawCallback": function(oSettings) {
                    $('.delete-product_type').on('click', function() {
                        var productTypeID = $(this).data('product_type_id');
                        var isReady = confirm("Are you sure delete Product type");
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });
                        if (isReady) {
                            fetch("/admin/techso/masters/product-types/destroy" +
                                productTypeID, {
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
                            toastr.error("Product Type Deleting.....");
                        }

                    });
                },

                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('Product Type Table Export Excel')
                        'excel',
                    @endcan
                    @can('Product Type Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Product Type Table Print')
                        'print',
                    @endcan
                    @can('Product Type Table Copy')
                        'copy',
                    @endcan
                    @can('Product Type Table Column Visible')
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

                ajax: '{!! route('product-types.get') !!}',
                // <--- colum serial number order with id
                "columnDefs": [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                "order": [
                    [2, 'asc']
                ],
                // colum serial number order with id --->
                columns: [
                    @can('Product Type Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Product Type Read Code')
                        {
                            data: 'code',
                            name: 'code',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Product Type Read Code')
                        {
                            data: 'name',
                            name: 'name',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Product Type Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Product Type Read Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Product Type Read Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Product Type Read Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            width: '100%',
                            defaultContent: '',
                        },
                    @endcan
                    @can('Product Type Read Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Product Type Edit')
                        {
                            data: 'editLink',
                            name: 'editLink',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Product Type Delete')
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


@endsection
