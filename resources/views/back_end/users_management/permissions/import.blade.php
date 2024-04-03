@extends('back_end.layouts.app')

@section('PageHead', 'Permission Import')

@section('PageTitle', 'Permission Import')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headLinks')

@endsection

@section('actionTitle', 'Permission Import')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('Permission Import')
                    <div class="card-body">

                        <form method="post" action="{{ route('permissions.upload') }}" enctype="multipart/form-data">
                            @csrf
                            {{ csrf_field() }}

                            <label class="form-label">Select an Excel File :</label>

                            <input class="" id="data" name="data" type="file" required autofocus
                                autocomplete="data" />

                            <br>
                            <br>
                            Download <a href="{{ route('permissions.download') }}"><i class="fa fa-file-excel"></i> Sample
                                Excel</a> for Import
                    </div>


                    <!-- /.card-body -->
                    <div class="">
                        @can('Permission Import')
                            <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
                        @endcan
                        <a type="button" href="{{ route('permissions.index') }}"
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
