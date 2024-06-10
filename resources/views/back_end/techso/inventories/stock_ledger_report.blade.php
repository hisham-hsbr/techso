@extends('back_end.layouts.app')

@section('PageHead', 'Stock Ledger Report')

@section('PageTitle', 'Stock Ledger Report')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />

@endsection

@section('actionTitle', 'Stock Ledger Report')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Job Type Read')

                                @can('Job Type Table')
                                    <h2>{{ $products->name }}</h2>
                                    <h2>{{ $dateRange }}</h2>

                                    <table class="table table-bordered table-striped" id="example1"
                                        style="text-overflow: ellipsis; white-space: nowrap;">
                                        <thead class="">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Doc#</th>
                                                <th scope="col">Doc Type</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">RCVD-QTY</th>
                                                <th scope="col">RCVD-Price</th>
                                                <th scope="col">ISSD-Qty</th>
                                                <th scope="col">ISSD-Price</th>
                                                <th scope="col">Balance-QTY</th>
                                                <th scope="col">AVG-price</th>
                                                <th scope="col">Sum</th>
                                                <th scope="col">Product</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inventories as $inventory)
                                                <tr>
                                                    <th scope="row">{{ $inventory->index }}</th>
                                                    <td>{{ $inventory->document_number }}</td>
                                                    <td>{{ $inventory->VoucherType->name }}</td>
                                                    <td>
                                                        {{ Carbon\Carbon::parse($inventory->date)->format('m-M-Y') }}</td>
                                                    <td style="text-align: right;">{{ $inventory->received_quantity }}</td>
                                                    <td style="text-align: right;">{{ $inventory->received_price }}</td>
                                                    <td style="text-align: right;">{{ $inventory->issued_quantity }}</td>
                                                    <td style="text-align: right;">{{ $inventory->issued_price }}</td>
                                                    <td style="text-align: right;">{{ $inventory->balanceQuantity }}</td>
                                                    <td style="text-align: right;">{{ number_format($inventory->averagePrice, 2) }}
                                                    </td>
                                                    <td style="text-align: right;">{{ number_format($inventory->balanceSum, 2) }}
                                                    </td>
                                                    <td>{{ $inventory->product->name }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    @endcan{{-- Job Type Table end --}}
                                @endcan {{-- Job Type Read end --}}
                            </div>
                            <!-- /.card-body -->
                            <div class="m-3">
                                <a type="button" href="{{ route('inventories.stock.ledger') }}"
                                    class="btn btn-warning float-right ml-1">Back</a>
                            </div>
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
    </script>


@endsection
