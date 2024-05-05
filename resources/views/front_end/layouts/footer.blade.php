<footer id="footer">
    <div class="container">
        <x-app.application-logo-white width="112" />
        </p>
        <div class="social-links">
            {{-- <a href="#" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a> --}}
            <a href="https://www.facebook.com/fixancarebdk" target="_blank" class="facebook"><i
                    class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/fixancarebdk/" target="_blank" class="instagram"><i
                    class="bx bxl-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCPqsYqs2quVWLcBpEP2228w" target="_blank" class="youtube"><i
                    class="bx bxl-youtube"></i></a>
            {{-- <a href="#" target="_blank" class="google-plus"><i class="bx bxl-skype"></i></a> --}}
            {{-- <a href="#" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
        </div>
        <div class="copyright">
            <p>Copyright &copy; {{ $developer->data['starting_year'] }}-<?php echo date('Y'); ?> <a
                    href="{{ $developer->data['website'] }}" target="_blank">{{ $developer->data['name'] }}</a>.</p>
            All rights reserved.
        </div>

    </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>


<!-- Vendor JS Files -->
<script src="{{ asset('front_end_links/selecao/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('front_end_links/selecao/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front_end_links/selecao/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('front_end_links/selecao/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front_end_links/selecao/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('front_end_links/selecao/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('front_end_links/selecao/assets/js/main.js') }}"></script>

<!--bootstrap -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

@section('footer-links')
@show
