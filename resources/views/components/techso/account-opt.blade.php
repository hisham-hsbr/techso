@props(['accounto'])


@if ($accounto->master !=="SINGLE")
<option value="{{ $accounto->id }}">{{ $accounto->name1 }}</option>
@endif
@foreach ($accounto->children as $child )
<x-account-opt :accounto="$child" />
@endforeach
