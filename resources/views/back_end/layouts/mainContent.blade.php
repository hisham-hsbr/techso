<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                @if (Auth::user()->settings['card_header'] == 1)
                    <div class="card card-primary">
                @endif


                @if (Auth::user()->settings['card_header'] == 1)
                    <div class="card-header">
                        <h3 class="card-title">@yield('actionTitle')</h3>


                        <div class="card-tools">

                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endif
                {{-- -------- --}}
                <div class="card-body">
                    @section('mainContent')
                    @show
                </div>
                <!-- /.card-body -->
                @if (Auth::user()->settings['card_footer'] == 1)
                    <div class="card-footer">
                        @yield('actionFooter')
                    </div>
                @endif
                <!-- /.card-footer-->
                @if (Auth::user()->settings['card_header'] == 1)
            </div>
            @endif
            <!-- /.card -->
        </div>
    </div>
    </div>
</section>
