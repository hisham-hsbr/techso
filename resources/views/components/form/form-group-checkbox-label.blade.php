{{-- @props([
    'label_for',
    'label_name',
    'input_type',
    'input_name',
    'input_class',
    'input_style',
    'input_id',
    'input_value',
    'input_placeholder',
    'input_add',
])
<div class="form-group mb-0">
    <div class="custom-control custom-checkbox">
        <input type="{{ $input_type }}" name="{{ $input_name }}" class="custom-control-input {{ $input_class }}"
            style="{{ $input_style }}" value="{{ $input_value }}" {{ $input_add }} id="{{ $input_id }}">
        <label class="custom-control-label" for="{{ $label_for }}">{{ $label_name }}</label>
    </div>
</div> --}}


@props([
    'div_class',
    'input_class',
    'input_name',
    'input_id',
    'input_style',
    'input_value',
    'label_class',
    'label_for',
    'label_name',
])

<div class="form-group {{ $div_class }}">
    <input type="checkbox" class="form-check-input{{ $input_class }}" name="{{ $input_name }}" id="{{ $input_id }}"
        style="{{ $input_style }}" value="{{ $input_value }}" />
    <label class="form-check-label{{ $label_class }}" for="{{ $label_for }}">{{ $label_name }}</label>
</div>
