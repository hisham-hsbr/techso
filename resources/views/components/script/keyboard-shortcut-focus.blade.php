@props(['key', 'button_id', 'type'])
<script>
    document.addEventListener('keydown', function(event) {
                if ($type === 'ctrl')
                    if (event.ctrlKey && event.key.toLowerCase() === '{{ $key }}') {
                        elseif($type === 'alt')
                        if (event.altKey && event.key.toLowerCase() === '{{ $key }}') {
                            elseif($type === 'ctrl&alt')
                            if (event.ctrlKey && event.altKey && event.key.toLowerCase() === '{{ $key }}') {
                                endif
                                event.preventDefault(); // Prevent the default behavior
                                document.getElementById('{{ $button_id }}').focus(); // Focus the input
                            }
                        });
</script>
