@if (Session::has('message_update'))
<script>
    toastr.success("{!! Session::get('message_update') !!}");
</script>
@endif
