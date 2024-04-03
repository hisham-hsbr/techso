@extends('back_end.layouts.app')

@section('PageHead', 'Image Create')

@section('PageTitle', 'Image Create')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('images.index') }}">Mobile Model</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headLinks')
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="{{ asset('back_end_links/adminLinks/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Select2 -->
    <x-links.header-links-select-two />
@endsection

@section('actionTitle', 'Image Create')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('Image Create')
                    <form role="form" action="{{ route('images.store') }}" method="post" enctype="multipart/form-data"
                        id="quickForm">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">


                                <x-form.form-group-label-input div_class="col-sm-6" label_for="code" lable_class="required"
                                    label_name="Code (No space Eg: code_name)" input_type="text" input_name="code"
                                    input_id="code" input_style="" input_class="" input_value="{{ old('code') }}"
                                    input_placeholder="Enter code" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="title" lable_class="required"
                                    label_name="Title" input_type="text" input_name="title" input_id="title" input_style=""
                                    input_class="" input_value="{{ old('title') }}" input_placeholder="Enter title" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="name" lable_class="required"
                                    label_name="Name" input_type="text" input_name="name" input_id="name" input_style=""
                                    input_class="" input_value="{{ old('name') }}" input_placeholder="Enter name" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="url" lable_class="required"
                                    label_name="Image URL" input_type="file" input_name="url" input_id="url" input_style=""
                                    input_class="" input_value="{{ old('url') }}" input_placeholder="" />

                                <x-form.form-group-label-select div_class="col-sm-6" label_for="type" lable_class="required"
                                    label_name="Image Type" select_class="select2" select_name="type" select_id="type">
                                    <option disabled selected>-- Select Image Type--</option>
                                    <option value="portfolio">Portfolio</option>
                                    <option value="carousel">Carousel</option>
                                    <option value="features">Features</option>
                                </x-form.form-group-label-select>

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="group" lable_class="required"
                                    label_name="Group (No space Eg: group_name)" input_type="text" input_name="group"
                                    input_id="group" input_style="" input_class="" input_value="{{ old('group') }}"
                                    input_placeholder="Enter group" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="parent" lable_class="required"
                                    label_name="Parent" input_type="text" input_name="parent" input_id="parent" input_style=""
                                    input_class="" input_value="{{ old('parent') }}" input_placeholder="Enter parent" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="posting_date"
                                    lable_class="required" label_name="Posting Date" input_type="date" input_name="posting_date"
                                    input_id="posting_date" input_style="" input_class=""
                                    input_value="{{ old('posting_date') }}" input_placeholder="Enter posting_date" />


                                <x-form.form-group-label-input div_class="col-sm-6" label_for="starting_date"
                                    lable_class="required" label_name="Starting Date" input_type="date"
                                    input_name="starting_date" input_id="starting_date" input_style="" input_class=""
                                    input_value="{{ old('starting_date') }}" input_placeholder="Enter starting_date" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="ending_date"
                                    lable_class="required" label_name="Ending Date" input_type="date"
                                    input_name="ending_date" input_id="ending_date" input_style="" input_class=""
                                    input_value="{{ old('ending_date') }}" input_placeholder="Enter ending_date" />


                                <x-form.form-group-label-input div_class="col-sm-6" label_for="description"
                                    lable_class="required" label_name="Description" input_type="text"
                                    input_name="description" input_id="description" input_style="" input_class=""
                                    input_value="{{ old('description') }}" input_placeholder="Enter description" />



                                {{-- <x-form.form-group-label-input div_class="col-sm-6" label_for="name" lable_class="required"
                                    label_name="Image Name" input_type="text" input_name="name" input_id="name" input_style=""
                                    input_class="" input_value="{{ old('name') }}" input_placeholder="Image Name" />

                                <x-form.form-group-label-select div_class="col-sm-4" label_for="mobile_brand_id"
                                    lable_class="required" label_name="Mobile Brand" select_class="select2"
                                    select_name="mobile_brand_id" select_id="mobile_brand_id">
                                    <option disabled selected>-- Select mobile Brand--</option>
                                    @foreach ($mobile_brands as $mobile_brand)
                                        <option {{ old('mobile_brand_id') == $mobile_brand->id ? 'selected' : '' }}
                                            value="{{ $mobile_brand->id }}">
                                            {{ $mobile_brand->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select> --}}


                            </div>

                            <!-- /.row -->
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="col-sm-10 pl-5 pt-2">
                                <input type="checkbox" class="form-check-input" name="status" value="1"
                                    id="status" @if (Auth::user()->settings['default_status'] == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('Permission Create')
                                <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
                            @endcan
                            <a type="button" href="{{ route('images.index') }}"
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
    <x-links.footer-link-select-two />

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
                    code: {
                        required: true,
                    },
                    mobile_brand_id: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please Enter Name",
                    },
                    code: {
                        required: "Please Enter code",
                    },
                    mobile_brand_id: {
                        required: "Please Select One Brand",
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
