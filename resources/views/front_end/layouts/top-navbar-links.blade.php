<ul>
    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
    @if ($default_front_end_layout->data['about_section'] == 1)
        <li><a class="nav-link scrollto" href="#about">About</a></li>
    @endif
    @if ($default_front_end_layout->data['features_section'] == 1)
        <li><a class="nav-link scrollto" href="#features">features</a></li>
    @endif
    @if ($default_front_end_layout->data['services_section'] == 1)
        <li><a class="nav-link scrollto" href="#services">Services</a></li>
    @endif
    @if ($default_front_end_layout->data['portfolio_section'] == 1)
        <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
    @endif
    @if ($default_front_end_layout->data['pricing_section'] == 1)
        <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
    @endif
    @if ($default_front_end_layout->data['team_section'] == 1)
        <li><a class="nav-link scrollto" href="#team">Team</a></li>
    @endif
    {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
        </ul>
    </li> --}}
    @if ($default_front_end_layout->data['contact_section'] == 1)
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
    @endif
</ul>
<i class="bi bi-list mobile-nav-toggle"></i>
