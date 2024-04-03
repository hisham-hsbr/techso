@extends('back_end.layouts.app')

@section('PageHead', 'User Create')

@section('PageTitle', 'User Create')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headLinks')
    <x-links.header-links-select-two />
    <x-links.header-link-dual-list-box />
@endsection

@section('actionTitle', 'User Create')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-10">
                <x-form.button button_type="" button_oneclick="copyToClipboard()" button_class="btn btn-success btn-xs"
                    button_icon="fa fa-clipboard" button_name=" Copy User Name & Password" />
            </div>
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                @can('User Create')
                    <form role="form" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data"
                        id="quickForm">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">
                                <x-form.form-group-label-input div_class="col-sm-4" label_for="name"
                                    lable_class="required col-form-label" label_name="First Name" input_type="text"
                                    input_name="name" input_id="name" input_style="" input_class=""
                                    input_value="{{ old('name') }}" input_placeholder="First Name" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="last_name"
                                    lable_class="required col-form-label" label_name="Last Name" input_type="text"
                                    input_name="last_name" input_id="last_name" input_style="" input_class=""
                                    input_value="{{ old('last_name') }}" input_placeholder="Last Name" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="dob"
                                    lable_class="required col-form-label" label_name="Date Of Birth" input_type="date"
                                    input_name="dob" input_id="dob" input_style="" input_class=""
                                    input_value="{{ old('dob') }}" input_placeholder="Date Of Birth" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="phone1"
                                    lable_class="required col-form-label" label_name="Phone Number 1" input_type="number"
                                    input_name="phone1" input_id="phone1" input_style="" input_class=""
                                    input_value="{{ old('phone1') }}" input_placeholder="Phone Number 1" />

                                <x-form.form-group-label-input div_class="col-sm-4" label_for="phone2"
                                    lable_class="required col-form-label" label_name="Phone Number 2" input_type="number"
                                    input_name="phone2" input_id="phone2" input_style="" input_class=""
                                    input_value="{{ old('phone2') }}" input_placeholder="Phone Number 2" />



                                <div class="form-group col-sm-4">
                                    <label for="blood_id" class="required col-form-label">Blood
                                        Group</label>
                                    <select name="blood_id" id="blood_id" class="form-control select2">
                                        <option disabled selected>--Blood Group--</option>
                                        @foreach ($bloods as $blood)
                                            <option {{ old('blood_id') == $blood->id ? 'selected' : '' }}
                                                value="{{ $blood->id }}">
                                                {{ $blood->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="gender" class="required col-form-label">Gender</label>
                                    <select name="gender" id="gender" class="form-control select2">
                                        <option disabled selected>--Gender--</option>

                                        <option @if (old('gender') == 'male') { selected } @endif value="male">Male
                                        </option>
                                        <option @if (old('gender') == 'female') { selected } @endif value="female">Female
                                        </option>
                                        <option @if (old('gender') == 'other') { selected } @endif value="other">Other
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <label for="time_zone_id" class="required col-form-label">Time Zone</label>
                                    <select name="time_zone_id" id="time_zone_id" class="form-control select2">
                                        <option disabled selected>--Time Zone--</option>
                                        @foreach ($time_zones as $time_zone)
                                            <option
                                                @if (Auth::user()->settings['default_time_zone'] == 1) {{ Auth::user()->time_zone_id == $time_zone->id ? 'selected' : '' }} @endif
                                                value="{{ $time_zone->id }}">
                                                {{ $time_zone->time_zone }} --
                                                ({{ $time_zone->utc_code }}{{ ' ' }}{{ $time_zone->country }})
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Loging Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="email" class="required col-form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ old('email') }}" placeholder="Email">
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
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Address Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="form-group col-sm-4">
                                            <label for="country" class="required col-form-label">Select
                                                Country</label>
                                            <select name="country" id="country" class="form-control select2 dynamic"
                                                data-dependent="state">
                                                <option value="">Select Country</option>
                                                @foreach ($country_list as $country)
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
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="district" class="required col-form-label">Select
                                                District</label>
                                            <select name="district" id="district" class="form-control select2 dynamic"
                                                data-dependent="city">
                                                <option value="">Select District</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="city" class="required col-form-label">Select
                                                City</label>
                                            <select name="city" id="city" class="form-control select2 dynamic"
                                                data-dependent="zip_code">
                                                <option value="">Select City</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="zip_code" class="required col-form-label">Select Zip
                                                Code</label>
                                            <select name="zip_code" id="zip_code" class="form-control select2">
                                                <option value="">Select Zip Code</option>
                                            </select>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="roles">Assign Roles</label>
                                        <select name="roles[]" id="roles" class="duallistbox" multiple="multiple">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
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
                                    id="status" @if (Auth::user()->settings['default_status'] == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('User Create')
                                <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
                            @endcan
                            <a type="button" href="{{ route('users.index') }}"
                                class="btn btn-warning float-right ml-1">Back</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                @endcan

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
    </div><!-- /.container-fluid -->


@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')

    <x-message.message />

    <x-links.footer-link-select-two />

    <x-links.footer-link-jquery-validation />
    <x-validation.user-jquery-validation />

    <x-script.password-and-username-copy-to-clipboard />
    <x-script.password-generate />
    <x-script.dual-list-box />
    <x-script.dependent-dropdown-zip-code />

@endsection
