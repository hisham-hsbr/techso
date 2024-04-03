@extends('front_end.blood_bank.layouts.app')

@section('header-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
@endsection

@section('main-content')
    <div class="container">

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form role="form" action="{{ route('blood-bank.store') }}" method="post" id="quickForm"
                    enctype="multipart/form-data" id="quickForm">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter First Name">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                placeholder="Enter Last Name">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" class="form-control" name="dob" id="dob"
                                placeholder="Enter Last Name">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="gender" class="required">Gender</label>
                            <select name="gender" id="gender" class="form-control select2">
                                <option disabled selected>--Gender--</option>
                                <option @if (old('gender') == 'male') { selected } @endif value="male">Male</option>
                                <option @if (old('gender') == 'female') { selected } @endif value="female">Female</option>
                                <option @if (old('gender') == 'other') { selected } @endif value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="phone1">Phone Number 1</label>
                            <input type="number" class="form-control" name="phone1" id="phone1"
                                placeholder="Enter Phone Number 1">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="phone2">Phone Number 2</label>
                            <input type="number" class="form-control" name="phone2" id="phone2"
                                placeholder="Enter Phone Number 2">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter Email">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="blood_id" class="required">Blood
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
                        <div class="form-group col-sm-6">
                            <label for="last_donated_at">Last Donated Date</label>
                            <input type="date" class="form-control" name="last_donated_at" id="last_donated_at"
                                placeholder="Enter Last Name">
                        </div>

                        <div class="form-group col-sm-6">
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
                        <div class="form-group col-sm-6">
                            <label for="state" class="required col-form-label">Select
                                State</label>
                            <select name="state" id="state" class="form-control select2 dynamic"
                                data-dependent="district">
                                <option value="">Select State</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="district" class="required col-form-label">Select
                                District</label>
                            <select name="district" id="district" class="form-control select2 dynamic"
                                data-dependent="city">
                                <option value="">Select District</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="city" class="required col-form-label">Select
                                City</label>
                            <select name="city" id="city" class="form-control select2 dynamic"
                                data-dependent="zip_code">
                                <option value="">Select City</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="zip_code" class="required col-form-label">Select Zip
                                Code</label>
                            <select name="zip_code" id="zip_code" class="form-control select2">
                                <option value="">Select Zip Code</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <div class="form-group col-sm-6 inline-field">
                            <input class="form-check" type="checkbox" value="" id="contact_only_admin"
                                name="contact_only_admin">
                            <label class="" for="contact_only_admin"> Contact Access Only Admins</label>
                        </div>

                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
                            <a type="button" href="{{ route('blood-bank.index') }}"
                                class="btn btn-warning float-right ml-1">Back</a>
                            <br>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>



    </div>
@endsection

@section('footer-links')
    <x-message.message />

    <!-- Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>
    {{-- <x-script.dependent-dropdown-zip-code /> --}}

    <script type="text/javascript">
        $(document).ready(function() {

            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('blood-bank.csdcs.get') }}",
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
