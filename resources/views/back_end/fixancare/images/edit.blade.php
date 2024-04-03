@extends('back_end.layouts.app')

@section('PageHead', 'Image Controller Edit')

@section('PageTitle', 'Image Controller Edit')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('images.index') }}">Image Controller</a></li>
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

@section('actionTitle', 'Image Controller Edit')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('Image Controller Edit')
                    <form role="form" action="{{ route('images.update', $image->id) }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">


                                <x-form.form-group-label-input div_class="col-sm-6" label_for="code" lable_class="required"
                                    label_name="code" input_type="text" input_name="code" input_id="code" input_style=""
                                    input_class="" input_value="{{ $image->code }}" input_placeholder="Enter code" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="title" lable_class="required"
                                    label_name="title" input_type="text" input_name="title" input_id="title" input_style=""
                                    input_class="" input_value="{{ $image->title }}" input_placeholder="Enter title" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="name" lable_class="required"
                                    label_name="Image Name" input_type="text" input_name="name" input_id="name" input_style=""
                                    input_class="" input_value="{{ $image->name }}" input_placeholder="Image Name" />

                                {{-- <x-form.form-group-label-input div_class="col-sm-6" label_for="url" lable_class="required"
                                    label_name="Image URL" input_type="text" input_name="url" input_id="url" input_style=""
                                    input_class="" input_value="{{ $image->url }}" input_placeholder="Image url" /> --}}

                                <div class="form-group col-sm-6">
                                    <label class="col-form-label" for="">Image URL</label>
                                    <input type="file" name="url" class="form-control">
                                    <br>
                                    <div class="form-group">

                                        <img src="{{ asset('/storage/' . $image->url) }}" alt="image" width="200"
                                            height="140">
                                    </div>
                                </div>

                                <x-form.form-group-label-select div_class="col-sm-6" label_for="type" lable_class="required"
                                    label_name="Mobile Brand" select_class="select2" select_name="type" select_id="type">

                                    <option disabled selected>-- Select Image Type--</option>

                                    <option @if ($image->type == 'portfolio') { selected } @endif value="portfolio">Portfolio
                                    </option>
                                    <option @if ($image->type == 'carousel') { selected } @endif value="carousel">Carousel
                                    </option>
                                    <option @if ($image->type == 'features') { selected } @endif value="features">Features
                                    </option>

                                </x-form.form-group-label-select>

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="group" lable_class="required"
                                    label_name="Image Group" input_type="text" input_name="group" input_id="group"
                                    input_style="" input_class="" input_value="{{ $image->group }}"
                                    input_placeholder="Image group" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="parent" lable_class="required"
                                    label_name="Image Parent" input_type="text" input_name="parent" input_id="parent"
                                    input_style="" input_class="" input_value="{{ $image->parent }}"
                                    input_placeholder="Image parent" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="posting_date"
                                    lable_class="required" label_name="Posting Date" input_type="date"
                                    input_name="posting_date" input_id="posting_date" input_style="" input_class=""
                                    input_value="{{ $image->posting_date }}" input_placeholder="Image posting_date" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="starting_date"
                                    lable_class="required" label_name="Starting Date" input_type="date"
                                    input_name="starting_date" input_id="starting_date" input_style="" input_class=""
                                    input_value="{{ $image->starting_date }}" input_placeholder="Image starting_date" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="ending_date"
                                    lable_class="required" label_name="Ending Date" input_type="date"
                                    input_name="ending_date" input_id="ending_date" input_style="" input_class=""
                                    input_value="{{ $image->ending_date }}" input_placeholder="Image ending_date" />

                                <x-form.form-group-label-input div_class="col-sm-6" label_for="description"
                                    lable_class="required" label_name="Image Description" input_type="text"
                                    input_name="description" input_id="description" input_style="" input_class=""
                                    input_value="{{ $image->description }}" input_placeholder="Image description" />


                            </div>

                            <!-- /.row -->
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="col-sm-10 pl-5 pt-2">
                                <input type="checkbox" class="form-check-input" name="status" value="1"
                                    id="status" @if ($image->status == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('Image Controller Update')
                                <button type="submit" class="btn btn-primary float-right ml-1">Update</button>
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
