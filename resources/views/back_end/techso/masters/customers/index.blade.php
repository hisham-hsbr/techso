@extends('back_end.layouts.app')

@section('PageHead', 'Customer Index')

@section('PageTitle', 'Customer Index')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customer</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
@endsection

@section('actionTitle', 'Customer Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Customer Read')
                                <x-layouts.div-clearfix>
                                    @can('Customer Create')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
                                            href="{{ route('customers.create') }}" button_icon="fa fa-add" button_name="Add" />
                                    @endcan {{-- Customer Create End --}}
                                    @can('Customer Import')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
                                            href="{{ route('customers.import') }}" button_icon="fa fa-upload"
                                            button_name="Import" />
                                    @endcan {{-- Customer Create End --}}
                                    @can('Customer Settings')
                                        <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm"
                                            href="" button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- Customer Settings End --}}
                                    @can('Customer Read')
                                        <x-form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Customer Read --}}
                                </x-layouts.div-clearfix>
                                @can('Customer Table')
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @can('Customer Table')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Customer Read Name')
                                                    <th>Name</th>
                                                @endcan
                                                @can('Customer Read Contact Name')
                                                    <th>Contact Name</th>
                                                @endcan
                                                @can('Customer Read Contact Number')
                                                    <th>Contact Number</th>
                                                @endcan
                                                @can('Customer Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Customer Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Customer Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Customer Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Customer Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Customer Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Customer Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- ---- --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @can('Customer Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Customer Read Name')
                                                    <th>Name</th>
                                                @endcan
                                                @can('Customer Read Contact Name')
                                                    <th>Contact Name</th>
                                                @endcan
                                                @can('Customer Read Contact Number')
                                                    <th>Contact Number</th>
                                                @endcan
                                                @can('Customer Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('Customer Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('Customer Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('Customer Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('Customer Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('Customer Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Customer Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @endcan{{-- Customer Table end --}}
                                @endcan {{-- Customer Read end --}}
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
                    @can('Customer Table Export Excel')
                        'excel',
                    @endcan
                    @can('Customer Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Customer Table Print')
                        'print',
                    @endcan
                    @can('Customer Table Copy')
                        'copy',
                    @endcan
                    @can('Customer Table Column Visible')
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

                ajax: '{!! route('customers.get') !!}',
                // <--- colum serial number order with id
                "columnDefs": [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                "order": [
                    [1, 'asc']
                ],
                // colum serial number order with id --->
                columns: [
                    @can('Customer Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Customer Read Name')
                        {
                            data: 'name',
                            name: 'name',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Customer Read Contact Name')
                        {
                            data: 'contact_name',
                            name: 'contact_name',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Customer Read Contact Number')
                        {
                            data: 'phone_1',
                            name: 'phone_1',
                            width: '',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Customer Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Customer Read Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            width: '100%',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Customer Read Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Customer Read Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Customer Read Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Customer Edit')
                        {
                            data: 'editLink',
                            name: 'editLink',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Customer Delete')
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
        });
    </script>

@endsection
