<!DOCTYPE html>
<html lang="en">

<head>
    @include('front_end.layouts.head')
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
        @include('front_end.layouts.header')
    </header>
    <!-- End Header -->

    @if ($default_front_end_layout->data['home_carousel_section'] == 1)
        <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
            @include('front_end.layouts.sections.home-carousel')
        </section>
    @endif


    <main id="main">

        @if ($default_front_end_layout->data['about_section'] == 1)
            <section id="about" class="about">
                @include('front_end.layouts.sections.about')
            </section>
        @endif

        @if ($default_front_end_layout->data['features_section'] == 1)
            <section id="features" class="features">
                @include('front_end.layouts.sections.features')
            </section>
        @endif

        @if ($default_front_end_layout->data['call_to_action_section'] == 1)
            <section id="cta" class="cta">
                @include('front_end.layouts.sections.call-to-action')
            </section>
        @endif

        @if ($default_front_end_layout->data['services_section'] == 1)
            <section id="services" class="services">
                @include('front_end.layouts.sections.services')
            </section>
        @endif

        @if ($default_front_end_layout->data['portfolio_section'] == 1)
            <section id="portfolio" class="portfolio">
                @include('front_end.layouts.sections.portfolio')
            </section>
        @endif

        @if ($default_front_end_layout->data['testimonials_section'] == 1)
            <section id="testimonials" class="testimonials">
                @include('front_end.layouts.sections.testimonials')
            </section>
        @endif

        @if ($default_front_end_layout->data['pricing_section'] == 1)
            <section id="pricing" class="pricing">
                @include('front_end.layouts.sections.pricing')
            </section>
        @endif

        @if ($default_front_end_layout->data['faq_section'] == 1)
            <section id="faq" class="faq">
                @include('front_end.layouts.sections.faq')
            </section>
        @endif

        @if ($default_front_end_layout->data['team_section'] == 1)
            <section id="team" class="team">
                @include('front_end.layouts.sections.team')
            </section>
        @endif

        @if ($default_front_end_layout->data['contact_section'] == 1)
            <section id="contact" class="contact">
                @include('front_end.layouts.sections.contact')
            </section>
        @endif

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('front_end.layouts.footer')
    <!-- End Footer -->

</body>

</html>
