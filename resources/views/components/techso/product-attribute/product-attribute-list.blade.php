@props(['product_attribute'])



<optgroup label="{{ $product_attribute->name }}">
    @foreach ($product_attribute->productAttributeType as $child)
        <x-techso.product-attribute.product-attribute-list-option :product_attribute_child="$child" />
    @endforeach
</optgroup>
<option value="{{ $product_attribute->id }}">MAIN > {{ $product_attribute->name }}</option>
