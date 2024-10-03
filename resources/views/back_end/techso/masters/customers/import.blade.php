@extends('back_end.layouts.app')

@section('PageHead', 'Customer Excel Import')

@section('PageTitle', 'Customer Excel Import')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customers</a></li>
    <li class="breadcrumb-item active">Import</li>
@endsection

@section('headLinks')

@endsection

@section('actionTitle', 'Customer Excel Import')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('Customer Excel Import')
                    <div class="card-body">

                        <form method="post" action="{{ route('customers.upload') }}" enctype="multipart/form-data">
                            @csrf
                            {{ csrf_field() }}

                            <label class="form-label">Select a Customer Excel File :</label>

                            <input class="" id="data" name="data" type="file" required autofocus
                                autocomplete="data" />

                            <br>
                            <br>
                            Download <a href="{{ route('customers.download') }}"><i class="fa fa-file-excel"></i> Sample
                                Customers Excel</a> for Import


                            <x-message.excel-import-errors />
                    </div>

                    <!-- /.card-body -->
                    <div class="">
                        @can('Customer Excel Import')
                            <button type="submit" class="float-right ml-1 btn btn-primary">Import</button>
                        @endcan
                        @can('Customer Read')
                            <a type="button" href="{{ route('customers.index') }}"
                                class="float-right ml-1 btn btn-warning">Back</a>
                        @endcan
                    </div>
                    <!-- /.card-footer -->
                    </form>
                @endcan

            </div>
            <!--/.col (left) -->

        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->


@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')

    <x-message.message />

@endsection
