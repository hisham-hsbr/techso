@extends('back_end.layouts.app')

@section('PageHead', 'User Edit')

@section('PageTitle', 'User Edit')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
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

@section('actionTitle', 'User Edit')
@section('mainContent')
    <div class="container-fluid">
        @can('User Edit')

            <div class="row">

                <div class="col-10">
                    <x-form.button button_type="" button_oneclick="copyToClipboard()" button_class="btn btn-success btn-xs"
                        button_icon="fa fa-clipboard" button_name=" Copy User Name & Password" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">

                </div>
                <!-- left column -->
                <div class="col-md-10">
                    <form role="form" action="{{ route('users.update', $user->id) }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Personal Information</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="name" class="required col-form-label">First
                                                Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ $user->name }}" placeholder="First Name">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="last_name" class="required col-form-label">Last
                                                Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                value="{{ $user->last_name }}" placeholder="Last Name">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="dob" class="required col-form-label">Date of
                                                Birth</label>
                                            <input type="date" name="dob" id="dob" class="form-control"
                                                value="{{ $user->dob }}" placeholder="Enter birth date">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="phone1" class="required col-form-label">Phone
                                                Number 1</label>
                                            <input type="number" name="phone1" id="phone1" class="form-control"
                                                value="{{ $user->phone1 }}" placeholder="Phone Number 1">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="phone2" class="col-form-label">Phone
                                                Number 2</label>
                                            <input type="number" name="phone2" class="form-control"
                                                value="{{ $user->phone2 }}" placeholder="Phone Number 2">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="blood_id" class="required col-form-label">Blood
                                                Group</label>
                                            <select name="blood_id" id="blood_id" class="form-control select2">
                                                <option disabled selected>--Blood Group--</option>
                                                @foreach ($bloods as $blood)
                                                    <option {{ $user->blood->id == $blood->id ? 'selected' : '' }}
                                                        value="{{ $blood->id }}">{{ $blood->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="gender" class="required col-form-label">Gender</label>
                                            <select name="gender" id="gender" class="form-control select2">
                                                <option disabled {{ $user->gender == '' ? 'selected' : '' }}>--Gender--
                                                </option>

                                                <option @if ($user->gender == 'male') { selected } @endif value="male">
                                                    Male
                                                </option>
                                                <option @if ($user->gender == 'female') { selected } @endif value="female">
                                                    Female</option>
                                                <option @if ($user->gender == 'other') { selected } @endif value="other">
                                                    Other
                                                </option>

                                            </select>
                                        </div>
                                        <div class="col-sm-8">
                                            <label for="time_zone_id" class="required col-form-label">Time Zone</label>
                                            <select name="time_zone_id" id="time_zone_id" class="form-control select2">
                                                <option disabled selected>--Time Zone--</option>
                                                @foreach ($time_zones as $time_zone)
                                                    <option {{ $user->timeZone->id == $time_zone->id ? 'selected' : '' }}
                                                        value="{{ $time_zone->id }}">{{ $time_zone->time_zone }} -- (
                                                        {{ $time_zone->utc_code }}{{ ' ' }}{{ $time_zone->country }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="email_verified_at" class="required col-form-label">Email
                                                verified</label>
                                            <input type="datetime-local" name="email_verified_at" id="email_verified_at"
                                                class="form-control" value="{{ $user->email_verified_at }}">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="email" class="required col-form-label">Email address</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ $user->email }}" placeholder="Enter email">
                                        </div>

                                        <div class="col-sm-10 p-4">
                                            <input type="checkbox" class="form-check-input" name="changePassword"
                                                value="1" id="changePassword" />
                                            <label class="form-check-label" for="changePassword">Change Password</label>
                                        </div>


                                        <div class="form-group col-sm-4">
                                            <label for="password" class="required col-form-label">Password</label>
                                            <x-form.button button_type="button" button_oneclick="generate()"
                                                button_class="btn btn-warning btn-xs generate-password"
                                                button_icon="fa fa-plus" button_name="Generate" />
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Password">
                                            <div class="form-group-append">
                                                <button type="button" class="btn btn-outline-secondary show-password"><i
                                                        class="fa-regular fa-eye-slash"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="password_confirm" class="required col-form-label">Confirm
                                                Password</label>
                                            <input type="password" name="password_confirm" id="password_confirm"
                                                class="form-control " placeholder="Confirm Password">
                                            <div class="form-group-append">
                                                <button type="button" class="btn btn-outline-secondary show-password"><i
                                                        class="fa-regular fa-eye-slash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Address Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="country" class="required col-form-label">Select
                                                Country</label>
                                            <select name="country" id="country" class="form-control select2 dynamic"
                                                data-dependent="state">
                                                {{-- <option value="">Select Country</option> --}}
                                                @foreach ($country_list as $country)
                                                    <option {{ $user->cityName->id == $country->id ? 'selected' : '' }}
                                                        value="{{ $country->country }}">{{ $country->country }}
                                                    </option>
                                                    <option value="{{ $country->country }}">
                                                        {{ $country->country }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="state" class="required col-form-label">Select
                                                State</label>
                                            <select name="state" id="state" class="form-control select2 dynamic"
                                                data-dependent="district">
                                                {{-- <option value="">Select State</option> --}}
                                                <option {{ $user->cityName->id == $country->id ? 'selected' : '' }}
                                                    value="{{ $country->state }}">{{ $country->state }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="district" class="required col-form-label">Select
                                                District</label>
                                            <select name="district" id="district" class="form-control select2 dynamic"
                                                data-dependent="city">
                                                {{-- <option value="">Select District</option> --}}
                                                <option {{ $user->cityName->id == $country->id ? 'selected' : '' }}
                                                    value="{{ $country->district }}">{{ $country->district }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="city" class="required col-form-label">Select
                                                City</label>
                                            <select name="city" id="city" class="form-control select2 dynamic"
                                                data-dependent="zip_code">
                                                {{-- <option value="">Select City</option> --}}
                                                <option {{ $user->cityName->id == $country->id ? 'selected' : '' }}
                                                    value="{{ $country->city }}">{{ $country->city }}
                                                </option>
                                            </select>
                                        </div>
                                        {{ $user->cityName->id }}
                                        <div class="form-group col-sm-4">
                                            <label for="zip_code" class="required col-form-label">Select Zip
                                                Code</label>
                                            <select name="zip_code" id="zip_code" class="form-control select2">
                                                {{-- <option  selected>--Blood Group--</option> --}}
                                                <option {{ $user->cityName->id == $country->id ? 'selected' : '' }}
                                                    value="{{ $country->zip_code }}">{{ $country->zip_code }}
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="roles">Assign Roles</label>
                                        <select name="roles[]" id="roles" class="duallistbox" multiple="multiple">
                                            @foreach ($roles as $role)
                                                <option @if (in_array($role->id, $user->roles->pluck('id')->toArray())) selected @endif
                                                    value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Assign Special Permissions</label>
                                        <select name="permission[]" class="duallistbox" multiple="multiple">
                                            @foreach ($permissions as $key => $value)
                                                @foreach ($value as $permission)
                                                    <option @if (in_array($permission->id, $user->permissions->pluck('id')->toArray())) selected @endif
                                                        value="{{ $permission->id }}">{{ $permission->name }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-10 pl-5 pt-2">
                                <input type="checkbox" class="form-check-input" name="status" value="1"
                                    id="status" @if ($user->status == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Admin Settings</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 pl-5 pt-2">
                                        <input type="checkbox" class="form-check-input" name="personal_settings"
                                            value="1" id="personal_settings"
                                            @if ($user->settings['personal_settings'] == 1) {{ 'checked' }} @endif />
                                        <label class="form-check-label" for="personal_settings">Personal Settings</label>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Personal Settings</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 pl-5 pt-2">
                                        <input type="checkbox" class="form-check-input" name="card_header" value="1"
                                            id="card_header" @if ($user->settings['card_header'] == 1) {{ 'checked' }} @endif />
                                        <label class="form-check-label" for="card_header">Page Card Header</label>
                                    </div>
                                    <div class="col-sm-3 pl-5 pt-2">
                                        <input type="checkbox" class="form-check-input" name="card_footer" value="1"
                                            id="card_footer" @if ($user->settings['card_footer'] == 1) {{ 'checked' }} @endif />
                                        <label class="form-check-label" for="card_footer">Page Card Footer</label>
                                    </div>
                                    <div class="col-sm-3 pl-5 pt-2">
                                        <input type="checkbox" class="form-check-input" name="sidebar_collapse"
                                            value="1" id="sidebar_collapse"
                                            @if ($user->settings['sidebar_collapse'] == 1) {{ 'checked' }} @endif />
                                        <label class="form-check-label" for="sidebar_collapse">Sidebar Collapse</label>
                                    </div>
                                    <div class="col-sm-3 pl-5 pt-2">
                                        <input type="checkbox" class="form-check-input" name="dark_mode" value="1"
                                            id="dark_mode" @if ($user->settings['dark_mode'] == 1) {{ 'checked' }} @endif />
                                        <label class="form-check-label" for="dark_mode">Dark Mode</label>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-sm-8 pl-4 pt-2">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="permission_view" class="required col-form-label ">Permission
                                                    View :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="permission_view" id="permission_view"
                                                    class="form-control select2">

                                                    <option @if ($user->settings['permission_view'] == 'list') { selected } @endif
                                                        value="list">
                                                        List
                                                    </option>
                                                    <option @if ($user->settings['permission_view'] == 'group') { selected } @endif
                                                        value="group">
                                                        Group</option>

                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="">
                            @can('User Update')
                                <button type="submit" id="modal-default"
                                    class="btn btn-primary float-right ml-1">Update</button>
                            @endcan
                            <a type="button" href="{{ route('roles.index') }}"
                                class="btn btn-warning float-right ml-1">Back</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>
                <!--/.col (left) -->

            </div>
            <div class="row">

                <div class="col-10 mt-3">
                    <br>
                    <x-form.button button_type="" button_oneclick="copyToClipboard()" button_class="btn btn-success btn-xs"
                        button_icon="fa fa-clipboard" button_name="   Copy User Name & Password" />
                </div>
            </div>
            <!-- /.row -->
        @endcan
    </div><!-- /.container-fluid -->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modalsssssss</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')





    <!-- Select2 -->
    <script src="{{ asset('back_end_links/adminLinks/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {

            //Initialize Select2 Elements
            $('.select2').select2()

            // //Initialize Select2 Elements
            // $('.select2bs4').select2({
            //     theme: 'bootstrap4'
            // })
        });
    </script>

    <x-script.password-and-username-copy-to-clipboard />
    <x-script.password-generate />

    <x-message.message />

    <x-links.footer-link-jquery-validation />

    <x-validation.user-jquery-validation />



    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        $("#checkall").change(function() {
            $(".checkitem").prop("checked", $(this).prop("checked"))
        })
        $(".checkitem").change(function() {
            if ($(this).prop("checked") == false) {
                $("#checkall").prop("checked", false)
            }
            if ($(".checkitem:checked").length == $(".checkitem").length) {
                $("#checkall").prop("checked", true)
            }
        })
    </script>
    <script>
        var checkid = '{{ $key }}';
        var checkclass = '{{ $key }}';

        $('#checkall' + checkid).change(function() {
            $('.check' + checkclass).prop("checked",
                $(this).prop("checked"))
        })
        $('.check' + checkclass).change(function() {
            if ($(this).prop("checked") == false) {
                $("#checkall' + checkid").prop("checked", false)
            }
            if ($('.check' + checkclasschecked).length == $('.check' +
                    checkclass).length) {
                $("#checkall' + checkid").prop("checked", true)
            }
        })
    </script>
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
    <script type="text/javascript">
        $(document).ready(function() {

            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('users.csdcs.get') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dependent: dependent
                        },
                        success: function(result) {
                            $('#' + dependent).html(result);
                        }

                    })
                }
            });

            $('#country').change(function() {
                $('#state').val('');
                $('#district').val('');
                $('#city').val('');
                $('#zip_code').val('');
            });

            $('#state').change(function() {
                $('#district').val('');
                $('#city').val('');
                $('#zip_code').val('');
            });

            $('#district').change(function() {
                $('#city').val('');
                $('#zip_code').val('');
            });

            $('#district').change(function() {
                $('#zip_code').val('');
            });


        });
    </script>


@endsection
