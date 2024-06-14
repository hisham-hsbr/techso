@extends('back_end.layouts.app')

@section('PageHead', 'Profile')

@section('PageTitle', 'Profile')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    {{-- <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li> --}}
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headLinks')
    <x-links.header-links-select-two />
    <x-links.header-link-dual-list-box />

@endsection

@section('actionTitle', 'Profile')
@section('mainContent')
    <div class="container-fluid">
        @can('User Profile Read')
            <div class="row">
                <div class="col-md-1">

                </div>
                <!-- left column -->


                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Personal Avatar</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if (Auth::user()->avatar)
                                <x-user.user-profile-image class="user-image img-circle elevation-2" width="135" />
                                <form method="post" action="{{ route('profile.avatar-delete') }}">
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-secondary btn-sm me-1 mb-1 mt-1">Remove</button>
                                </form>
                            @else
                                <x-user.user-profile-image class="user-image img-circle elevation-2" width="135" />
                                {{-- <img width="70" height="70" class="rounded-circle"
                                            src="{{ '/storage/avatars/avatar.png' }}" alt="user avatar"> --}}
                            @endif
                            <form method="post" action="{{ route('profile.avatar-update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="col-12 mb-3">

                                    <label class="form-label" for="customFile">Select your Avatar</label>

                                    <input class="form-control" id="avatar" name="avatar" type="file" required autofocus
                                        autocomplete="avatar" />
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="col-md-10">
                    <form role="form" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"
                        id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
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
                                            value="{{ Auth::user()->name }}" placeholder="First Name">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="last_name" class="required col-form-label">Last
                                            Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control"
                                            value="{{ Auth::user()->last_name }}" placeholder="Last Name">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="dob" class="required col-form-label">Date of
                                            Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control"
                                            value="{{ Auth::user()->dob }}" placeholder="Enter birth date">
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="phone1" class="required col-form-label">Phone
                                            Number 1</label>
                                        <input type="number" name="phone1" id="phone1" class="form-control"
                                            value="{{ Auth::user()->phone1 }}" placeholder="Phone Number 1">
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="phone2" class="col-form-label">Phone
                                            Number 2</label>
                                        <input type="number" name="phone2" class="form-control"
                                            value="{{ Auth::user()->phone2 }}" placeholder="Phone Number 2">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="blood_id" class="required col-form-label">Blood
                                            Group</label>
                                        <select name="blood_id" id="blood_id" class="form-control select2">
                                            <option disabled selected>--Blood Group--</option>
                                            @foreach ($bloods as $blood)
                                                <option {{ Auth::user()->blood->id == $blood->id ? 'selected' : '' }}
                                                    value="{{ $blood->id }}">{{ $blood->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="gender" class="required col-form-label">Gender</label>
                                        <select name="gender" id="gender" class="form-control select2">
                                            <option disabled {{ Auth::user()->gender == '' ? 'selected' : '' }}>--Gender--
                                            </option>

                                            <option @if (Auth::user()->gender == 'male') { selected } @endif value="male">
                                                Male
                                            </option>
                                            <option @if (Auth::user()->gender == 'female') { selected } @endif value="female">
                                                Female</option>
                                            <option @if (Auth::user()->gender == 'other') { selected } @endif value="other">
                                                Other
                                            </option>

                                        </select>
                                    </div>
                                    <div class="col-sm-8">
                                        <label for="time_zone_id" class="required col-form-label">Time Zone</label>
                                        <select name="time_zone_id" id="time_zone_id" class="form-control select2">
                                            <option disabled selected>--Time Zone--</option>
                                            @foreach ($time_zones as $time_zone)
                                                <option {{ Auth::user()->timeZone->id == $time_zone->id ? 'selected' : '' }}
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
                                            class="form-control" value="{{ Auth::user()->email_verified_at }}" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="email" class="required col-form-label">Email address</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ Auth::user()->email }}" placeholder="Enter email">
                                    </div>
                                    <div class="col-sm-10 p-4">
                                        <input type="checkbox" class="form-check-input" name="changePassword" value="1"
                                            id="changePassword" />
                                        <label class="form-check-label" for="changePassword">Change Password</label>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="password" class="required col-form-label">Password</label>
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
                                                <option {{ Auth::user()->cityName->id == $country->id ? 'selected' : '' }}
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
                                            <option {{ Auth::user()->cityName->id == $country->id ? 'selected' : '' }}
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
                                            <option {{ Auth::user()->cityName->id == $country->id ? 'selected' : '' }}
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
                                            <option {{ Auth::user()->cityName->id == $country->id ? 'selected' : '' }}
                                                value="{{ $country->city }}">{{ $country->city }}
                                            </option>
                                        </select>
                                    </div>
                                    {{ Auth::user()->cityName->id }}
                                    <div class="form-group col-sm-4">
                                        <label for="zip_code" class="required col-form-label">Select Zip
                                            Code</label>
                                        <select name="zip_code" id="zip_code" class="form-control select2">
                                            {{-- <option  selected>--Blood Group--</option> --}}
                                            <option {{ Auth::user()->cityName->id == $country->id ? 'selected' : '' }}
                                                value="{{ $country->zip_code }}">{{ $country->zip_code }}
                                            </option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card-body -->
                        </div>

                        @if (Auth::user()->settings['personal_settings'] == 1)
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Personal Settings</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="card_header"
                                                value="1" id="card_header"
                                                @if (Auth::user()->settings['card_header'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label" for="card_header">Page Card Header (Show)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="card_footer"
                                                value="1" id="card_footer"
                                                @if (Auth::user()->settings['card_footer'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label" for="card_footer">Page Card Footer (Show)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="sidebar_collapse"
                                                value="1" id="sidebar_collapse"
                                                @if (Auth::user()->settings['sidebar_collapse'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label" for="sidebar_collapse">Sidebar Collapse
                                                (Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="dark_mode" value="1"
                                                id="dark_mode" @if (Auth::user()->settings['dark_mode'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label" for="dark_mode">Dark Mode (Enable)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="default_status"
                                                value="1" id="default_status"
                                                @if (Auth::user()->settings['default_status'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label" for="default_status">Default Status
                                                (Active)</label>
                                        </div>
                                        <div class="col-sm-4 pl-5 pt-2">
                                            <input type="checkbox" class="form-check-input" name="default_time_zone"
                                                value="1" id="default_time_zone"
                                                @if (Auth::user()->settings['default_time_zone'] == 1) {{ 'checked' }} @endif />
                                            <label class="form-check-label" for="default_time_zone">Default Time Zone
                                                (Current)</label>
                                        </div>

                                        <br>
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

                                                        <option @if (Auth::user()->settings['permission_view'] == 'list') { selected } @endif
                                                            value="list">
                                                            List
                                                        </option>
                                                        <option @if (Auth::user()->settings['permission_view'] == 'group') { selected } @endif
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
                        @endif


                        <div class="">
                            @can('User Profile Update')
                                <button type="submit" class="btn btn-primary float-right ml-1">Update</button>
                            @endcan
                            <a type="button" href="{{ route('back-end.dashboard') }}"
                                class="btn btn-warning float-right ml-1">Back</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        @endcan
    </div><!-- /.container-fluid -->


@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')



    <x-script.password-and-username-copy-to-clipboard />
    <x-script.password-generate />

    <x-message.message />

    <x-links.footer-link-jquery-validation />
    <x-links.footer-link-select-two />



    <script>
        $(function() {
            // $.validator.setDefaults({
            //     submitHandler: function() {
            //         alert("Form successful submitted!");
            //     }
            // });
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    dob: {
                        required: true,
                        date: true,
                    },
                    phone1: {
                        required: true,
                        number: true,
                        minlength: 10
                    },
                    blood_id: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    time_zone_id: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },

                    if (changePassword == 1) {
                        'password: {required: true,minlength: 5},'
                    }

                    country: {
                        required: true,
                    },
                    state: {
                        required: true,
                    },
                    district: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    zip_code: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please Enter First Name",
                    },
                    dob: {
                        required: "Please Enter Date Of Birth",
                    },
                    phone1: {
                        required: "Please Enter Phone Number",
                        minlength: "Your Must Be At Least 10 Number Long"
                    },
                    blood_id: {
                        required: "Please Select Blood Group",
                    },
                    gender: {
                        required: "Please Select Gender",
                    },
                    time_zone_id: {
                        required: "Please Select Time Zone",
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    if (changePassword == 1) {
                        'password:{required: "Please provide a password",minlength: "Your password must be at least 5 characters long"},'
                    }

                    country: {
                        required: "Please Select country",
                    },
                    state: {
                        required: "Please Select state",
                    },
                    district: {
                        required: "Please Select district",
                    },
                    city: {
                        required: "Please Select city",
                    },
                    zip_code: {
                        required: "Please Select Zip Code",
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
