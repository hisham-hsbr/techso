<div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

    <!-- Slide 1 -->
    <div class="carousel-item active">
        <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">Welcome to <a href="index.html"><img
                        src="{{ asset('/storage/images/app/logo_white.png') }}" alt="" width="187"
                        height="20" class="img-fluid"></a></h2>
            <p class="animate__animated fanimate__adeInUp"></p>
            {{-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
        </div>
    </div>

    <!-- Slide 2 -->
    @foreach ($images as $image)
        @if ($image->type == 'carousel')
            <div class="carousel-item">
                <div class="carousel-container">
                    <img src="{{ asset('/storage/' . $image->url) }}" alt="" width="1050" height="280">
                    {{-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
                </div>
            </div>
        @endif
    @endforeach
    {{-- <!-- Slide 3 -->
    <div class="carousel-item">
        <div class="carousel-container">
            <img src="{{ asset('/storage/images/fixancare/carousel/c2.jpg') }}" alt="f1" width="1030"
                height="">>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                More</a>
        </div>
    </div>
    <!-- Slide 4 -->
    <div class="carousel-item">
        <div class="carousel-container">
            <img src="{{ asset('/storage/images/fixancare/carousel/c3.png') }}" alt="f1" width="1030"
                height="280">>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                More</a>
        </div>
    </div> --}}

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
    </a>

</div>

<svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
    viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
    </defs>
    <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
    </g>
    <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
    </g>
    <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
    </g>
</svg>

{{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('/storage/images/fixancare/home.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('/storage/images/fixancare/c1.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('/storage/images/fixancare/c2.jpg') }}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> --}}
