<script>
    $(function() {

        jQuery.validator.addMethod("noSpace", function(value, element) {
            return value.indexOf(" ") < 0 && value != "";
        });

        $('#quickForm').validate({
            rules: {
                name: {
                    required: true,
                },
                contact_name: {
                    required: true,
                },
                phone_1: {
                    required: true,
                    number: true,
                    minlength: 10
                },
            },
            messages: {
                name: {
                    required: "Please Enter Shop/Company Name",
                },
                contact_name: {
                    required: "Please Enter Contact Name",
                },
                phone_1: {
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
