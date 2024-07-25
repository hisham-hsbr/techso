@props(['button_type', 'button_oneclick', 'button_icon', 'button_name', 'href', 'button_class'])
<a " onClick="{{ $button_oneclick }}" class="{{ $button_class }} float-right ml-1 mb-1"
    href="{{ $href }}">
    <i class="{{ $button_icon }}" aria-hidden="true"></i> {{ $button_name }}
</a>


{{-- href="javascript:void()" --}}

{{-- <x-form.a-button button_type="submit" button_class="btn btn-primary" href="{{ route('users.create') }}"
button_icon="fa fa-add"
button_name="Add me" /> --}}
