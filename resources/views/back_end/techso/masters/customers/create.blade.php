@extends('back_end.layouts.app')

@section('PageHead', 'Customer Create')

@section('PageTitle', 'Customer Create')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customers</a></li>
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

@section('actionTitle', 'Customer Create')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">
                <x-alert.alert-info model_title="Customer Create" icon_class="fa-solid fa-circle-info"
                    model_class="modal-lg">
                    <p><u>Keyboard Shortcuts</u></p>
                    <x-form.table-code>
                        <x-form.table-code-tr action="Save The Form" code="Ctrl+Alt + S" />
                        <x-form.table-code-tr action="Back To Index Page" code="Ctrl+Alt + B" />
                        <x-form.table-code-tr action="Go To Company Name" code="Alt + C" />
                        <x-form.table-code-tr action="Go To Contact Name" code="Alt + N" />
                        <x-form.table-code-tr action="Go To Phone Number" code="Alt + P" />
                        <x-form.table-code-tr action="Go To Is Default" code="Alt + D" />
                        <x-form.table-code-tr action="Go To Active" code="Alt + A" />
                    </x-form.table-code>


                </x-alert.alert-info>
            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('Customer Create')
                    <form role="form" action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data"
                        id="quickForm">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">

                                {{-- <x-form.form-group-label-input div_class="col-sm-4" label_for="code" lable_class="required"
                                    label_name="Code" input_type="text" input_name="code" input_id="code" input_style=""
                                    input_class="" input_value="{{ old('code') }}" input_placeholder="Enter code" /> --}}

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="name"
                                    lable_class="required underline" label_name="Shop/C̲ompany Name" input_type="text"
                                    input_name="name" input_id="name" input_style="" input_class=""
                                    input_value="{{ old('name') }}" input_placeholder="Shop/Company Name" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="local_name"
                                    lable_class="required" label_name="Shop/Company Local Name" input_type="text"
                                    input_name="local_name" input_id="local_name" input_style="" input_class=""
                                    input_value="{{ old('local_name') }}" input_placeholder="Shop/Company Local Name" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="contact_name"
                                    lable_class="required" label_name="Contact N̲ame" input_type="text"
                                    input_name="contact_name" input_id="contact_name" input_style="" input_class=""
                                    input_value="{{ old('contact_name') }}" input_placeholder="Contact Name" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="phone_1" lable_class="required"
                                    label_name="P̲hone Number 1" input_type="number" input_name="phone_1" input_id="phone_1"
                                    input_style="" input_class="" input_value="{{ old('phone_1') }}"
                                    input_placeholder="Phone Number 1" />
                                <x-form.form-group-label-input div_class="col-sm-4" label_for="phone_2" lable_class="required"
                                    label_name="Phone Number 2" input_type="number" input_name="phone_2" input_id="phone_2"
                                    input_style="" input_class="" input_value="{{ old('phone_2') }}"
                                    input_placeholder="Phone Number 2" />

                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" value="{{ old('address') }}" class="form-control" rows="3"
                                            placeholder="Enter Address ..."></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" value="{{ old('description') }}" class="form-control" rows="3"
                                            placeholder="Enter description ..."></textarea>
                                    </div>
                                </div>
                                <div class="pt-2 pl-5 col-sm-10">
                                    <input type="checkbox" class="form-check-input" name="default" value="1"
                                        id="default" />
                                    <label class="form-check-label" for="default">Is <u>D</u>efault</label>
                                </div>


                            </div>

                            <!-- /.row -->
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="pt-2 pl-5 col-sm-10">
                                <input type="checkbox" class="form-check-input" name="status" value="1"
                                    id="status" @if (Auth::user()->settings['default_status'] == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status"><u>A</u>ctive</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('Customer Create')
                                <button type="submit" id="saveButton"
                                    class="float-right ml-1 btn btn-primary"><u>S</u>ave</button>
                            @endcan
                            @can('Customer Read')
                                <a type="button" href="{{ route('customers.index') }}" id="backButton"
                                    class="float-right ml-1 btn btn-warning"><u>B</u>ack</a>
                            @endcan
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

    <x-techso.validation.customer-jquery-validation />
    <x-script.keyboard-shortcut key="s" button_id="saveButton" type="ctrl&alt" event="click" />
    <x-script.keyboard-shortcut key="b" button_id="backButton" type="ctrl&alt" event="click" />

    <x-script.keyboard-shortcut key="c" button_id="name" type="alt" event="focus" />
    <x-script.keyboard-shortcut key="n" button_id="contact_name" type="alt" event="focus" />
    <x-script.keyboard-shortcut key="p" button_id="phone_1" type="alt" event="focus" />
    <x-script.keyboard-shortcut key="d" button_id="default" type="alt" event="focus" />
    <x-script.keyboard-shortcut key="a" button_id="status" type="alt" event="focus" />
    <x-script.keyboard-shortcut key="m" button_id="test" type="ctrl&alt" event="focus" />




@endsection
