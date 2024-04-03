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
