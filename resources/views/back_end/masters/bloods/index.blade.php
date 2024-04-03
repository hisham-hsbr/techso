@extends('back_end.layouts.app')

@section('PageHead', 'Bloods')

@section('PageTitle', 'Bloods')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/blood">Bloods</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminLinks/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLinks/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLinks/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('actionTitle', 'Bloods Index')
@section('mainContent')
    <h1>blood index</h1>

@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')

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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminLinks/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                @can('Table Buttons Blood')
                    "buttons": [
                        @can('Table Export Excel Blood')
                            "excel"
                        @endcan ,
                        @can('Table Export PDF Blood')
                            "pdf"
                        @endcan ,
                        @can('Table Print Blood')
                            "print",
                        @endcan
                        @can('Table Column Hide Blood')
                            "colvis"
                        @endcan
                    ]
                @endcan
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
