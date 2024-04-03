<script>
    $(function() {
        $('#quickForm').validate({
            rules: {
                date: {
                    required: true,
                    date: true,
                },
                job_number: {
                    required: true,
                },
                job_type_id: {
                    required: true,
                },
                contact_name: {
                    required: true,
                },
                contact_number: {
                    required: true,
                    number: true,
                    minlength: 10
                },
                contact_address: {
                    required: true,
                },

                imei: {
                    required: true,
                },
                lock: {
                    required: true,
                },
                brand_id: {
                    required: true,
                },
                mobile_complaint_id: {
                    required: true,
                },

                job_status_id: {
                    required: true,
                },
                payment: {
                    required: true,
                },
                advance: {
                    required: true,
                },
                balance: {
                    required: true,
                },
            },
            messages: {
                date: {
                    required: "Please enter a valid date",
                },
                job_number: {
                    required: "Please enter a valid job number",
                },
                job_type_id: {
                    required: "Please select a valid job type",
                },
                contact_name: {
                    required: "Please enter a valid name",
                },
                contact_number: {
                    required: "Please enter a valid phone Number",
                    minlength: "Your Must Be At Least 10 Number Long"
                },
                contact_name: {
                    required: "Please enter a valid address",
                },
                imei: {
                    required: "Please enter a valid IMEI number",
                },
                lock: {
                    required: "Please enter a valid lock",
                },
                brand_id: {
                    required: "Please select a valid brand",
                },
                mobile_complaint_id: {
                    required: "Please select a valid mobile complaint",
                },
                job_status_id: {
                    required: "Please select a valid job status",
                },
                payment: {
                    required: "Please enter a payment",
                },
                advance: {
                    required: "Please enter a advance amount",
                },
                balance: {
                    required: "balance",
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
