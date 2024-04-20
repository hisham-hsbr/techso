@extends('back_end.layouts.app')

@section('PageHead', 'Developer Settings')

@section('PageTitle', 'Developer Settings')
@section('pageNavHeader')
    <li class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></li>
    {{-- <li class="breadcrumb-item"><a href="/admin/roles">Roles</a></li>
    <li class="breadcrumb-item active">Create</li> --}}
@endsection

@section('headLinks')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="{{ asset('back_end_links/adminLinks/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
@endsection

@section('actionTitle', 'Developer Settings')
@section('mainContent')
    <div class="container-fluid">
        @can('User Menu')
            <div class="row">

                <div class="col-md-12">
                    <form role="form" action="{{ route('app-settings.update') }}" method="post" id="quickForm"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            {{-- App settings --}}
                            <div class="row">
                                {{-- <x-form.form-group-label-input div_class="col-sm-3" label_for="app_name" lable_class="required"
                                    label_name="Application Name" input_type="text" input_name="app_name" input_id="app_name"
                                    input_style="" input_class="" input_value="{{ $application->data['app_name'] }}"
                                    input_placeholder="Enter Application Name" />
                                <x-form.form-group-label-input div_class="col-sm-3" label_for="app_version"
                                    lable_class="required" label_name="Application Version" input_type="text"
                                    input_name="app_version" input_id="app_version" input_style="" input_class=""
                                    input_value="{{ $application->data['app_version'] }}"
                                    input_placeholder="Enter Application Version" /> --}}
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="">
                            {{-- @can('Create User') --}}
                            <button type="submit" class="btn btn-primary float-right ml-1">Update</button>
                            {{-- @endcan --}}
                            <a type="button" href="{{ route('back-end.dashboard') }}"
                                class="btn btn-warning float-right ml-1">Back</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>
                <!--/.col (left) -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Favicon</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <img width="135" height="" class="img-circle elevation-2" style="font-size: 6px"
                                src="{{ asset('/storage/images/app/favicon.png') }}" alt="user avatar">
                            <form method="post" action="{{ route('developer-settings.favicon-update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="col-12 mb-3">

                                    <label class="form-label" for="customFile">Select your favicon</label>

                                    <input class="form-control" id="favicon" name="favicon" type="file" required autofocus
                                        autocomplete="favicon" />
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="col-sm-6">

                </div>
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Application logo Black</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- <img width="455" height="150" src="{{ asset('/storage/images/app/logo_black.png') }}"
                                alt="logo_black"> --}}
                            <x-app.application-logo-black width="455" />
                            <form method="post" action="{{ route('developer-settings.logo-black-update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="col-12 mb-3">

                                    <label class="form-label" for="customFile">Select your Application logo black</label>

                                    <input class="form-control" id="logo_black" name="logo_black" type="file" required
                                        autofocus autocomplete="logo_black" />
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="col-sm-6">

                </div>
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Application logo white</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- <img width="455" height="150" src="{{ asset('/storage/images/app/logo_white.png') }}"
                                alt="logo_white"> --}}
                            <x-app.application-logo-white width="455" />
                            <form method="post" action="{{ route('developer-settings.logo-white-update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="col-12 mb-3">

                                    <label class="form-label" for="customFile">Select your Application logo white</label>

                                    <input class="form-control" id="logo_white" name="logo_white" type="file" required
                                        autofocus autocomplete="logo_white" />
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        @endcan
        <!-- /.row -->
    </div><!-- /.container-fluid -->






@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')

    <x-message.message />

    <x-links.footer-link-jquery-validation />

    <script>
        $(function() {
            // $.validator.setDefaults({
            //     submitHandler: function() {
            //         alert("Form successful submitted!");
            //     }
            // });
            $('#quickForm').validate({
                rules: {
                    app_name: {
                        required: true,
                    },
                    app_version: {
                        required: true,
                    },
                    page_title_prefix: {
                        required: true,
                    },
                    page_title_suffix: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    website: {
                        required: true,
                        url: true,
                    },
                    mail: {
                        required: true,
                        email: true,
                    },
                    starting_year: {
                        required: true,
                        number: true,
                    },
                    ending_year: {
                        required: true,
                        number: true,
                    },
                },
                messages: {
                    app_name: {
                        required: "Please enter App Name",
                    },
                    app_version: {
                        required: "Please enter App Version",
                    },
                    page_title_prefix: {
                        required: "Please enter Page Title Prefix",
                    },
                    page_title_suffix: {
                        required: "Please enter Page Title Suffix",
                    },
                    name: {
                        required: "Please enter Name",
                    },
                    mail: {
                        required: "Please enter Email Address",
                        email: "Please enter a valid Email Address"
                    },
                    starting_year: {
                        required: "Please enter Starting Year",
                        number: "Please enter a valid Year"
                    },
                    ending_year: {
                        required: "Please enter Ending Year",
                        email: "Please enter a valid Year"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>

    <!-- Bootstrap4 Duallistbox -->
    <script
        src="{{ asset('back_end_links/adminLinks/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}">
    </script>
    <script>
        $(function() {
            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()
        })
    </script>




@endsection
