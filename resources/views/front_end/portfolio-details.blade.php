<!DOCTYPE html>
<html lang="en">

<head>
    @include('front_end.layouts.head')
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                {{-- <h1><a href="index.html">Selecao</a></h1> --}}
                <a href="/"><img src="{{ asset('/storage/images/app/logo_white.png') }}" alt="" width="187"
                        height="20" class="img-fluid"></a>
            </div>
            <button class="btn btn-warning navbar-btn">Track Job</button>
            <nav id="navbar" class="navbar">
                @include('front_end.layouts.top-navbar-links')
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Portfolio Details</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Portfolio Details</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                <img src="{{ asset('/storage/' . $image->url) }}" alt="" />
                                {{-- <div class="portfolio-img"><img src="{{ asset('/storage/' . $image->url) }}"
                                        class="img-fluid" alt="portfolio"></div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>More Portfolio Details</h3>
                            <ul>
                                <li>
                                    <strong>Code</strong>: {{ $image->code }}
                                </li>
                                <li>
                                    <strong>Title</strong>: {{ $image->title }}
                                </li>
                                <li>
                                    <strong>Name</strong>: {{ $image->name }}
                                </li>
                                <li>
                                    <strong>Posted Date</strong>: {{ date('d-M-Y', strtotime($image->posted_date)) }}
                                </li>
                                @if (isset($image->starting_date))
                                    <li>
                                        <strong>Starting Date</strong>:
                                        {{ date('d-M-Y', strtotime($image->starting_date)) }}
                                    </li>
                                @endif
                                @if (isset($image->ending_date))
                                    <li>
                                        <strong>Ending Date</strong>:
                                        {{ date('d-M-Y', strtotime($image->ending_date)) }}
                                    </li>
                                @endif
                                <li>
                                    <strong>Group</strong>: {{ $image->group }}
                                </li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>Details About {{ $image->title }}</h2>
                            <p>
                                {{ $image->description }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 cta-btn-container text-center">
                        For More details -
                        <a class="cta-btn align-middle pr-3 pr-2"
                            href="https://wa.me/919020880088?text=I'm%20interested%20to%20know%20%20about%20this. {{ route('portfolio-details', $image->id) }}"><i
                                class="bi bi-whatsapp">
                                WhatsApp</i></a>

                        <a class="cta-btn align-middle" href="tel:+919020880088"><i class="bi bi-telephone">
                                Call</i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('front_end.layouts.footer')

</body>

</html>
