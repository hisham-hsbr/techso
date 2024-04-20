@extends('back_end.layouts.app')

@section('PageHead', 'Brand Import')

@section('PageTitle', 'Brand Import')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Brands</a></li>
    <li class="breadcrumb-item active">Import</li>
@endsection

@section('headLinks')

@endsection

@section('actionTitle', 'Brand Import')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('Brand Import')
                    <div class="card-body">

                        <form method="post" action="{{ route('brands.upload') }}" enctype="multipart/form-data">
                            @csrf
                            {{ csrf_field() }}

                            <label class="form-label">Select a Brand Excel File :</label>

                            <input class="" id="data" name="data" type="file" required autofocus
                                autocomplete="data" />

                            <br>
                            <br>
                            Download <a href="{{ route('brands.download') }}"><i class="fa fa-file-excel"></i> Sample Brand
                                Excel</a> for Import

                            <x-message.excel-import-errors />
                    </div>


                    <!-- /.card-body -->
                    <div class="">
                        @can('Brand Import')
                            <button type="submit" class="btn btn-primary float-right ml-1">Import</button>
                        @endcan
                        <a type="button" href="{{ route('brands.index') }}" class="btn btn-warning float-right ml-1">Back</a>
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
    <x-message.excel-import-errors />

@endsection
