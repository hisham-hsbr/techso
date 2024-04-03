@if ($errors->count() > 0)
@foreach ($errors->all() as $error)
    <script>
        toastr.error("{{ $error }}");
    </script>
@endforeach
@endif
