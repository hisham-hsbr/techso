@extends('back_end.layouts.app')

@section('PageHead', 'Dashboard')

@section('PageTitle', 'Dashboard')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/blood">Dashboard</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')

@endsection

@section('actionTitle', 'Dashboard Index')
@section('mainContent')


    <form id="quickForm">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
            </div>
            {{-- <div class="form-group mb-0">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                    <label class="custom-control-label" for="exampleCheck1">I agree to the <a type="button"
                            data-toggle="modal" data-target="#modal-default" href="#">terms of
                            service</a>.</label>
                </div>
            </div> --}}
        </div>












    @endsection
    @section('actionFooter')
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@section('footerLinks')

    <x-alert.alert-tearms />

    <!-- jquery-validation -->
    <script src="{{ asset('back_end_links/adminLinks/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('back_end_links/adminLinks/plugins/jquery-validation/additional-methods.min.js') }}"></script>

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
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: "Please enter a name",
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
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

    <x-message.message />
@endsection
