<script>
    $(function() {

        jQuery.validator.addMethod("noSpace", function(value, element) {
            return value.indexOf(" ") < 0 && value != "";
        });

        $('#quickForm').validate({
            rules: {
                code: {
                    required: true,
                    noSpace: true,
                    alphanumeric: true
                },
                name: {
                    required: true,
                },
                contact_name: {
                    required: true,
                },
                phone1: {
                    required: true,
                    number: true,
                    minlength: 10
                },
            },
            messages: {
                code: {
                    required: "Please Enter Code",
                    noSpace: "No space between the code",
                    alphanumeric: "No special characters the code",
                },
                name: {
                    required: "Please Enter Shop/Company Name",
                },
                contact_name: {
                    required: "Please Enter Contact Name",
                },
                phone1: {
                    required: "Please Enter Phone Number",
                    minlength: "Your Must Be At Least 10 Number Long"
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
