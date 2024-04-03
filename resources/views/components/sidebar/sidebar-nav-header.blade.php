@props(['head'])

<li {{ $attributes->merge(['class' => 'nav-header']) }}>{{ $head }}</li>
