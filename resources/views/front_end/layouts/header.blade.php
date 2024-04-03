<div class="container d-flex align-items-center justify-content-between">

    <div class="logo">
        {{-- <h1><a href="index.html">Selecao</a></h1> --}}
        <a href="/"><img src="{{ asset('/storage/images/app/logo_white.png') }}" alt="" width="187"
                height="20" class="img-fluid"></a>
    </div>
    <a href="/job" class="btn btn-warning navbar-btn">Track Job</a>
    <i class="fa-solid fa-magnifying-glass"></i>
    <a href="{{ route('blood-bank.index') }}" class="btn btn-danger navbar-btn">Blood Bank</a>
    <nav id="navbar" class="navbar">
        @include('front_end.layouts.top-navbar-links')

    </nav><!-- .navbar -->

</div>
