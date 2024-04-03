@props(['div_class', 'label_for', 'lable_class', 'label_name', 'select_class', 'select_name', 'select_id'])


<div class="form-group {{ $div_class }}">
    <label for="{{ $label_for }}" class="{{ $lable_class }} col-form-label">{{ $label_name }}</label>
    <select class="form-control {{ $select_class }}" name="{{ $select_name }}" id="{{ $select_id }}">
        {{ $slot }}
    </select>
</div>

{{--
<x-form.form-group-label-select div_class="col-sm-3" label_for="sidebar_logo"
lable_class="required" label_name="Sidebar logo Enable/Disable" select_class=""
select_name="sidebar_logo" select_id="">
<option>Enable</option>
<option>Disable</option>
</x-form.form-group-label-select>
--}}
