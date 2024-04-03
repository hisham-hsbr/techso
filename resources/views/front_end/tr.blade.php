<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $application->data['app_name'] }} Track</title>
    <!-- Favicons -->
    <x-app.application-favicon />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('back_end_links/adminLinks/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back_end_links/adminLinks/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="{{ asset('back_end_links/adminLinks/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('back_end_links/adminLinks/plugins/toastr/toastr.min.css') }}">

</head>

<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            {{-- sign_mini_logo --}}
            @if ($logo->data['sign_mini_logo'] == 1)
                <x-app.application-logo-mini width="150" />
            @endif
            {{-- sign_logo --}}
            @if ($logo->data['sign_logo'] == 1)
                <x-app.application-logo-black width="265" />
            @endif
        </div>
        <!-- User name -->

        <div class="input-group">
            <label for="type" class="form-label">Search By</label>
            <div class="col-sm-9">
                <select class="form-select" id="type" onchange="showOrHide()" name="type">
                    <option selected value="job_number">Job Number</option>
                    <option value="phone_number">Phone Number</option>
                </select>
            </div>
        </div>


        <div id="jobNumberShow" style="visibility:visible">
            <div class="lockscreen-name"></div>

            <!-- /.lockscreen-item -->
            <div class="input-group">
                <!--<form class="lockscreen-credentials" action="/home" method="GET">-->
                <form class="lockscreen-credentials" action="{{ url('/track-job-number') }}" method="GET">
                    <div class="input-group">
                        <span class="input-group-text">F-</span>
                        <input type="number" class="form-control" name="job_number" placeholder="Enter job number">
                        <div class="input-group-append">
                            <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="phoneNumberShow" style="visibility:hidden">
            <div class="lockscreen-name"></div>

            <!-- /.lockscreen-item -->
            <div class="input-group">
                <!--<form class="lockscreen-credentials" action="/home" method="GET">-->
                <form class="lockscreen-credentials" action="{{ url('/track-phone-number') }}" method="GET">
                    <div class="input-group">
                        <input type="number" class="form-control" name="phone_number" placeholder="Phone number">
                        <div class="input-group-append">
                            <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="lockscreen-footer text-center">
            <strong>Copyright &copy; 2020-<?php echo date('Y'); ?> <a href="https://www.hsbr-apps.co/"
                    target="_blank">HSBR-Apps</a>.</strong>
            All rights reserved.
        </div>
    </div>
    <!-- /.center -->

    <x-message.message />

    <script>
        function myFunction() {
            alert("I am an alert box!");
        }
    </script>

    <script>
        function showOrHide() {
            var status = document.getElementById("type");

            if (status.value == "phone_number") {
                document.getElementById("phoneNumberShow").style.visibility = "visible";
                document.getElementById("jobNumberShow").style.visibility = "hidden";
            } else {
                document.getElementById("phoneNumberShow").style.visibility = "hidden";
                document.getElementById("jobNumberShow").style.visibility = "visible";
            }
        }
    </script>

    <!-- jQuery -->
    <script src="{{ asset('back_end_links/adminLinks/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('back_end_links/adminLinks/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @if (Session::has('message_store'))
        <script>
            toastr.success("{!! Session::get('message_store') !!}");
        </script>
    @endif

    @if (Session::has('message_update'))
        <script>
            toastr.success("{!! Session::get('message_update') !!}");
        </script>
    @endif

    @if ($errors->count() > 0)
        @foreach ($errors->all() as $error)
            <script>
                toastr.error("{{ $error }}");
            </script>
        @endforeach
    @endif
    <!-- SweetAlert2 -->
    <script src="{{ asset('back_end_links/adminLinks/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('back_end_links/adminLinks/plugins/toastr/toastr.min.js') }}"></script>
</body>

</html>
