@extends('back_end.layouts.app')

@section('PageHead', 'Service Create')

@section('PageTitle', 'Service Create')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
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
            <div class="col-md-10">
                @can('Service Create')
                    <form role="form" action="{{ route('services.store') }}" method="post" enctype="multipart/form-data"
                        id="quickForm">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">


                                <x-form.form-group-label-input div_class="col-sm-4" label_for="date" lable_class="required"
                                    label_name="Date" input_type="date" input_name="date" input_class=""
                                    input_style="text-transform: uppercase" input_id="date"
                                    input_value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" input_placeholder="" />

                                <div class="form-group col-sm-3">
                                    <label for="job_number" class="required col-form-label">Job number</label>
                                    <input type="text" name="job_number" id="job_number" style="text-transform: uppercase"
                                        class="form-control" value="F-{{ $job_number }}" readonly>
                                </div>

                                <x-form.form-group-label-select div_class="col-sm-4" label_for="job_type_id"
                                    lable_class="required" label_name="Job type" select_class="select2"
                                    select_name="job_type_id" select_id="job_type_id">
                                    <option disabled selected>-- Select job type --</option>
                                    @foreach ($job_types as $job_type)
                                        <option {{ old('job_type_id') == $job_type->id ? 'selected' : '' }}
                                            value="{{ $job_type->id }}">
                                            {{ $job_type->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>

                                <x-form.form-group-label-select div_class="col-sm-4" label_for="customer_id"
                                    lable_class="required" label_name="Customer" select_class="select2"
                                    select_name="customer_id" select_id="customer_id">
                                    <option disabled selected>-- Select Customer --</option>
                                    @foreach ($customers as $customer)
                                        <option {{ old('customer_id') == $customer->id ? 'selected' : '' }}
                                            value="{{ $customer->id }}">
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>

                                <x-form.form-group-label-select div_class="col-sm-4" label_for="product_id"
                                    lable_class="required" label_name="Product" select_class="select2" select_name="product_id"
                                    select_id="product_id">
                                    <option disabled selected>-- Select Product --</option>
                                    @foreach ($products as $product)
                                        <option {{ old('product_id') == $product->id ? 'selected' : '' }}
                                            value="{{ $product->id }}">
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>

                                <div class="col-sm-4"></div>

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="serial_number"
                                    lable_class="required" label_name="Serial Number" input_type="text"
                                    input_name="serial_number" input_class="" input_style="text-transform: uppercase"
                                    input_id="serial_number" input_value="{{ old('serial_number') }}"
                                    input_placeholder="Enter Serial Number" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="lock" lable_class="required"
                                    label_name="Lock/Password" input_type="text" input_name="lock" input_class=""
                                    input_style="text-transform: uppercase" input_id="lock" input_value="{{ old('lock') }}"
                                    input_placeholder="Enter Lock/Password" />

                                <div class="col-sm-4"></div>

                                <x-form.form-group-label-select div_class="col-sm-4" label_for="complaint_id"
                                    lable_class="required" label_name="Complaint" select_class="select2"
                                    select_name="complaint_id" select_id="complaint_id">
                                    <option disabled selected>-- Select Complaint --</option>
                                    @foreach ($complaints as $complaint)
                                        <option {{ old('complaint_id') == $complaint->id ? 'selected' : '' }}
                                            value="{{ $complaint->id }}">
                                            {{ $complaint->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>

                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="required">Complaint Details</label>
                                        <textarea name="complaint_details" value="{{ old('complaint_details') }}" class="form-control" rows="3"
                                            placeholder="Enter address ..."></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-4"></div>


                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="customer_accessories">Customer Accessories</label>
                                        <select name="customer_accessories[]" id="customer_accessories" class="duallistbox"
                                            multiple="multiple">
                                            @foreach ($customer_accessories as $accessories)
                                                <option value="{{ $accessories->id }}">{{ $accessories->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->

                                <x-form.form-group-label-select div_class="col-sm-4" label_for="work_status_id"
                                    lable_class="required" label_name="Work Status" select_class="select2"
                                    select_name="work_status_id" select_id="work_status_id">
                                    <option disabled selected>-- Select Work Status --</option>
                                    @foreach ($work_statuses as $work_status)
                                        <option {{ old('work_status_id') == $work_status->id ? 'selected' : '' }}
                                            value="{{ $work_status->id }}">
                                            {{ $work_status->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>

                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="required">Work Status Details</label>
                                        <textarea name="work_status_details" value="{{ old('work_status_details') }}" class="form-control" rows="3"
                                            placeholder="Enter address ..."></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-4"></div>

                                <x-form.form-group-label-select div_class="col-sm-4" label_for="job_status_id"
                                    lable_class="required" label_name="Job Status" select_class="select2"
                                    select_name="job_status_id" select_id="job_status_id">
                                    <option disabled selected>-- Select Job Status --</option>
                                    @foreach ($job_statuses as $job_status)
                                        <option {{ old('job_status_id') == $job_status->id ? 'selected' : '' }}
                                            value="{{ $job_status->id }}">
                                            {{ $job_status->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>

                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="required">Job Status Details</label>
                                        <textarea name="job_status_details" value="{{ old('job_status_details') }}" class="form-control" rows="3"
                                            placeholder="Enter address ..."></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-4"></div>

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="delivered_date"
                                    lable_class="required" label_name="Delivered at" input_type="date"
                                    input_name="delivered_date" input_class="" input_style="text-transform: uppercase"
                                    input_id="delivered_date" input_value="{{ old('delivered_date') }}"
                                    input_placeholder="" />
                                <div class="col-sm-12"></div>


                                <x-form.form-group-label-input div_class="col-sm-2" label_for="payment"
                                    lable_class="required" label_name="Payment" input_type="number" input_name="payment"
                                    input_class="" input_style="text-transform: uppercase" input_id="payment"
                                    input_value="{{ old('payment') }}" input_placeholder="0.00" />

                                <x-form.form-group-label-input div_class="col-sm-2" label_for="advance"
                                    lable_class="required" label_name="Advance payed" input_type="number"
                                    input_name="advance" input_class="" input_style="text-transform: uppercase"
                                    input_id="advance" input_value="{{ old('advance') }}" input_placeholder="0.00" />

                                <div class="form-group col-sm-2">
                                    <label for="balance" class="required col-form-label">Balance payment</label>
                                    <input type="text" name="balance" id="balance" style="text-transform: uppercase"
                                        class="form-control" value="{{ old('balance') }}" placeholder="0.00" readonly>
                                </div>

                                <div class="col-sm-4"></div>

                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="required">Description</label>
                                        <textarea name="description" value="{{ old('description') }}" class="form-control" rows="3"
                                            placeholder="Enter address ..."></textarea>
                                    </div>
                                </div>

                            </div>




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
                    @can('Service Create')
                        <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
                    @endcan
                    <a type="button" href="{{ route('services.index') }}" class="btn btn-warning float-right ml-1">Back</a>
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
    <x-script.dual-list-box />

    <x-links.footer-link-jquery-validation />

    <x-techso.validation.customer-jquery-validation />
    <script>
        $(document).ready(function() {
            // Get value on keyup funtion
            $("#payment").change(function() {

                var balance = 0;
                var payment = Number($("#payment").val());
                var advance = Number($("#advance").val());

                var balance = payment - advance;
                $('#balance').val(balance);

            });
        });
        $(document).ready(function() {
            // Get value on keyup funtion
            $("#advance").change(function() {

                var balance = 0;
                var payment = Number($("#payment").val());
                var advance = Number($("#advance").val());

                var balance = payment - advance;
                $('#balance').val(balance);

            });
        });
    </script>


@endsection
