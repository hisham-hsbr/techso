@extends('back_end.layouts.app')

@section('PageHead', 'Activity Log Show')

@section('PageTitle', 'Activity Log Show')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/admin/activityLogs">activityLogs</a></li>
    <li class="breadcrumb-item active">Show</li>
@endsection

@section('headLinks')
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="{{ asset('back_end_links/adminLinks/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('back_end_links/adminLinks/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('back_end_links/adminLinks/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('actionTitle', 'Activity Log Show')
@section('mainContent')
    <div class="container-fluid">
        @can('Activity Log View')
            <div class="row">
                <div class="col-md-1">

                </div>
                <!-- left column -->
                <div class="col-md-10">
                    <div class="card-body">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div style="border-style: groove;" class="p-3 form-group row">
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Log Name</label>
                                    <label><code>: {{ $activityLog->log_name }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Description</label>
                                    <label><code>:
                                            {{ $activityLog->description }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Subject Type</label>
                                    <label><code>:
                                            {{ $activityLog->subject_type }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Event</label>
                                    <label><code>: {{ $activityLog->event }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Causer type</label>
                                    <label><code>:
                                            {{ $activityLog->causer_type }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Event User</label>
                                    <label><code>:
                                            {{ $activityLog->activityUser->name }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    {{-- <label class="col-sm-4">Updated At</label>
                                    <label><code>:
                                            {{ $activityLog->updated_at }}</code></label> --}}
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Created At</label>
                                    <label><code>:
                                            {{ $activityLog->created_at }}</code></label>
                                </div>

                                @foreach ($activityLog->properties as $key => $value)
                                    <div class="pt-2 col-md-6">
                                        <table class="table table-bordered">

                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="bg-secondary color-palette">
                                                        @if ($key == 'attributes')
                                                            New {{ $activityLog->event }} {{ $activityLog->log_name }}
                                                        @elseif ($key == 'old')
                                                            Old {{ $activityLog->log_name }}
                                                        @endif
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($value as $lists => $data)
                                                    <tr class="bg-light color-palette">
                                                        <td style="color:red ;width: 10%">{{ $lists }}</td>
                                                        <td>{{ $data }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->
                    <div class="">
                        <a type="button" href="{{ route('activityLogs.index') }}"
                            class="float-right ml-1 btn btn-warning">Back</a>
                    </div>
                    <!-- /.card-footer -->

                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        @endcan
    </div><!-- /.container-fluid -->


@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')


    <x-message.message />



@endsection
