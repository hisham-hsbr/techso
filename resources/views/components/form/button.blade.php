@props(['button_type', 'button_oneclick', 'button_icon', 'button_name', 'button_class'])
<button type="{{ $button_type }}" onClick="{{ $button_oneclick }}" class="{{ $button_class }} float-right ml-1 mb-1">
    <i class="{{ $button_icon }}" aria-hidden="true"></i> {{ $button_name }}
</button>


{{-- href="javascript:void()" --}}

{{-- <x-form.a-button button_type="submit" button_class="btn btn-primary"
button_icon="fa fa-add"
button_name="Add me" /> --}}
