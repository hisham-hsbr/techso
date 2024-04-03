<!DOCTYPE html>
<html lang="en">

<head>
    @include('back_end.layouts.head')
</head>

<body
    class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed text-sm layout-footer-fixed
    @if (Auth::user()->settings['personal_settings'] == 1) {
        @if (Auth::user()->settings['sidebar_collapse'] == 1) sidebar-collapse @endif
        @if (Auth::user()->settings['dark_mode'] == 1) dark-mode @endif
    }
    @else{
        @if ($default_layout->data['sidebar_collapse'] == 1) sidebar-collapse @endif
        @if ($default_layout->data['dark_mode'] == 1) dark-mode @endif}
    @endif
    ">
    <div id="loading"></div>
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('back_end.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
            @include('back_end.layouts.sidebar')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('back_end.layouts.header')

            <!-- Main content -->
            @include('back_end.layouts.mainContent')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('back_end.layouts.footer')

        <!-- Control Sidebar -->
        @include('back_end.layouts.sidebarControl')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('back_end.layouts.footerLinks')
    <script>
        var loader = document.getElementById("loading");

        window.addEventListener("load", function() {
            loader.style.display = "none";
        })
    </script>
</body>

</html>
