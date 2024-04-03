@extends('back_end.layouts.app')

@section('PageHead', 'Mobile Service Create')

@section('PageTitle', 'Mobile Service Create')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('mobile-services.index') }}">Mobile Services</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headLinks')
    <!-- Select2 -->
    <x-links.header-links-select-two />
@endsection

@section('actionTitle', 'Mobile Service Create')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            {{-- <div class="col-md-1">

            </div> --}}
            <!-- left column -->
            <div class="col-md-10">
                @can('Mobile Service Create')
                    <form role="form" action="{{ route('mobile-services.store') }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
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

                                {{-- <x-form.form-group-label-input div_class="col-sm-3" label_for="job_number"
                                    lable_class="required" label_name="Job number" input_type="text" input_name="job_number"
                                    input_class="" input_style="text-transform: uppercase" input_id="job_number"
                                    input_value="F-{{ $job_number }}" input_placeholder="Enter job number" /> --}}

                                <x-form.form-group-label-select div_class="col-sm-4" label_for="job_type_id"
                                    lable_class="required" label_name="Job type" select_class="select2"
                                    select_name="job_type_id" select_id="job_type_id">
                                    <option disabled selected>-- Select job type--</option>
                                    @foreach ($job_types as $job_type)
                                        <option {{ old('job_type_id') == $job_type->id ? 'selected' : '' }}
                                            value="{{ $job_type->id }}">
                                            {{ $job_type->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>
                            </div>
                            <div class="row">
                                <x-form.form-group-label-input div_class="col-sm-4" label_for="contact_name"
                                    lable_class="required" label_name="Contact name" input_type="text" input_name="contact_name"
                                    input_class="" input_style="text-transform: uppercase" input_id="contact_name"
                                    input_value="{{ old('contact_name') }}" input_placeholder="Enter contact name" />
                                <x-form.form-group-label-input div_class="col-sm-4" label_for="contact_number"
                                    lable_class="required" label_name="Contact number" input_type="number"
                                    input_name="contact_number" input_class="" input_style="text-transform: uppercase"
                                    input_id="contact_number" input_value="{{ old('contact_number') }}"
                                    input_placeholder="Enter contact number" />
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="required">Contact address</label>
                                        <textarea name="contact_address" value="{{ old('contact_address') }}" class="form-control" rows="3"
                                            placeholder="Enter address ..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <x-form.form-group-label-input div_class="col-sm-4" label_for="imei" lable_class="required"
                                    label_name="IMEI" input_type="text" input_name="imei" input_class=""
                                    input_style="text-transform: uppercase" input_id="imei" input_value="{{ old('imei') }}"
                                    input_placeholder="Enter IMEI" />
                                <x-form.form-group-label-input div_class="col-sm-4" label_for="lock" lable_class="required"
                                    label_name="Lock" input_type="text" input_name="lock" input_class=""
                                    input_style="text-transform: uppercase" input_id="lock" input_value="{{ old('lock') }}"
                                    input_placeholder="Enter lock" />
                                <x-form.form-group-label-select div_class="col-sm-4" label_for="mobile_model_id"
                                    lable_class="required" label_name="Mobile model" select_class="select2"
                                    select_name="mobile_model_id" select_id="mobile_model_id">
                                    <option disabled selected>-- Select mobile model--</option>
                                    @foreach ($mobile_models as $mobile_model)
                                        <option {{ old('mobile_model_id') == $mobile_model->id ? 'selected' : '' }}
                                            value="{{ $mobile_model->id }}">
                                            {{ $mobile_model->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>

                                <x-form.form-group-label-select div_class="col-sm-4" label_for="mobile_complaint_id"
                                    lable_class="required" label_name="Mobile complaint" select_class="select2"
                                    select_name="mobile_complaint_id" select_id="mobile_complaint_id">
                                    <option disabled selected>-- Select mobile complaint--</option>
                                    @foreach ($mobile_complaints as $mobile_complaint)
                                        <option {{ old('mobile_complaint_id') == $mobile_complaint->id ? 'selected' : '' }}
                                            value="{{ $mobile_complaint->id }}">
                                            {{ $mobile_complaint->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>

                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Complaint details</label>
                                        <textarea name="complaint_details" value="{{ old('complaint_details') }}" class="form-control" rows="3"
                                            placeholder="Enter complaint details ..."></textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="row">

                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Work details</label>
                                        <textarea name="work_details" value="{{ old('work_details') }}" class="form-control" rows="3"
                                            placeholder="Enter work details ..."></textarea>
                                    </div>
                                </div>
                                <x-form.form-group-label-select div_class="col-sm-4" label_for="work_status_id"
                                    lable_class="required" label_name="Work status" select_class="select2"
                                    select_name="work_status_id" select_id="work_status_id">
                                    <option disabled selected>-- Select work status--</option>
                                    @foreach ($work_statuses as $work_status)
                                        <option {{ old('work_status_id') == $work_status->id ? 'selected' : '' }}
                                            value="{{ $work_status->id }}">
                                            {{ $work_status->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>
                                <x-form.form-group-label-select div_class="col-sm-4" label_for="job_status_id"
                                    lable_class="required" label_name="Job status" select_class="select2"
                                    select_name="job_status_id" select_id="job_status_id">
                                    <option disabled selected>-- Select job status--</option>
                                    @foreach ($job_statuses as $job_status)
                                        <option {{ old('job_status_id') == $job_status->id ? 'selected' : '' }}
                                            value="{{ $job_status->id }}">
                                            {{ $job_status->name }}
                                        </option>
                                    @endforeach
                                </x-form.form-group-label-select>
                                <x-form.form-group-label-input div_class="col-sm-4" label_for="delivered_at"
                                    lable_class="required" label_name="Delivered at" input_type="date"
                                    input_name="delivered_at" input_class="" input_style="text-transform: uppercase"
                                    input_id="delivered_at" input_value="{{ old('delivered_at') }}" input_placeholder="" />

                            </div>
                            <div class="row">
                                <x-form.form-group-label-input div_class="col-sm-2" label_for="payment"
                                    lable_class="required" label_name="Payment" input_type="number" input_name="payment"
                                    input_class="" input_style="text-transform: uppercase" input_id="payment"
                                    input_value="{{ old('payment') }}" input_placeholder="0.00" />

                                <x-form.form-group-label-input div_class="col-sm-2" label_for="advance"
                                    lable_class="required" label_name="Advance payed" input_type="number"
                                    input_name="advance" input_class="" input_style="text-transform: uppercase"
                                    input_id="advance" input_value="{{ old('advance') }}" input_placeholder="0.00" />

                                {{-- <x-form.form-group-label-input div_class="col-sm-2" label_for="balance"
                                    lable_class="required" label_name="Balance payment" input_type="number"
                                    input_name="balance" input_class="" input_style="text-transform: uppercase"
                                    input_id="balance" input_value="{{ old('balance') }}" input_placeholder="0.00" /> --}}

                                <div class="form-group col-sm-2">
                                    <label for="balance" class="required col-form-label">Balance payment</label>
                                    <input type="text" name="balance" id="balance" style="text-transform: uppercase"
                                        class="form-control" value="{{ old('balance') }}" placeholder="0.00" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" value="{{ old('description') }}" class="form-control" rows="3"
                                            placeholder="Enter description ..."></textarea>
                                    </div>
                                </div>
                            </div>


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
                            @can('Mobile Service Create')
                                <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
                            @endcan
                            <a type="button" href="{{ route('mobile-services.index') }}"
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

    {{-- <script src="jquery-3.5.0.min.js"></script> --}}
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

    <x-message.message />
    <x-links.footer-link-select-two />


    <x-links.footer-link-jquery-validation />
    <x-validation.mobile-service-jquery-validation />


@endsection
