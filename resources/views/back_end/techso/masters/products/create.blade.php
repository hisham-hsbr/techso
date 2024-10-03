@extends('back_end.layouts.app')

@section('PageHead')
    {{ $head_name }} Create
@endsection

@section('PageTitle', 'Product Create')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headLinks')
    <!-- Select2 -->
    <x-links.header-links-select-two />
@endsection

@section('actionTitle', 'Product Create')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('Product Create')
                    <form role="form" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data"
                        id="quickForm">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="code" lable_class="required"
                                    label_name="Code" input_type="text" input_name="code" input_id="code" input_style=""
                                    input_class="" input_value="{{ old('code') }}" input_placeholder="Enter code" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="name" lable_class="required"
                                    label_name="Product Name" input_type="text" input_name="name" input_id="name" input_style=""
                                    input_class="" input_value="{{ old('name') }}" input_placeholder="Product Name"
                                    input_onkeyup="generateCode()" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="local_name"
                                    lable_class="required" label_name="Product Local Name" input_type="text"
                                    input_name="local_name" input_id="local_name" input_style="" input_class=""
                                    input_value="{{ old('local_name') }}" input_placeholder="Product Local Name" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="product_barcode_1"
                                    lable_class="required" label_name="Product Barcode 1" input_type="text"
                                    input_name="product_barcode_1" input_id="product_barcode_1" input_style="" input_class=""
                                    input_value="{{ old('product_barcode_1') }}" input_placeholder="Product Barcode 1" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="product_barcode_2"
                                    lable_class="required" label_name="Product Barcode 2" input_type="text"
                                    input_name="product_barcode_2" input_id="product_barcode_2" input_style="" input_class=""
                                    input_value="{{ old('product_barcode_2') }}" input_placeholder="Product Barcode 2" />
                                <div class="col-sm-4"></div>
                                <x-form.form-group-label-select div_class="col-sm-4" label_for="product_type_id"
                                    lable_class="required" label_name="Product type" select_class="select2"
                                    select_name="product_type_id" select_id="product_type_id">
                                    <option disabled selected>-- Select Product type--</option>
                                    @foreach ($product_types as $product_type)
                                        <option {{ old('product_type_id') == $product_type->id ? 'selected' : '' }}
                                            value="{{ $product_type->id }}">
                                            {{ $product_type->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>
                                <x-form.form-group-label-select div_class="col-sm-4" label_for="brand_id" lable_class="required"
                                    label_name="Brand" select_class="select2" select_name="brand_id" select_id="brand_id">
                                    <option disabled selected>-- Select Brand--</option>
                                    @foreach ($brands as $brand)
                                        <option {{ old('brand_id') == $brand->id ? 'selected' : '' }}
                                            value="{{ $brand->id }}">
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>
                                <div class="pt-2 pl-5 col-sm-10">
                                    <input type="checkbox" class="form-check-input" name="default" value="1"
                                        id="default" />
                                    <label class="form-check-label" for="default">Is Default</label>
                                </div>

                            </div>

                            <!-- /.row -->
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="pt-2 pl-5 col-sm-10">
                                <input type="checkbox" class="form-check-input" name="status" value="1" id="status"
                                    @if (Auth::user()->settings['default_status'] == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('Product Create')
                                <button type="submit" class="float-right ml-1 btn btn-primary">Save</button>
                            @endcan
                            <a type="button" href="{{ route('products.index') }}"
                                class="float-right ml-1 btn btn-warning">Back</a>
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
    <x-techso.validation.product-jquery-validation />
    <x-script.code-generate name="name" code="code" />




@endsection
