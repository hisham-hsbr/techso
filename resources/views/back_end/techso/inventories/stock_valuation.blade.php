@extends('back_end.layouts.app')

@section('PageHead', 'Stock Valuation Report')

@section('PageTitle', 'Stock Valuation Report')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
    <x-links.header-links-select-two />

@endsection

@section('actionTitle', 'Stock Valuation Report')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Stock Valuation Read')
                                <div class="card-body">
                                    <div id="myFilter" class="row">

                                        @can('Mobile Service Read Contact Number')
                                            <div class="form-group col-sm-4">
                                                <label class="col-form-label">Products</label>
                                                <input type="text" class="form-control filter-input" id="document_number"
                                                    placeholder="Search Product" data-column="1" />
                                            </div>
                                        @endcan
                                        @can('Mobile Service Read Job Number')
                                            <div class="form-group col-sm-4">
                                                <label class="col-form-label">Products List</label>
                                                <select data-column="1" class="form-control select2 filter-select" id="product">
                                                    <option value="">-- Select Product --</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->name }}">{{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endcan

                                    </div>
                                    <!-- /.card -->
                                </div>

                                @can('Stock Valuation Table')
                                    <table class="table table-bordered table-striped" id="example1"
                                        style="text-overflow: ellipsis; white-space: nowrap;">
                                        <thead>
                                            <tr>
                                                <th>SI#</th>
                                                <th>Product Name</th>
                                                <th>Current Stock</th>
                                                <th>Avarage Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $index => $product)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->current_stock }}</td>
                                                    <td style="text-align: right;">{{ number_format($product->average_price, 2) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endcan{{-- Stock Valuation Table end --}}
                                @endcan {{-- Stock Valuation Read end --}}
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

    <x-links.footer-link-select-two />

    <x-links.footer-links-dataTable />

    <script>
        $(function() {
            $("#example1")
                .DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                })
                .buttons()
                .container()
                .appendTo("#example1_wrapper .col-md-6:eq(0)");
            $("#example2").DataTable({
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });

        });


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
    </script>


@endsection
