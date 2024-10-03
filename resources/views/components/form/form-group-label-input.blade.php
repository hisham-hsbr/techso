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
])
<div class="form-group">
    <label for="{{ $label_for }}">{{ $label_name }}</label>
    <input type="{{ $input_type }}" name="{{ $input_name }}" class="form-control {{ $input_class }}"
        style="{{ $input_style }}" id="{{ $input_id }}" value="{{ $input_value }}"
        placeholder="{{ $input_placeholder }}">
</div>


{{--
<x-form.form-group-label-input label_for="code" label_name="Code" input_type="text" input_name="code" input_class="" input_style=""
    input_id="code" input_value="{{ old('code') }}" input_placeholder="Enter code" />
--}}

@props([
    'div_class',
    'label_for',
    'lable_class',
    'label_name',
    'input_type',
    'input_name',
    'input_id',
    'input_style',
    'input_class',
    'input_value',
    'input_placeholder',
    'input_onkeyup' => null, // Adding the onkeyup event as an optional prop
])

<div class="form-group {{ $div_class }}">
    <label for="{{ $label_for }}" class="{{ $lable_class }} col-form-label">{{ $label_name }}</label>
    <input type="{{ $input_type }}" name="{{ $input_name }}" id="{{ $input_id }}" style="{{ $input_style }}"
        class="form-control{{ $input_class }}" value="{{ $input_value }}" placeholder="{{ $input_placeholder }}"
        @if ($input_onkeyup) onkeyup="{{ $input_onkeyup }}" @endif>
</div>


{{--
<x-form.form-group-label-input div_class="" label_for="" lable_class="" label_name="" input_type="" input_name=""
    input_id="" input_style="" input_class="" input_value="" input_placeholder="" />
     --}}
