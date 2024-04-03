{
    $(document).ready(function () {
        $(".dynamic").change(function () {
            if ($(this).val() != "") {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data("dependent");
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('get.csdcs') }}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        dependent: dependent,
                    },
                    success: function (result) {
                        $("#" + dependent).html(result);
                    },
                });
            }
        });

        $("#country").change(function () {
            $("#state").val("");
            $("#district").val("");
            $("#city").val("");
            $("#zipcode").val("");
        });

        $("#state").change(function () {
            $("#district").val("");
            $("#city").val("");
            $("#zipcode").val("");
        });

        $("#district").change(function () {
            $("#city").val("");
            $("#zipcode").val("");
        });

        $("#district").change(function () {
            $("#zipcode").val("");
        });
    });

    $(document).ready(function () {
        $(".dynamic2").change(function () {
            if ($(this).val() != "") {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data("dependent");
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('Education.fetch') }}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        dependent: dependent,
                    },
                    success: function (result) {
                        $("#" + dependent).html(result);
                    },
                });
            }
        });

        $("#name").change(function () {
            $("#education_subject").val("");
            $("#education_subject_code").val("");
        });

        $("#education_subject").change(function () {
            $("#education_subject_code").val("");
        });

        // $('#district').change(function() {
        //     $('#city').val('');
        //     $('#zipcode').val('');
        // });

        // $('#district').change(function() {
        //     $('#zipcode').val('');
        // });
    });
}
