@extends('back_end.layouts.app')

@section('PageHead', 'Home Carousel Settings')

@section('PageTitle', 'Home Carousel Settings')
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

@section('actionTitle', 'Home Carousel Settings')
@section('mainContent')
    <div class="container-fluid">
        @can('User Menu')
            <div class="row">

                <div class="col-md-12">
                    <form role="form" action="{{ route('app-settings.update') }}" method="post" id="quickForm"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            {{-- Developer settings --}}
                            <div class="row">
                                <x-form.form-heading name="Developer settings" />
                                <x-form.form-group-label-input div_class="col-sm-3" label_for="name" lable_class="required"
                                    label_name="Name" input_type="text" input_name="name" input_id="name" input_style=""
                                    input_class="" input_value="{{ $developer->data['name'] }}"
                                    input_placeholder="Page Title Prefix" />
                                <x-form.form-group-label-input div_class="col-sm-3" label_for="website" lable_class="required"
                                    label_name="Website" input_type="url" input_name="website" input_id="website" input_style=""
                                    input_class="" input_value="{{ $developer->data['website'] }}"
                                    input_placeholder="website" />
                                <x-form.form-group-label-input div_class="col-sm-3" label_for="mail" lable_class="required"
                                    label_name="Mail" input_type="email" input_name="mail" input_id="mail" input_style=""
                                    input_class="" input_value="{{ $developer->data['mail'] }}" input_placeholder="mail" />
                                <x-form.form-group-label-input div_class="col-sm-3" label_for="starting_year"
                                    lable_class="required" label_name="Starting Year" input_type="number"
                                    input_name="starting_year" input_id="starting_year" input_style="" input_class=""
                                    input_value="{{ $developer->data['starting_year'] }}" input_placeholder="starting_year" />
                                <x-form.form-group-label-input div_class="col-sm-3" label_for="ending_year"
                                    lable_class="required" label_name="Ending Year" input_type="number" input_name="ending_year"
                                    input_id="ending_year" input_style="" input_class=""
                                    input_value="{{ $developer->data['ending_year'] }}" input_placeholder="ending_year" />
                            </div>
                            {{-- App settings --}}
                            <div class="row">
                                <x-form.form-heading name="Application settings" />
                                <x-form.form-group-label-input div_class="col-sm-3" label_for="app_name" lable_class="required"
                                    label_name="Application Name" input_type="text" input_name="app_name" input_id="app_name"
                                    input_style="" input_class="" input_value="{{ $application->data['app_name'] }}"
                                    input_placeholder="Enter Application Name" />
                                <x-form.form-group-label-input div_class="col-sm-3" label_for="app_version"
                                    lable_class="required" label_name="Application Version" input_type="text"
                                    input_name="app_version" input_id="app_version" input_style="" input_class=""
                                    input_value="{{ $application->data['app_version'] }}"
                                    input_placeholder="Enter Application Version" />
                            </div>
                            {{-- page settings --}}
                            <div class="row">
                                <x-form.form-heading name="Page settings" />
                                <x-form.form-group-label-input div_class="col-sm-3" label_for="page_title_prefix"
                                    lable_class="required" label_name="Page Title Prefix" input_type="text"
                                    input_name="page_title_prefix" input_id="page_title_prefix" input_style=""
                                    input_class="" input_value="{{ $page->data['page_title_prefix'] }}"
                                    input_placeholder="Page Title Prefix" />
                                <x-form.form-group-label-input div_class="col-sm-3" label_for="page_title_suffix"
                                    lable_class="required" label_name="Page Title Suffix" input_type="text"
                                    input_name="page_title_suffix" input_id="page_title_suffix" input_style=""
                                    input_class="" input_value="{{ $page->data['page_title_suffix'] }}"
                                    input_placeholder="Page Title Suffix" />

                            </div>
                            <div class="row">
                                <x-form.form-heading name="Sidebar logo settings" />
                                <x-form.form-group-label-select div_class="col-sm-3" label_for="sidebar_logo"
                                    lable_class="required" label_name="Sidebar logo" select_class=""
                                    select_name="sidebar_logo" select_id="">
                                    <option @if ($logo->data['sidebar_logo'] == '1') { selected } @endif value="1">Enable
                                    </option>
                                    <option @if ($logo->data['sidebar_logo'] == '0') { selected } @endif value="0">Disable
                                    </option>
                                </x-form.form-group-label-select>

                                <x-form.form-group-label-select div_class="col-sm-3" label_for="sidebar_mini_logo"
                                    lable_class="required" label_name="Sidebar Mini logo" select_class=""
                                    select_name="sidebar_mini_logo" select_id="">
                                    <option @if ($logo->data['sidebar_mini_logo'] == '1') { selected } @endif value="1">Enable
                                    </option>
                                    <option @if ($logo->data['sidebar_mini_logo'] == '0') { selected } @endif value="0">Disable
                                    </option>
                                </x-form.form-group-label-select>
                            </div>
                            <div class="row">
                                <x-form.form-heading name="Sign in & up settings" />

                                <x-form.form-group-label-select div_class="col-sm-3" label_for="sign_logo"
                                    lable_class="required" label_name="Sign in & up logo" select_class=""
                                    select_name="sign_logo" select_id="">
                                    <option @if ($logo->data['sign_logo'] == '1') { selected } @endif value="1">Enable
                                    </option>
                                    <option @if ($logo->data['sign_logo'] == '0') { selected } @endif value="0">Disable
                                    </option>
                                </x-form.form-group-label-select>

                                <x-form.form-group-label-select div_class="col-sm-3" label_for="sign_mini_logo"
                                    lable_class="required" label_name="Sign in & up mini logo" select_class=""
                                    select_name="sign_mini_logo" select_id="">
                                    <option @if ($logo->data['sign_mini_logo'] == '1') { selected } @endif value="1">Enable
                                    </option>
                                    <option @if ($logo->data['sign_mini_logo'] == '0') { selected } @endif value="0">Disable
                                    </option>
                                </x-form.form-group-label-select>

                                <x-form.form-group-label-select div_class="col-sm-3" label_for="sign_with_google"
                                    lable_class="required" label_name="Sign in & up with Google" select_class=""
                                    select_name="sign_with_google" select_id="">
                                    <option @if ($logo->data['sign_with_google'] == '1') { selected } @endif value="1">Enable
                                    </option>
                                    <option @if ($logo->data['sign_with_google'] == '0') { selected } @endif value="0">Disable
                                    </option>
                                </x-form.form-group-label-select>

                                <x-form.form-group-label-select div_class="col-sm-3" label_for="sign_with_facebook"
                                    lable_class="required" label_name="Sign in & up with Facebook" select_class=""
                                    select_name="sign_with_facebook" select_id="">
                                    <option @if ($logo->data['sign_with_facebook'] == '1') { selected } @endif value="1">Enable
                                    </option>
                                    <option @if ($logo->data['sign_with_facebook'] == '0') { selected } @endif value="0">Disable
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
                                    <input type="checkbox" class="form-check-input" name="about_section" value="1"
                                        id="about_section" @if ($default_front_end_layout->data['about_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="about_section">about_section(Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="features_section" value="1"
                                        id="features_section"
                                        @if ($default_front_end_layout->data['features_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="features_section">features_section(Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="call_to_action_section"
                                        value="1" id="call_to_action_section"
                                        @if ($default_front_end_layout->data['call_to_action_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label"
                                        for="call_to_action_section">call_to_action_section(Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="services_section" value="1"
                                        id="services_section"
                                        @if ($default_front_end_layout->data['services_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="services_section">services_section(Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="portfolio_section" value="1"
                                        id="portfolio_section"
                                        @if ($default_front_end_layout->data['portfolio_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="portfolio_section">portfolio_section(Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="testimonials_section"
                                        value="1" id="testimonials_section"
                                        @if ($default_front_end_layout->data['testimonials_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label"
                                        for="testimonials_section">testimonials_section(Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="pricing_section" value="1"
                                        id="pricing_section" @if ($default_front_end_layout->data['pricing_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="pricing_section">pricing_section(Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="faq_section" value="1"
                                        id="faq_section" @if ($default_front_end_layout->data['faq_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="faq_section">faq_section(Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="team_section" value="1"
                                        id="team_section" @if ($default_front_end_layout->data['team_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="team_section">team_section(Enable)</label>
                                </div>
                                <div class="col-sm-4 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="contact_section" value="1"
                                        id="contact_section" @if ($default_front_end_layout->data['contact_section'] == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="contact_section">contact_section(Enable)</label>
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
