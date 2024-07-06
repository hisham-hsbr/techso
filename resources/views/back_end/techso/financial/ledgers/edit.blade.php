@extends('back_end.layouts.app')

@section('PageHead')
    {{ $head_name }} Edit
@endsection

@section('PageTitle')
    {{ $head_name }} Edit
@endsection

@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('headLinks')
    <!-- Select2 -->
    <x-links.header-links-select-two />
@endsection

@section('actionTitle')
    {{ $head_name }} Edit
@endsection

@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('{{ $head_name }} Create')
                    {{-- <form role="form" action="{{ route($route_name . '.store') }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        @can('Job Type Edit') --}}
                    <form role="form" action="{{ route($route_name . '.update', $job_type->id) }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">


                                <x-form.form-group-label-input div_class="col-sm-6" label_for="code" lable_class="required"
                                    label_name="Code" input_type="text" input_name="code" input_id="code" input_style=""
                                    input_class="" input_value="{{ $job_type->code }}" input_placeholder="Enter code" />
                                <x-form.form-group-label-input div_class="col-sm-6" label_for="name" lable_class="required"
                                    label_name="Job Type Name" input_type="text" input_name="name" input_id="name"
                                    input_style="" input_class="" input_value="{{ $job_type->name }}"
                                    input_placeholder="Job Type Name" />


                                <x-form.form-group-label-input div_class="col-sm-6" label_for="local_name"
                                    lable_class="required" label_name="{{ $head_name }} Local Name" input_type="text"
                                    input_name="local_name" input_id="local_name" input_style="" input_class=""
                                    input_value="{{ $job_type->local_name }}{{ old('local_name') }}"
                                    input_placeholder="Enter local_name" />

                                <div class="col-sm-10 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="default" value="1" id="default"
                                        @if ($job_type->default == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="default">Is Default</label>
                                </div>


                            </div>

                            <!-- /.row -->
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="col-sm-10 pl-5 pt-2">
                                <input type="checkbox" class="form-check-input" name="status" value="1" id="status"
                                    @if ($job_type->status == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('Job Type Update')
                                <button type="submit" class="btn btn-primary float-right ml-1">Update</button>
                            @endcan
                            <a type="button" href="{{ route('job-types.index') }}"
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
            // $.validator.setDefaults({
            //     submitHandler: function() {
            //         alert("Form successful submitted!");
            //     }
            // });
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
