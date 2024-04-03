@extends('back_end.layouts.app')

@section('PageHead', 'mobile Modle Edit')

@section('PageTitle', 'mobile Modle Edit')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('mobile-models.index') }}">Mobile Model</a></li>
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

@section('actionTitle', 'mobile Modle Edit')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('mobile Modle Edit')
                    <form role="form" action="{{ route('mobile-models.update', $mobile_model->id) }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">


                                <x-form.form-group-label-input div_class="col-sm-6" label_for="code" lable_class="required"
                                    label_name="code" input_type="text" input_name="code" input_id="code" input_style=""
                                    input_class="" input_value="{{ $mobile_model->code }}" input_placeholder="Enter code" />
                                <x-form.form-group-label-input div_class="col-sm-6" label_for="name" lable_class="required"
                                    label_name="job type Name" input_type="text" input_name="name" input_id="name"
                                    input_style="" input_class="" input_value="{{ $mobile_model->name }}"
                                    input_placeholder="job type Name" />

                                <x-form.form-group-label-select div_class="col-sm-4" label_for="mobile_brand_id"
                                    lable_class="required" label_name="Mobile Brand" select_class="select2"
                                    select_name="mobile_brand_id" select_id="mobile_brand_id">
                                    <option disabled selected>-- Select mobile Brand--</option>
                                    @foreach ($mobile_brands as $mobile_brand)
                                        {{-- <option {{ old('mobile_brand_id') == $mobile_brand->id ? 'selected' : '' }}
                                            value="{{ $mobile_brand->id }}">
                                            {{ $mobile_brand->name }}
                                        </option> --}}
                                        <option {{ $mobile_model->brand->id == $mobile_brand->id ? 'selected' : '' }}
                                            value="{{ $mobile_brand->id }}">{{ $mobile_brand->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>


                            </div>

                            <!-- /.row -->
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="col-sm-10 pl-5 pt-2">
                                <input type="checkbox" class="form-check-input" name="status" value="1" id="status"
                                    @if ($mobile_model->status == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('Job Type Update')
                                <button type="submit" class="btn btn-primary float-right ml-1">Update</button>
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
                    name: {
                        required: true,
                    },
                    parent: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please Enter First Name",
                    },
                    parent: {
                        required: "Please Enter Parent Name",
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
