<div class="container">

    <div class="section-title" data-aos="zoom-out">
        <h2>Offers</h2>
        <p>What we've done</p>
    </div>

    <ul id="portfolio-flters" class="d-flex justify-content-end" data-aos="fade-up">
        <li data-filter="*" class="filter-active">All</li>
        @foreach ($images_portfolio as $key => $value)
            <li data-filter=".filter-{{ $key }}">{{ $key }}</li>
        @endforeach
    </ul>

    <div class="row portfolio-container" data-aos="fade-up">
        @foreach ($images as $image)
            @if ($image->type == 'portfolio')
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $image->group }}">
                    <div class="portfolio-img"><img src="{{ asset('/storage/' . $image->url) }}" class="img-fluid"
                            alt="portfolio"></div>
                    <div class="portfolio-info">
                        <h4>{{ $image->title }}</h4>
                        <p>{{ $image->group }}</p>
                        <a href="{{ asset('/storage/' . $image->url) }}" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="Samsung Finance"><i
                                class="bx bx-plus"></i></a>
                        <a href="{{ route('portfolio-details', $image->id) }}" class="details-link"
                            title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
            @endif
        @endforeach
        <!--
        <div class="col-lg-4 col-md-6 portfolio-item filter-ad">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/ad2.png') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Finance</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/ad2.png') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Finance"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-4 col-md-6 portfolio-item filter-ad">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/ad3.png') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Finance</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/ad3.png') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Finance"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-4 col-md-6 portfolio-item filter-ad">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/ad4.jpg') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Finance</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/ad4.jpg') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Finance"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-4 col-md-6 portfolio-item filter-ad">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/ad5.jpg') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Finance</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/ad5.jpg') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Finance"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-4 col-md-6 portfolio-item filter-ad">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/ad6.jpg') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Finance</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/ad6.jpg') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Finance"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-4 col-md-6 portfolio-item filter-ad">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/ad7.jpg') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Finance</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/ad7.jpg') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Finance"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-4 col-md-6 portfolio-item filter-ad">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/ad8.jpg') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Finance</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/ad8.jpg') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Finance"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-4 col-md-6 portfolio-item filter-ad">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/ad9.jpg') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Finance</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/ad9.jpg') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Finance"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-4 col-md-6 portfolio-item filter-ad">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/ad10.jpg') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Finance</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/ad10.jpg') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Finance"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-4 col-md-6 portfolio-item filter-ad">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/ad11.jpg') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Finance</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/ad11.jpg') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Finance"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-4 col-md-6 portfolio-item filter-ad">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/ad12.jpg') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Finance</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/ad12.jpg') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Finance"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-4 col-md-6 portfolio-item filter-shop">
            <div class="portfolio-img"><img src="{{ asset('/storage/images/fixancare/portfolio/di1.jpg') }}"
                    class="img-fluid" alt="portfolio"></div>
            <div class="portfolio-info">
                <h4>Shop</h4>
                <p>Ads</p>
                <a href="{{ asset('/storage/images/fixancare/portfolio/di1.jpg') }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox preview-link" title="Shop"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i
                        class="bx bx-link"></i></a> --}}
            </div>
        </div>

    -->

    </div>

</div>
