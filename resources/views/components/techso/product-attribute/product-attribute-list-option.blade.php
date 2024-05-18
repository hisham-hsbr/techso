@props(['product_attribute_child'])


{{-- @if ($product_attribute_child->master !== 'SINGLE')
    <option value="{{ $product_attribute_child->id }}">{{ $product_attribute_child->name1 }}</option>
@endif --}}
<option value="{{ $product_attribute_child->id }}">{{ $product_attribute_child->name }}</option>
@foreach ($product_attribute_child->productAttributeType as $child)
    <x-techso.product-attribute.product-attribute-list-option :product_attribute_child="$child" />
@endforeach
