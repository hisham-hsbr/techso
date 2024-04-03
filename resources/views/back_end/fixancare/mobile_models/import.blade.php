@extends('back_end.layouts.app')

@section('PageHead', 'Mobile Model Import')

@section('PageTitle', 'Mobile Model Import')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('mobile-models.index') }}">Mobile Models</a></li>
    <li class="breadcrumb-item active">Import</li>
@endsection

@section('headLinks')

@endsection

@section('actionTitle', 'Mobile Model Import')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('Mobile Model Import')
                    <div class="card-body">

                        <form method="post" action="{{ route('mobile-models.upload') }}" enctype="multipart/form-data">
                            @csrf
                            {{ csrf_field() }}

                            <label class="form-label">Select a Mobile Model Excel File :</label>

                            <input class="" id="data" name="data" type="file" required autofocus
                                autocomplete="data" />

                            <br>
                            <br>
                            Download <a href="{{ route('mobile-models.download') }}"><i class="fa fa-file-excel">
                                </i> Sample Mobile Model Excel</a> for Import


                            <x-message.excel-import-errors />
                    </div>

                    <!-- /.card-body -->
                    <div class="">
                        @can('Mobile Model Import')
                            <button type="submit" class="btn btn-primary float-right ml-1">Import</button>
                        @endcan
                        <a type="button" href="{{ route('mobile-models.index') }}"
                            class="btn btn-warning float-right ml-1">Back</a>
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
