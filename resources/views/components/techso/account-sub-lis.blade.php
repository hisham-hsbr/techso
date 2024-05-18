@props(['accountc'])



<optgroup label="{{ $accountc->name1 }}">
    @foreach ($accountc->children as $child )
    <x-account-opt :accounto="$child" />
    @endforeach
</optgroup>
<option value="{{ $accountc->id }}">MAIN > {{ $accountc->name1 }}</option>
