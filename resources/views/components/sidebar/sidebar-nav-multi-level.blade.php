@props(['head', 'href', 'menu_icon', 'drop_icon', 'menu_open', 'active'])

<ul class="nav nav-treeview">
    <li class="nav-item {{ $menu_open }}">
        <a href="{{ $href }}" class="nav-link {{ $active }}">
            <i class="nav-icon {{ $menu_icon }}"></i>
            <p>{{ $head }}
                <i class="right {{ $drop_icon }}"></i>
            </p>
        </a>
        {{ $slot }}
    </li>
</ul>
