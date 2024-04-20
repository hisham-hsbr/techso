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
                @can('Product Type Edit')
                    <form role="form" action="{{ route('products.update', $product->id) }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">


                                <x-form.form-group-label-input div_class="col-sm-4" label_for="code" lable_class="required"
                                    label_name="Code" input_type="text" input_name="code" input_id="code" input_style=""
                                    input_class="" input_value="{{ $product->code }}" input_placeholder="Enter code" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="name" lable_class="required"
                                    label_name="Product Type Name" input_type="text" input_name="name" input_id="name"
                                    input_style="" input_class="" input_value="{{ $product->name }}"
                                    input_placeholder="Product Type Name" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="local_name"
                                    lable_class="required" label_name="Product Local Name" input_type="text"
                                    input_name="local_name" input_id="local_name" input_style="" input_class=""
                                    input_value="{{ $product->local_name }}" input_placeholder="Product Local Name" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="product_barcode_1"
                                    lable_class="required" label_name="Product Barcode 1" input_type="text"
                                    input_name="product_barcode_1" input_id="product_barcode_1" input_style="" input_class=""
                                    input_value="{{ $product->product_barcode_1 }}" input_placeholder="Product Barcode 1" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="product_barcode_2"
                                    lable_class="required" label_name="Product Barcode 2" input_type="text"
                                    input_name="product_barcode_2" input_id="product_barcode_2" input_style="" input_class=""
                                    input_value="{{ $product->product_barcode_2 }}" input_placeholder="Product Barcode 2" />
                                <div class="col-sm-4"></div>
                                <x-form.form-group-label-select div_class="col-sm-4" label_for="product_type_id"
                                    lable_class="required" label_name="Product Type" select_class="select2"
                                    select_name="product_type_id" select_id="product_type_id">
                                    <option disabled selected>-- Select Product Type--</option>
                                    @foreach ($product_types as $product_type)
                                        <option {{ $product->product_type->id == $product_type->id ? 'selected' : '' }}
                                            value="{{ $product_type->id }}">{{ $product_type->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>

                                <x-form.form-group-label-select div_class="col-sm-4" label_for="brand_id" lable_class="required"
                                    label_name="Brand" select_class="select2" select_name="brand_id" select_id="brand_id">
                                    <option disabled selected>-- Select Brand--</option>
                                    @foreach ($brands as $brand)
                                        <option {{ $product->brand->id == $brand->id ? 'selected' : '' }}
                                            value="{{ $brand->id }}">{{ $brand->name }}
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
                                    @if ($product->status == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('Product Type Update')
                                <button type="submit" class="btn btn-primary float-right ml-1">Update</button>
                            @endcan
                            <a type="button" href="{{ route('product-types.index') }}"
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
