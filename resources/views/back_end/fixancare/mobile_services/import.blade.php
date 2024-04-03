@extends('back_end.layouts.app')

@section('PageHead', 'Price List Import')

@section('PageTitle', 'Price List Import')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('price-lists.index') }}">Permissions</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headLinks')

@endsection

@section('actionTitle', 'Price List Import')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('Price List Import')
                    <div class="card-body">

                        <form method="post" action="{{ route('price-lists.upload') }}" enctype="multipart/form-data">
                            @csrf
                            {{ csrf_field() }}

                            <label class="form-label">Select a Price List Excel File :</label>

                            <input class="" id="data" name="data" type="file" required autofocus
                                autocomplete="data" />

                            <br>
                            <br>
                            Download <a href="{{ route('price-lists.download') }}"><i class="fa fa-file-excel"></i> Sample Price
                                List Excel</a> for Import
                    </div>


                    <!-- /.card-body -->
                    <div class="">
                        @can('Price List Import')
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
