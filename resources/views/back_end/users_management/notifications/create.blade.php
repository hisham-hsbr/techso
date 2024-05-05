@extends('back_end.layouts.app')

@section('PageHead')
    {{ $head_name }} Create
@endsection

@section('PageTitle')
    {{ $head_name }} Create
@endsection

@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Create</li>
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

@section('actionTitle')
    {{ $head_name }} Create
@endsection
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('{{ $head_name }} Create')
                    <form role="form" action="{{ route('services.notification') }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">


                                {{-- <x-form.form-group-label-input div_class="col-sm-6" label_for="code" lable_class="required"
                                    label_name="Code" input_type="text" input_name="code" input_id="code" input_style=""
                                    input_class="" input_value="{{ old('code') }}" input_placeholder="Enter code" /> --}}

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="name" lable_class="required"
                                    label_name="{{ $head_name }} Name" input_type="text" input_name="name" input_id="name"
                                    input_style="" input_class="" input_value="{{ old('name') }}"
                                    input_placeholder="{{ $head_name }} Name" />


                            </div>

                            <!-- /.row -->
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="col-sm-10 pl-5 pt-2">
                                <input type="checkbox" class="form-check-input" name="status" value="1" id="status"
                                    @if (Auth::user()->settings['default_status'] == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('{{ $head_name }} Create')
                                <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
                            @endcan
                            <a type="button" href="{{ route($route_name . '.index') }}"
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

    <x-links.footer-link-jquery-validation />

    <script>
        $(function() {
            jQuery.validator.addMethod("noSpace", function(value, element) {
                return value.indexOf(" ") < 0 && value != "";
            });
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    code: {
                        required: true,
                        noSpace: true,
                        alphanumeric: true
                    },
                },
                messages: {
                    name: {
                        required: "Please Enter Name",
                    },
                    code: {
                        required: "Please Enter Code",
                        noSpace: "No space between the code",
                        alphanumeric: "No special characters the code",
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


@endsection
