@extends('back_end.layouts.app')

@section('PageHead', 'Product Create')

@section('PageTitle', 'Product Create')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headLinks')
    <!-- Select2 -->
    <x-links.header-links-select-two />
    <x-links.header-link-dual-list-box />
@endsection

@section('actionTitle', 'Product Create')
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            @can('Product Create')
                <div class="col-md-10">
                    <form role="form" action="{{ route($route_name . '.store') }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}

                </div>


                <div class="col-12 col-sm-12">

                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-general" role="tabpanel"
                                aria-labelledby="custom-tabs-one-general-tab">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">Puchase Details</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Date</span>
                                                    </div>
                                                    <input type="date" name="date" id="date" class="form-control"
                                                        value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Purchase Number#</span>
                                                    </div>
                                                    <input type="text" name="purchase_number" id="purchase_number"
                                                        class="form-control" value="TSS-{{ $list_number }}" readonly
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Voucher Type</span>
                                                    </div>
                                                    <select name="voucher_type_id" class="form-control select2">
                                                        <option disabled selected>--Voucher Type--</option>
                                                        @foreach ($voucher_types as $voucher_type)
                                                            <option
                                                                {{ $voucher_type->name == 'Purchase Invoice' ? 'selected' : '' }}
                                                                value="{{ $voucher_type->id }}">
                                                                {{ $voucher_type->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Account</span>
                                                    </div>
                                                    <select name="account_id" class="form-control select2">
                                                        <option disabled selected>-- Select account --</option>
                                                        @foreach ($accounts as $account)
                                                            <option {{ old('account_id') == $account->id ? 'selected' : '' }}
                                                                value="{{ $account->id }}">
                                                                {{ $account->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Supplier Invoice#</span>
                                                    </div>
                                                    <input type="text" name="supplier_invoice" class="form-control"
                                                        value="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Narration</span>
                                                    </div>
                                                    <input type="text" name="voucher_narration" class="form-control"
                                                        value="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Remarks</span>
                                                    </div>
                                                    <input type="text" name="voucher_remarks" class="form-control"
                                                        value="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group mb-3 input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Description</span>
                                                    </div>
                                                    <input type="text" name="voucher_description" class="form-control"
                                                        value="" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="card">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Account</th>
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
                                                <td><input type="text" name="receipt_amount[]" class="form-control-sm">
                                                </td>
                                                <td><input type="text" name="line_description[]" class="form-control-sm">
                                                </td>
                                                <td style="text-align: :center"><a class="btn btn-danger removeJob">-</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <span><a style="text-align: :right" class="btn btn-info addRowReceipt">add</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="card-body">
                    <!-- /.card-header -->
                    <div class="col-sm-10 pl-5 pt-2">
                        <input type="checkbox" class="form-check-input" name="status" value="1" id="status"
                            @if (Auth::user()->settings['default_status'] == 1) {{ 'checked' }} @endif />
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="">
                    @can('Product Create')
                        <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
                    @endcan
                    <a type="button" href="{{ route($route_name . '.index') }}"
                        class="btn btn-warning float-right ml-1">Back</a>
                </div>
                <!-- /.card-footer -->
                </form>
            @endcan

        </div>
    </div>


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
            var trAccount =
                `
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
                <td style="text-align: :center"><a  class="btn btn-danger removeJob">-</a></td>
                </tr>
                `;

            $('.tbodyJob').append(trAccount);

            $('.select2').select2();

        };
        $('.tbodyJob').on('click', '.removeJob', function() {
            $(this).parent().parent().remove();
        });
    </script>



@endsection
