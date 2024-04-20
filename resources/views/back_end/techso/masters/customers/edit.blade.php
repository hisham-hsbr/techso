@extends('back_end.layouts.app')

@section('PageHead', 'Customer Edit')

@section('PageTitle', 'Customer Edit')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customer</a></li>
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

@section('actionTitle', 'Customer Edit')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('Customer Edit')
                    <form role="form" action="{{ route('customers.update', $customer->id) }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">


                                <x-form.form-group-label-input div_class="col-sm-4" label_for="code" lable_class="required"
                                    label_name="Code" input_type="text" input_name="code" input_id="code" input_style=""
                                    input_class="" input_value="{{ $customer->code }}" input_placeholder="Enter code" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="name" lable_class="required"
                                    label_name="Shop/Company Name" input_type="text" input_name="name" input_id="name"
                                    input_style="" input_class="" input_value="{{ $customer->name }}"
                                    input_placeholder="Shop/Company Name" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="local_name"
                                    lable_class="required" label_name="Shop/Company Local Name" input_type="text"
                                    input_name="local_name" input_id="local_name" input_style="" input_class=""
                                    input_value="{{ $customer->local_name }}" input_placeholder="Shop/Company Local Name" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="contact_name"
                                    lable_class="required" label_name="Contact Name" input_type="text" input_name="contact_name"
                                    input_id="contact_name" input_style="" input_class=""
                                    input_value="{{ $customer->contact_name }}" input_placeholder="Contact Name" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="phone1" lable_class="required"
                                    label_name="Contact Number 1" input_type="number" input_name="phone1" input_id="phone1"
                                    input_style="" input_class="" input_value="{{ $customer->phone1 }}"
                                    input_placeholder="Contact Number 1" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="phone2" lable_class="required"
                                    label_name="Contact Number 2" input_type="number" input_name="phone2" input_id="phone2"
                                    input_style="" input_class="" input_value="{{ $customer->phone2 }}"
                                    input_placeholder="Contact Number 2" />

                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="3" placeholder="Enter Address ...">{{ $customer->address }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3" placeholder="Enter description ...">{{ $customer->description }}</textarea>
                                    </div>
                                </div>



                            </div>

                            <!-- /.row -->
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="col-sm-10 pl-5 pt-2">
                                <input type="checkbox" class="form-check-input" name="status" value="1"
                                    id="status" @if ($customer->status == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('Customer Update')
                                <button type="submit" class="btn btn-primary float-right ml-1">Update</button>
                            @endcan
                            <a type="button" href="{{ route('customers.index') }}"
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

    <x-techso.validation.customer-jquery-validation />


@endsection
