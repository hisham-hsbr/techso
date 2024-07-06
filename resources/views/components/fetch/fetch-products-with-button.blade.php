<script>
    $(document).ready(function() {
        $('#reload-button').click(function() {
            $.ajax({
                url: '{{ route('fetch.products') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var selectBox = $('#product_id');
                    selectBox.empty();
                    selectBox.append(
                        '<option disabled selected value="">-- Select Product --</option>'
                    );
                    $.each(data, function(index, item) {
                        selectBox.append('<option value="' + item.id + '">' + item
                            .name + '</option>');
                    });
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                    toastr.info("Product List Updating .....");
                },
                error: function(xhr, status, error) {
                    // console.error(error);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-center",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                    toastr.error("Product List Updating error .....");
                }
            });
        });

        // Optional: Load options on page load
        $('#reload-button').trigger('click');
    });
</script>
