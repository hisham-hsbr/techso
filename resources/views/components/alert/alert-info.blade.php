@props(['model_title', 'icon_class', 'model_class'])
<a type="button"><i class="{{ $icon_class }}" data-toggle="modal" data-target="#modal-default"></i></a>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog {{ $model_class }}">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $model_title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- modal-lg --}}
