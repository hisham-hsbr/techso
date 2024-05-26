@extends('back_end.layouts.app')

@section('PageHead', 'Service Create')

@section('PageTitle', 'Service Create')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headLinks')
    <!-- Select2 -->
    <x-links.header-links-select-two />
    <x-links.header-link-dual-list-box />


    <!--My Styles -->
    <link href="{{ asset('css/myCss.css') }}" rel="stylesheet">

    <link href="{{ asset('css/treeview.css') }}" rel="stylesheet">

    <style>
        div.scrole-tree {
            background-color: rgb(214, 229, 244);
            width: 100%;
            height: 210px;
            overflow: scroll;
        }

        /* div.scrole-form {
                                                                    background-color: rgb(243, 248, 252);
                                                                    width: 100%;
                                                                    height: 310px;
                                                                    overflow: scroll;
                                                                } */
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@section('actionTitle', 'Service Create')
@section('mainContent')

    <div class="container-fluid">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <!-- form start -->

                <form role="form" action="{{ route($route_name . '.store') }}" method="post"
                    enctype="multipart/form-data" id="quickForm">
                    {{ csrf_field() }}


                    <div class="d-flex flex-row-reverse pb-1">
                        @can('Create Receipt')
                            <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
                        @endcan
                        <a type="button" href="" class="btn btn-warning float-right ml-1">Back</a>
                    </div>

                    {{-- <br> --}}
                    <div class="card card-primary card-tabs p-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Date</span>
                                    </div>
                                    <input type="date" name="dob" class="form-control" value="" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Number</span>
                                    </div>
                                    <input type="text" name="voucher_number" class="form-control" value=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Voucher Type</span>
                                    </div>
                                    <select name="voucherType" class="form-control select2">
                                        <option disabled selected>--Voucher Type--</option>
                                        {{-- @foreach ($voucherTypes as $voucherType)
                                            <option {{ old('voucherType') == $voucherType->id ? 'selected' : '' }}
                                                value="{{ $voucherType->id }}">{{ $voucherType->name1 }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">currencies</span>
                                    </div>
                                    <select name="currency_id" class="form-control select2">
                                        <option disabled selected>--currencies--</option>
                                        {{-- @foreach ($currencies as $currency)
                                            <option {{ old('currencies') == $currency->id ? 'selected' : '' }}
                                                value="{{ $currency->id }}">{{ $currency->name1 }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Narration</span>
                                    </div>
                                    <input type="text" name="voucher_narration" class="form-control" value=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Remarks</span>
                                    </div>
                                    <input type="text" name="voucher_remarks" class="form-control" value=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Description</span>
                                    </div>
                                    <input type="text" name="voucher_description" class="form-control" value=""
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="table-responsive-sm scrole-tree">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Account</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="tbodyJob">
                                {{-- <tr>
                                      <td>1</td>
                                      <td>Anna</td>
                                      <td>Pitt</td>
                                      <td>35</td>
                                    </tr>
                                    <tr>
                                      <td>1</td>
                                      <td>Anna</td>
                                      <td>Pitt</td>
                                      <td>35</td>
                                    </tr> --}}
                                <tr>
                                    <td>
                                        <select name="account_id[]" class="form-control-sm select2">
                                            <option disabled selected>--Accounts--</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="receipt_amount[]" class="form-control-sm"></td>
                                    <td><input type="text" name="line_description[]" class="form-control-sm"></td>
                                    <td><input type="text" name="receipt_amount[]" class="form-control-sm"></td>
                                    <td><input type="text" name="line_description[]" class="form-control-sm"></td>
                                    <td style="text-align: :center"><a class="btn btn-danger removeJob">-</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <span><a style="text-align: :right" class="btn btn-info addRowReceipt">add</a></span>
                    </div>



                </form>

            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->



@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')



    <x-message.message />

    <x-links.footer-link-select-two />
    <x-script.dual-list-box />

    <x-links.footer-link-jquery-validation />

    <x-techso.validation.customer-jquery-validation />

    <script type="text/javascript">
        $('.addRowReceipt').on('click', function() {
            addRowReceipt();
        });

        function addRowReceipt() {
            var trAccount = '<tr>' +
                '<td>' +
                '<select name="account_id[]" class="form-control-sm select2">' +
                '<option disabled selected>--Accounts--</option>' +
                '@foreach ($products as $product)' +
                '<option value="{{ $product->id }}">' +
                '{{ $product->name1 }}' +
                ' </option>' +
                '@endforeach' +
                '</select>' +
                '</td>' +
                '<td><input type="text" name="receipt_amount[]" class="form-control-sm"></td>' +
                '<td><input type="text" name="line_description[]" class="form-control-sm"></td>' +
                '<td style="text-align: :center"><a  class="btn btn-danger removeJob">-</a></td>' +
                '</tr>';

            $('.tbodyJob').append(trAccount);

            $('.select2').select2();

        };
        $('.tbodyJob').on('click', '.removeJob', function() {
            $(this).parent().parent().remove();
        });
    </script>

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
                    route('permissions.store');
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
                    action: {
                        required: "Please Enter a Action Name",
                    }
                    description: {
                        required: "Please Enter a Description Name",
                    }
                    parent: {
                        required: "Please Enter a Parent Name",
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
