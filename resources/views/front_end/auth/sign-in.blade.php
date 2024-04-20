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
                <a href="index.html"><img src="{{ asset('/storage/images/app/logo_white.png') }}" alt=""
                        width="187" height="20" class="img-fluid"></a>
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
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Inner Page</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Inner Page</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3 text-start">
                                <label class="form-label" for="email">Email address</label>
                                <div class="form-icon-container">
                                    <input class="form-control form-icon-input" id="email" name="email"
                                        type="email" value="" required autofocus autocomplete="username"
                                        placeholder="Enter Email" /><span
                                        class="fas fa-user text-900 fs--1 form-icon"></span>
                                </div>
                            </div>
                            <div class="mb-3 text-start">
                                <label class="form-label" for="password">Password</label>
                                <div class="form-icon-container">
                                    <input class="form-control form-icon-input" id="password" type="password"
                                        name="password" required autocomplete="current-password"
                                        placeholder="Password" /><span
                                        class="fas fa-key text-900 fs--1 form-icon"></span>
                                </div>
                            </div>
                            <div class="row flex-between-center mb-7">
                                <div class="col-auto">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" id="basic-checkbox" type="checkbox"
                                            checked="checked" />
                                        <label class="form-check-label mb-0" for="basic-checkbox">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-auto"><a class="fs--1 fw-semi-bold"
                                        href="{{ route('password.request') }}">Forgot
                                        Password?</a></div>
                            </div>
                            <button class="btn btn-primary w-100 mb-3">Sign In</button>
                            <div class="text-center"><a class="fs--1 fw-bold" href="/register">Create an account</a>
                            </div>
                            <div class="text-center"><a class="fs--1 fw-bold" href="/">Back</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('front_end.layouts.footer')

</body>

</html>
