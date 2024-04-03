<!DOCTYPE html>
<html lang="en">


<head>
    @include('front_end.blood_bank.layouts.head')
</head>

<body>

    <div id="preloader">
        <span class="margin-bottom"><img src="{{ asset('front_end_links/blood_bank/v_2/images/loader.gif') }}"
                alt="" /></span>
    </div>

    <header class="main-header clearfix" data-sticky_header="true">
        @include('front_end.blood_bank.layouts.header')
    </header>

    @section('main-content')
    @show

    <!-- START FOOTER  -->

    @include('front_end.blood_bank.layouts.footer')

</body>

</html>
