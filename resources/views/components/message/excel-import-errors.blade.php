@if (Session::has('import_errors'))
    @foreach (Session::get('import_errors') as $failure)
        {{-- <div class="alert alert-danger" role="alert">
            {{ $failure->errors()[0] }} at line no - {{ $failure->row() }}
        </div> --}}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $failure->errors()[0] }} at line no - {{ $failure->row() }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif
