@extends('back_end.layouts.app')

@section('PageHead', 'Service Create')

@section('PageTitle', 'Service Create')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headLinks')
    <!-- Select2 -->
    <x-links.header-links-select-two />
    <x-links.header-link-dual-list-box />
@endsection

@section('actionTitle', 'Service Create')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            @can('Service Create')
                <div class="col-md-10">
                    <form role="form" action="{{ route($route_name . '.store') }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}

                </div>


                <div class="col-12 col-sm-12">
                    <div class="card card-secondary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-general-tab" data-toggle="pill"
                                        href="#custom-tabs-one-general" role="tab" aria-controls="custom-tabs-one-general"
                                        aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-attributes-tab" data-toggle="pill"
                                        href="#custom-tabs-one-attributes" role="tab"
                                        aria-controls="custom-tabs-one-attributes" aria-selected="false">Attributes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-price-list-tab" data-toggle="pill"
                                        href="#custom-tabs-one-price-list" role="tab"
                                        aria-controls="custom-tabs-one-price-list" aria-selected="false">Price List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-serial-numbers-tab" data-toggle="pill"
                                        href="#custom-tabs-one-serial-numbers" role="tab"
                                        aria-controls="custom-tabs-one-serial-numbers" aria-selected="false">Serial Numbers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-images-tab" data-toggle="pill"
                                        href="#custom-tabs-one-images" role="tab" aria-controls="custom-tabs-one-images"
                                        aria-selected="false">Images</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                                        href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings"
                                        aria-selected="false">Settings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-general" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-general-tab">
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Puchase Details</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="input-group mb-3 input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Date</span>
                                                        </div>
                                                        <input type="date" name="date" id="date" class="form-control"
                                                            value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group mb-3 input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Purchase Number#</span>
                                                        </div>
                                                        <input type="text" name="purchase_number" id="purchase_number"
                                                            class="form-control" value="TSS-{{ $list_number }}" readonly
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group mb-3 input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Voucher Type</span>
                                                        </div>
                                                        <select name="voucher_type_id" class="form-control select2">
                                                            <option disabled selected>--Voucher Type--</option>
                                                            @foreach ($voucher_types as $voucher_type)
                                                                <option
                                                                    {{ $voucher_type->name == 'Purchase Invoice' ? 'selected' : '' }}
                                                                    value="{{ $voucher_type->id }}">
                                                                    {{ $voucher_type->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group mb-3 input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Account</span>
                                                        </div>
                                                        <select name="account_id" class="form-control select2">
                                                            <option disabled selected>-- Select account --</option>
                                                            @foreach ($accounts as $account)
                                                                <option
                                                                    {{ old('account_id') == $account->id ? 'selected' : '' }}
                                                                    value="{{ $account->id }}">
                                                                    {{ $account->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group mb-3 input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Supplier Invoice#</span>
                                                        </div>
                                                        <input type="text" name="supplier_invoice" class="form-control"
                                                            value="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group mb-3 input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Narration</span>
                                                        </div>
                                                        <input type="text" name="voucher_narration" class="form-control"
                                                            value="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group mb-3 input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Remarks</span>
                                                        </div>
                                                        <input type="text" name="voucher_remarks" class="form-control"
                                                            value="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group mb-3 input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Description</span>
                                                        </div>
                                                        <input type="text" name="voucher_description" class="form-control"
                                                            value="" placeholder="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <div class="card">
                                        <div class="card-body table-responsive p-0" style="height: 100%;">
                                            <table class="table table-bordered" id="invoiceItems">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Iteam</th>
                                                        <th>QTY</th>
                                                        <th>Rate</th>
                                                        <th>Sum</th>
                                                        <th>Description</th>
                                                        <th style="width: 40px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="item-number">1</td>
                                                        <td>
                                                            <select name="product_id[]" class="form-control select2">
                                                                <option disabled selected>-- Products --</option>
                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}">
                                                                        {{ $product->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="item_quantity[]"
                                                                class="form-control item-quantity" value="1"
                                                                min="1">
                                                        </td>
                                                        <td><input type="text" name="item-price[]"
                                                                class="form-control item-price" value="0" min="0"
                                                                step="0.01">
                                                        </td>
                                                        <td class="item-amount">0</td>
                                                        <td><input type="text" name="item_description[]"
                                                                class="form-control item-description"></td>
                                                        <td><button class="btn btn-danger remove-item">Delete</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            {{-- <button class="btn btn-primary" id="addItem">Add Item</button> --}}
                                            <span><a style="text-align: :right" id="addItem"
                                                    class="btn btn-info addRowItem">add</a></span>
                                            <h3 class="mt-3">Total: $<span id="totalAmount">0.00</span></h3>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>



                                {{-- -------- tabs---- --}}
                                <div class="tab-pane fade" id="custom-tabs-one-attributes" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-attributes-tab">

                                    <div class="card-body">
                                        <div class="form-group row">
                                            <span id="message_error"></span>
                                            <hr><br>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Attribute Group</th>
                                                        <th>Attribute Name</th>
                                                        <th>Attribute Detail</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbodyAttribute">
                                                    <tr>
                                                        <td>
                                                            <select name="product_attribute_id[]"
                                                                class="form-control select2">
                                                                <option disabled selected>--Attribute Category--</option>
                                                                @foreach ($product_attributes as $key => $product_attribute)
                                                                    <optgroup label="----">
                                                                        @foreach ($product_attribute as $product_attribute_op)
                                                                            <option value="{{ $product_attribute_op->id }}">
                                                                                {{ $product_attribute_op->ProductAttributeType->name }}
                                                                                -
                                                                                {{ $product_attribute_op->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="text" name="attribute_name[]"
                                                                class="form-control"></td>
                                                        <td><input type="text" name="attribute_details[]"
                                                                class="form-control"></td>
                                                        <td style="text-align: :center"><a
                                                                class="btn btn-danger removeAttribute">-</a></td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                            <span><a style="text-align: :right"
                                                    class="btn btn-info addRowAttribute">add</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-price-list" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-price-list-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <span id="message_error"></span>
                                            <hr><br>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Price Group</th>
                                                        <th>Price</th>
                                                        <th>Price Detail</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbodyPriceList">
                                                    <tr>
                                                        <td>
                                                            <select name="product_attribute_id[]"
                                                                class="form-control select2">
                                                                <option disabled selected>--Price List Category--</option>
                                                                @foreach ($product_price_lists as $product_price_list)
                                                                    @foreach ($product_price_list as $product_price_list_op)
                                                                        <option value="{{ $product_price_list_op->id }}">
                                                                            {{ $product_price_list_op->ProductAttributeType->name }}
                                                                            -
                                                                            {{ $product_price_list_op->name }}
                                                                        </option>
                                                                    @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="number" name="price[]" class="form-control"></td>
                                                        <td><input type="text" name="product_price_details[]"
                                                                class="form-control"></td>
                                                        <td style="text-align: :center"><a
                                                                class="btn btn-danger removePriceList">-</a></td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                            <span><a style="text-align: :right"
                                                    class="btn btn-info addRowPriceList">add</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-serial-numbers" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-serial-numbers-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <span id="message_error"></span>
                                            <hr><br>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Serial Number</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbodySerial">
                                                    <tr>
                                                        <td><input type="text" name="serial_number[]"
                                                                class="form-control"></td>
                                                        <td style="text-align: :center"><a
                                                                class="btn btn-danger removeSerial">-</a></td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                            <span><a style="text-align: :right"
                                                    class="btn btn-info addRowSerial">add</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-images" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-images-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <span id="message_error"></span>
                                            <hr><br>
                                            <input type="text" name="im">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Image URL</th>
                                                        <th>Image Details</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbodyImage">
                                                    <tr>
                                                        <td><input type="file" name="url[]" class="form-control"></td>
                                                        <td><input type="text" name="image_details[]"
                                                                class="form-control"></td>
                                                        <td style="text-align: :center"><a
                                                                class="btn btn-danger removeImage">-</a></td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                            <span><a style="text-align: :right"
                                                    class="btn btn-info addRowImage">add</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-settings-tab">
                                    <div class="row">
                                        <x-form.form-heading name="Sign in & up settings" />

                                        <x-form.form-group-label-select div_class="col-sm-3" label_for="sign_logo"
                                            lable_class="required" label_name="Sign in & up logo" select_class=""
                                            select_name="sign_logo" select_id="">
                                            <option @if ($logo->data['sign_logo'] == '1') { selected } @endif value="1">Enable
                                            </option>
                                            <option @if ($logo->data['sign_logo'] == '0') { selected } @endif value="0">
                                                Disable
                                            </option>
                                        </x-form.form-group-label-select>

                                        <x-form.form-group-label-select div_class="col-sm-3" label_for="sign_mini_logo"
                                            lable_class="required" label_name="Sign in & up mini logo" select_class=""
                                            select_name="sign_mini_logo" select_id="">
                                            <option @if ($logo->data['sign_mini_logo'] == '1') { selected } @endif value="1">Enable
                                            </option>
                                            <option @if ($logo->data['sign_mini_logo'] == '0') { selected } @endif value="0">
                                                Disable
                                            </option>
                                        </x-form.form-group-label-select>

                                        <x-form.form-group-label-select div_class="col-sm-3" label_for="sign_with_google"
                                            lable_class="required" label_name="Sign in & up with Google" select_class=""
                                            select_name="sign_with_google" select_id="">
                                            <option @if ($logo->data['sign_with_google'] == '1') { selected } @endif value="1">Enable
                                            </option>
                                            <option @if ($logo->data['sign_with_google'] == '0') { selected } @endif value="0">
                                                Disable
                                            </option>
                                        </x-form.form-group-label-select>

                                        <x-form.form-group-label-select div_class="col-sm-3" label_for="sign_with_facebook"
                                            lable_class="required" label_name="Sign in & up with Facebook" select_class=""
                                            select_name="sign_with_facebook" select_id="">
                                            <option @if ($logo->data['sign_with_facebook'] == '1') { selected } @endif value="1">Enable
                                            </option>
                                            <option @if ($logo->data['sign_with_facebook'] == '0') { selected } @endif value="0">
                                                Disable
                                            </option>
                                        </x-form.form-group-label-select>
                                    </div>
                                    <div class="row">
                                        <x-form.form-heading name="Frontend settings" />
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="home_carousel_section"
                                                value="1" id="home_carousel_section"
                                                @if ($default_front_end_layout->data['home_carousel_section'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label"
                                                for="home_carousel_section">home_carousel_section(Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="about_section"
                                                value="1" id="about_section"
                                                @if ($default_front_end_layout->data['about_section'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label" for="about_section">about_section(Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="features_section"
                                                value="1" id="features_section"
                                                @if ($default_front_end_layout->data['features_section'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label"
                                                for="features_section">features_section(Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="call_to_action_section"
                                                value="1" id="call_to_action_section"
                                                @if ($default_front_end_layout->data['call_to_action_section'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label"
                                                for="call_to_action_section">call_to_action_section(Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="services_section"
                                                value="1" id="services_section"
                                                @if ($default_front_end_layout->data['services_section'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label"
                                                for="services_section">services_section(Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="portfolio_section"
                                                value="1" id="portfolio_section"
                                                @if ($default_front_end_layout->data['portfolio_section'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label"
                                                for="portfolio_section">portfolio_section(Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="testimonials_section"
                                                value="1" id="testimonials_section"
                                                @if ($default_front_end_layout->data['testimonials_section'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label"
                                                for="testimonials_section">testimonials_section(Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="pricing_section"
                                                value="1" id="pricing_section"
                                                @if ($default_front_end_layout->data['pricing_section'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label"
                                                for="pricing_section">pricing_section(Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="faq_section"
                                                value="1" id="faq_section"
                                                @if ($default_front_end_layout->data['faq_section'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label" for="faq_section">faq_section(Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="team_section"
                                                value="1" id="team_section"
                                                @if ($default_front_end_layout->data['team_section'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label" for="team_section">team_section(Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="contact_section"
                                                value="1" id="contact_section"
                                                @if ($default_front_end_layout->data['contact_section'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label"
                                                for="contact_section">contact_section(Enable)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
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
                    @can('Service Create')
                        <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
                    @endcan
                    <a type="button" href="{{ route($route_name . '.index') }}"
                        class="btn btn-warning float-right ml-1">Back</a>
                </div>
                <!-- /.card-footer -->
                </form>
            @endcan

        </div>
    </div>


@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')



    <x-message.message />

    <x-links.footer-link-select-two />
    <x-script.dual-list-box />

    <x-links.footer-link-jquery-validation />

    <x-techso.validation.customer-jquery-validation />

    <script>
        $(document).ready(function() {
            let itemIndex = 1;

            function updateItemNumbers() {
                $("#invoiceItems tbody tr").each(function(index) {
                    $(this)
                        .find(".item-number")
                        .text(index + 1);
                });
            }

            function updateTotalAmount() {
                let totalAmount = 0;
                $("#invoiceItems tbody tr").each(function() {
                    const quantity =
                        parseFloat($(this).find(".item-quantity").val()) || 0;
                    const price = parseFloat($(this).find(".item-price").val()) || 0;
                    const amount = quantity * price;
                    $(this).find(".item-amount").text(amount.toFixed(2));
                    totalAmount += amount;
                });
                $("#totalAmount").text(totalAmount.toFixed(2));
            }

            $("#addItem").click(function() {
                itemIndex++;
                const newRow = `
            <tr>
                <td class="item-number">${itemIndex}</td>
                <td>
                    <select name="product_id[]" class="form-control select2">
                        <option disabled selected>-- Products --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" name="item_quantity[]"
                        class="form-control item-quantity" value="1"
                        min="1">
                </td>
                <td><input type="text" name="item-price[]"
                        class="form-control item-price" value="0" min="0"
                        step="0.01">
                </td>
                <td class="item-amount">0</td>
                <td><input type="text" name="item_description[]"
                        class="form-control item-description"></td>
                <td><button class="btn btn-danger remove-item">Delete</button></td>
            </tr>
        `;
                $("#invoiceItems tbody").append(newRow);
                updateTotalAmount();
                $('.select2').select2();
            });

            $("#invoiceItems").on("click", ".remove-item", function() {
                $(this).closest("tr").remove();
                updateItemNumbers();
                updateTotalAmount();
            });

            $("#invoiceItems").on(
                "input",
                ".item-quantity, .item-price",
                function() {
                    updateTotalAmount();
                }
            );

            // Initial calculation
            updateTotalAmount();
        });
    </script>



    <script type="text/javascript">
        $('.addRowAttribute').on('click', function() {
            addRowAttribute();
        });

        function addRowAttribute() {
            var trAttribute = '<tr>' +
                '<td>' +
                '<select name="product_attribute_id[]" class="form-control select2">' +
                '<option disabled selected>--Attribute Category--</option>' +
                '@foreach ($product_attributes as $key => $product_attribute)' +
                '<optgroup label="----">' +
                '@foreach ($product_attribute as $product_attribute_op)' +
                '<option value="{{ $product_attribute_op->id }}">' +
                '{{ $product_attribute_op->ProductAttributeType->name }} - ' +
                '{{ $product_attribute_op->name }}' +
                '</option>' +
                '@endforeach' +
                '</optgroup>' +
                '@endforeach' +
                '</select>' +
                '</td>' +
                '<td><input type="text" name="attribute_name[]" class="form-control"></td>' +
                '<td><input type="text" name="attribute_details[]" class="form-control"></td>' +
                '<td style="text-align: :center"><a  class="btn btn-danger removeAttribute">-</a></td>' +
                '</tr>';

            $('.tbodyAttribute').append(trAttribute);

            $('.select2').select2();

        };
        $('.tbodyAttribute').on('click', '.removeAttribute', function() {
            $(this).parent().parent().remove();
        });
    </script>

    <script type="text/javascript">
        $('.addRowPriceList').on('click', function() {
            addRowPriceList();
        });

        function addRowPriceList() {
            var trPriceList = '<tr>' +
                '<td>' +
                '<select name="product_attribute_id[]" class="form-control select2">' +
                '<option disabled selected>--Price List Category--</option>' +
                '@foreach ($product_price_lists as $product_price_list)' +
                '@foreach ($product_price_list as $product_price_list_op)' +
                '<option value="{{ $product_price_list_op->id }}">' +
                '{{ $product_price_list_op->ProductAttributeType->name }} - ' +
                '{{ $product_price_list_op->name }}' +
                '</option>' +
                '@endforeach' +
                '</optgroup>' +
                '@endforeach' +
                '</select>' +
                '</td>' +
                '<td><input type="number" name="price[]" class="form-control"></td>' +
                '<td><input type="text" name="product_price_details[]" class="form-control"></td>' +
                '<td style="text-align: :center"><a  class="btn btn-danger removePriceList">-</a></td>' +
                '</tr>';

            $('.tbodyPriceList').append(trPriceList);

            $('.select2').select2();

        };
        $('.tbodyAttribute').on('click', '.removeAttribute', function() {
            $(this).parent().parent().remove();
        });
    </script>

    <script type="text/javascript">
        $('.addRowSerial').on('click', function() {
            addRowSerial();
        });

        function addRowSerial() {
            var trSerial = '<tr>' +
                '<td><input type="text" name="serial_number[]" class="form-control"></td>' +
                '<td style="text-align: :center"><a  class="btn btn-danger removeSerial">-</a></td>' +
                '</tr>';

            $('.tbodySerial').append(trSerial);

            $('.select2').select2();

        };
        $('.tbodySerial').on('click', '.removeSerial', function() {
            $(this).parent().parent().remove();
        });
    </script>

    <script type="text/javascript">
        $('.addRowImage').on('click', function() {
            addRowImage();
        });

        function addRowImage() {
            var trImage = '<tr>' +
                '<td><input type="file" name="url[]" class="form-control"></td>' +
                '<td><input type="text" name="image_details[]" class="form-control"></td>' +
                '<td style="text-align: :center"><a  class="btn btn-danger removeImage">-</a></td>' +
                '</tr>';

            $('.tbodyImage').append(trImage);

            $('.select2').select2();

        };
        $('.tbodyImage').on('click', '.removeImage', function() {
            $(this).parent().parent().remove();
        });
    </script>


@endsection
