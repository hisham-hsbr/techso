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
        jQuery.validator.addMethod("noSpace", function(value, element) {
            return value.indexOf(" ") < 0 && value != "";
        });
        $('#quickForm').validate({
            rules: {
                name: {
                    required: true,
                },
                code: {
                    required: true,
                    noSpace: true,
                    alphanumeric: true
                },
            },
            messages: {
                name: {
                    required: "Please Enter Name",
                },
                code: {
                    required: "Please Enter Code",
                    noSpace: "No space between the code",
                    alphanumeric: "No special characters the code",
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
