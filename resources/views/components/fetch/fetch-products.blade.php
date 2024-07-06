<script>
    $(document).ready(function() {
        function loadData() {
            $.ajax({
                url: '{{ route('fetch.products') }}',
                method: 'GET',
                success: function(data) {
                    let selectBox = $('#product_id');
                    selectBox.empty();
                    selectBox.append('<option value="">-- Select Product --</option>');
                    data.forEach(item => {
                        selectBox.append('<option value="' + item.id + '">' + item.name +
                            '</option>'
                        ); // Adjust item.id and item.name as per your data structure
                    });
                },
                error: function() {
                    alert('Failed to fetch data.');
                }
            });
        }

        // Load data initially
        loadData();

        // Set up a timer to reload data every 30 seconds (for example)
        setInterval(loadData, 30000);
    });
</script>
