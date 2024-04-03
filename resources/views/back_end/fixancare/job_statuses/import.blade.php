@extends('back_end.layouts.app')

@section('PageHead', 'Work Status Import')

@section('PageTitle', 'Work Status Import')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('job-statuses.index') }}">Job Statuses</a></li>
    <li class="breadcrumb-item active">Import</li>
@endsection

@section('headLinks')

@endsection

@section('actionTitle', 'Work Status Import')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('Work Status Import')
                    <div class="card-body">

                        <form method="post" action="{{ route('job-statuses.upload') }}" enctype="multipart/form-data">
                            @csrf
                            {{ csrf_field() }}

                            <label class="form-label">Select a Work Status Excel File :</label>

                            <input class="" id="data" name="data" type="file" required autofocus
                                autocomplete="data" />

                            <br>
                            <br>
                            Download <a href="{{ route('job-statuses.download') }}"><i class="fa fa-file-excel">
                                </i> Sample Job Status Excel</a> for Import


                            <x-message.excel-import-errors />
                    </div>

                    <!-- /.card-body -->
                    <div class="">
                        @can('Work Status Import')
                            <button type="submit" class="btn btn-primary float-right ml-1">Import</button>
                        @endcan
                        <a type="button" href="{{ route('job-statuses.index') }}"
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
