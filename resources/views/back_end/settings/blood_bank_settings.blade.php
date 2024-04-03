@extends('back_end.layouts.app')

@section('PageHead', 'Blood Bank Settings')

@section('PageTitle', 'Blood Bank Settings')
@section('pageNavHeader')
    <li class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></li>
    {{-- <li class="breadcrumb-item"><a href="/admin/roles">Roles</a></li>
    <li class="breadcrumb-item active">Create</li> --}}
@endsection

@section('headLinks')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="{{ asset('back_end_links/adminLinks/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
@endsection

@section('actionTitle', 'Blood Bank Settings')
@section('mainContent')
    <div class="container-fluid">
        @can('User Menu')
            <div class="row">

                <div class="col-md-12">
                    <form role="form" action="{{ route('blood-bank-settings.update') }}" method="post" id="quickForm"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <a href="https://fixancare.com/blood-bank" target="_blank">Blood Bank Live</a>
                        <br>
                        <div class="card-body">
                            {{-- Blood Bank settings --}}

                            <div class="row">
                                <x-form.form-heading name="Frontend Blood Bank settings" />
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="banner_section" value="1"
                                        id="banner_section" @if ($default_front_end_blood_bank_layout->data['banner_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="banner_section">banner_section (Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="donation_process_section"
                                        value="1" id="donation_process_section"
                                        @if ($default_front_end_blood_bank_layout->data['donation_process_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="donation_process_section">donation_process_section
                                        (Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="campaigns_section" value="1"
                                        id="campaigns_section" @if ($default_front_end_blood_bank_layout->data['campaigns_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="campaigns_section">campaigns_section (Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="appointment_section" value="1"
                                        id="appointment_section" @if ($default_front_end_blood_bank_layout->data['appointment_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="appointment_section">appointment_section
                                        (Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="cta_section" value="1"
                                        id="cta_section" @if ($default_front_end_blood_bank_layout->data['cta_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="cta_section">cta_section (Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="gallery_section" value="1"
                                        id="gallery_section" @if ($default_front_end_blood_bank_layout->data['gallery_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="gallery_section">gallery_section (Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="blog_section" value="1"
                                        id="blog_section" @if ($default_front_end_blood_bank_layout->data['blog_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="blog_section">blog_section (Enable)</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            {{-- @can('Create User') --}}
                            <button type="submit" class="btn btn-primary float-right ml-1">Update</button>
                            {{-- @endcan --}}
                            <a type="button" href="{{ route('back-end.dashboard') }}"
                                class="btn btn-warning float-right ml-1">Back</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>
                <!--/.col (left) -->


            </div>
        @endcan
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
                    app_name: {
                        required: true,
                    },
                    app_version: {
                        required: true,
                    },
                    page_title_prefix: {
                        required: true,
                    },
                    page_title_suffix: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    website: {
                        required: true,
                        url: true,
                    },
                    mail: {
                        required: true,
                        email: true,
                    },
                    starting_year: {
                        required: true,
                        number: true,
                    },
                    ending_year: {
                        required: true,
                        number: true,
                    },
                },
                messages: {
                    app_name: {
                        required: "Please enter App Name",
                    },
                    app_version: {
                        required: "Please enter App Version",
                    },
                    page_title_prefix: {
                        required: "Please enter Page Title Prefix",
                    },
                    page_title_suffix: {
                        required: "Please enter Page Title Suffix",
                    },
                    name: {
                        required: "Please enter Name",
                    },
                    mail: {
                        required: "Please enter Email Address",
                        email: "Please enter a valid Email Address"
                    },
                    starting_year: {
                        required: "Please enter Starting Year",
                        number: "Please enter a valid Year"
                    },
                    ending_year: {
                        required: "Please enter Ending Year",
                        email: "Please enter a valid Year"
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
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>

    <!-- Bootstrap4 Duallistbox -->
    <script
        src="{{ asset('back_end_links/adminLinks/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}">
    </script>
    <script>
        $(function() {
            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()
        })
    </script>




@endsection
