@props(['head', 'href', 'href2', 'icon', 'icon2'])
<li class="nav-item">
    <a href="{{ $href }}" class="nav-link">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $head }}
            <i class="right {{ $icon2 }}"></i>
            {{-- <i class="right fas fa-angle-left"></i> --}}
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ $href2 }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
            </a>
        </li>
    </ul>
</li>
