<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $page->data['page_title_prefix'] }} : @yield('PageHead') {{ $page->data['page_title_suffix'] }}</title>

<x-app.application-favicon />


<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->

<link rel="stylesheet" href="{{ asset('back_end_links/adminLinks/plugins/fontawesome-free/css/all.min.css') }}">
{{-- page Loader --}}
<link rel="stylesheet" href="{{ asset('pageloader/style.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet"
    href="{{ asset('back_end_links/adminLinks/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('back_end_links/adminLinks/dist/css/adminlte.min.css') }}">
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://kit.fontawesome.com/dd3a80201f.js" crossorigin="anonymous"></script>
<!-- dynamic Dependent Dropdown List js -->
{{-- <script src="{{ asset('js/dynamicDependent.js') }}"></script> --}}
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('back_end_links/adminLinks/plugins/toastr/toastr.min.css') }}">






@section('headLinks')
@show
