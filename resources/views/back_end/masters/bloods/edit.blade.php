@extends('admin.layouts.app')

@section('PageHead', 'Bloods-Update')

@section('PageTitle', 'Bloods')
@section('pageNavHeader')
<li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
<li class="breadcrumb-item"><a href="/admin/blood">Setting</a></li>
<li class="breadcrumb-item active">Update</li>
@endsection
@section('headLinks')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('adminLinks/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminLinks/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('actionTitle', 'Bloods Update')
@section('mainContent')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

        </div>
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card">

                <!-- /.card-header -->
                <!-- form start -->

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Bloods Update</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('blood.update', $bloods->id) }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ $bloods->name }}" class="form-control"
                                        id="name" placeholder="Enter Blood Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" name="description" value="{{ $bloods->description }}"
                                        class="form-control" id="description" placeholder="Enter settings Description">
                                </div>
                            </div>
                            <div class="col-sm-10 pl-5 pt-2">
                                <input type="checkbox" class="form-check-input" name="status" value="1" id="status"
                                    @if($bloods->status == 1)
                                {{ 'checked' }}
                                @endif>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            @can('Edit Blood')
                            <button type="submit" class="btn btn-primary float-right ml-1">Update</button>
                            @endcan
                            <a type="button" href="{{ route('blood.index') }}"
                                class="btn btn-warning float-right ml-1">Back</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->

    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->



@endsection
@section('actionFooter', 'Footer')

@section('footerLinks')
<!-- Select2 -->
<script src="{{ asset('adminLinks/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
</script>

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

{{-- validate --}}

<!-- jquery-validation -->
<script src="{{ asset('adminLinks/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('adminLinks/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script>
    $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    route('settings.store');
                }
            });
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    parent: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please Enter a Settings Name",
                    },
                    parent: {
                        required: "Please Enter a Parent Settings",
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
</script>
@endsection
