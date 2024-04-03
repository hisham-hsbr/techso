{{-- jquery-validation --}}
{{-- <script>
    $(function() {
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
                password: {
                    required: true,
                    minlength: 5
                },
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
                roles: {
                    required: true,
                },
                // password_confirm: {
                //     minlength: 5
                //     equalTo: "#password"
                // },
                terms: {
                    required: true
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
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
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
                roles: {
                    required: "Please Select Role",
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
</script> --}}


<script>
    $(function() {
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

                // password: {
                //     required: true,
                //     minlength: 5
                // },

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
                roles: {
                    required: true,
                },
                // password_confirm: {
                //     minlength: 5
                //     equalTo: "#password"
                // },
                terms: {
                    required: true
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

                // password: {
                //     required: "Please provide a password",
                //     minlength: "Your password must be at least 5 characters long"
                // },

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
                roles: {
                    required: "Please Select Role",
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
