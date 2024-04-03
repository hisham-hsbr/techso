        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b> Version</b> {{ $application->data['app_version'] }}
            </div>
            <strong>Copyright &copy; {{ $developer->data['starting_year'] }}-<?php echo date('Y'); ?> <a
                    href="{{ $developer->data['website'] }}" target="_blank">{{ $developer->data['name'] }}</a>.</strong>
            All rights reserved.
        </footer>
