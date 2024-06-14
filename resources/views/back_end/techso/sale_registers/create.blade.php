@extends('back_end.layouts.app')

@section('PageHead')
    {{ $head_name }} Create
@endsection

@section('PageTitle')
    {{ $head_name }} Create
@endsection

@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headLinks')
    <x-links.header-links-select-two />
    <style>
        div.scrole-tree {
            background-color: rgb(214, 229, 244);
            width: 100%;
            height: 310px;
            overflow: scroll;
            overflow-y: auto;
        }

        .table thead th {
            position: sticky;
            top: 0;
            background: rgb(168, 168, 168);
            z-index: 100;
        }
    </style>
@endsection

@section('actionTitle')
    {{ $head_name }} Create
@endsection
@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-12">
                @can('{{ $head_name }} Create')
                    <form role="form" action="{{ route($route_name . '.store') }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <!-- /.card-header -->

                            <div class="card card-primary card-tabs p-2">
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <div class="input-group mb-3 input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Date</span>
                                            </div>
                                            <input type="date" name="date" class="form-control"
                                                value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group mb-3 input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Sales Number#</span>
                                            </div>
                                            <input type="text" name="sale_number" class="form-control"
                                                value="TSS-{{ $list_number }}" readonly placeholder="">
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
                                                    <option {{ $voucher_type->name == 'Sales Invoice' ? 'selected' : '' }}
                                                        value="{{ $voucher_type->id }}">
                                                        {{ $voucher_type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <div class="input-group mb-3 input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Account</span>
                                            </div>
                                            <select name="account_id" class="form-control select2" required>
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

                            {{-- ------------ --}}
                            <div class="pb-4">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
                                    Price Checker
                                </button>
                            </div>
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Price Checker</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Placeholders for price and quantity -->
                                            <div>
                                                <p>Price: <span id="price">N/A</span></p>
                                                <p>Quantity: <span id="quantity">N/A</span></p>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <select id="productSelect" class="form-control select2" required>
                                                    <option selected>-- Products --</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product['id'] }}"
                                                            data-price="{{ $product['average_cost'] }}"
                                                            data-quantity="{{ $product['total_balance'] }}">
                                                            {{ $product['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            {{-- ----------------- --}}

                            <div class="row">
                                <div class="table-responsive-sm scrole-tree">
                                    <table class="table table-bordered" id="saleTable">
                                        <thead>
                                            <tr>
                                                <th>SiNo</th>
                                                <th>Product</th>
                                                <th>QTY</th>
                                                <th>Price</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbodyJob">
                                            <tr>
                                                <td class="item-number">1</td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="product_id[]" class="form-control select2" required>
                                                            <option disabled selected>-- Products --</option>
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product['id'] }}"
                                                                    data-price="{{ $product['average_cost'] }}"
                                                                    data-quantity="{{ $product['total_balance'] }}">
                                                                    {{ $product['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td><input type="number" name="quantity[]" class="form-control quantity">
                                                </td>
                                                <td><input type="number" name="price[]" class="form-control price"></td>
                                                <td class="total">0</td>
                                                <td><input type="text" name="line_description[]" class="form-control">
                                                </td>
                                                <td style="text-align: :center"><a class="btn btn-danger removeJob">-</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between mr-2">
                                        <span class="ml-auto">
                                            <a class="btn btn-info addRowReceipt">Add</a>
                                        </span>
                                    </div>
                                </div>


                            </div>

                            <!-- Summary Section -->
                            <div class="row justify-content-end mt-2">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="subTotal" class="col-sm-4 col-form-label">Subtotal:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="subTotal" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tax" class="col-sm-4 col-form-label">Tax (%):</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="tax">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="discount" class="col-sm-4 col-form-label">Discount (%):</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="discount">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="total" class="col-sm-4 col-form-label">Total</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="total" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="col-sm-10 pl-5 pt-2">
                                <input type="checkbox" class="form-check-input" name="status" value="1"
                                    id="status" @if (Auth::user()->settings['default_status'] == 1) {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('{{ $head_name }} Create')
                                <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
                            @endcan
                            <a type="button" href="{{ route($route_name . '.index') }}"
                                class="btn btn-warning float-right ml-1">Back</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                @endcan

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

    <x-links.footer-link-jquery-validation />



    <script type="text/javascript">
        $('.addRowReceipt').on('click', function() {
            addRowReceipt();
        });
        let itemIndex = 1;

        function updateItemNumbers() {
            $("#invoiceItems tbody tr").each(function(index) {
                $(this)
                    .find(".item-number")
                    .text(index + 1);
            });
        }

        function addRowReceipt() {
            itemIndex++;
            var trAccount =
                `
                <tr>
                <td class="item-number">${itemIndex}</td>
                <td>
                <div class="form-group">
                <select name="product_id[]" class="form-control select2"
                    required>
                    <option disabled selected>-- Products --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product['id'] }}"
                            data-price="{{ $product['average_cost'] }}"
                            data-quantity="{{ $product['total_balance'] }}">
                            {{ $product['name'] }}
                        </option>
                    @endforeach
                </select>
                </div>
                </td>
                <td><input type="number" name="quantity[]" class="form-control quantity"></td>
                <td><input type="number" name="price[]" class="form-control price"></td>
                <td class="total">0</td>
                <td><input type="text" name="line_description[]" class="form-control"></td>
                <td style="text-align: :center"><a  class="btn btn-danger removeJob">-</a></td>
                </tr>
                `;

            $('.tbodyJob').append(trAccount);

            $('.select2').select2();
            updateSubtotal();

        };
        $('.tbodyJob').on('click', '.removeJob', function() {
            $(this).parent().parent().remove();
            updateSubtotal();
        });



        // Calculate totals
        $(document).on("input", ".quantity, .price", function() {
            const row = $(this).closest("tr");
            const quantity = parseFloat(row.find(".quantity").val()) || 0;
            const price = parseFloat(row.find(".price").val()) || 0;
            const total = quantity * price;
            row.find(".total").text(total.toFixed(2));
            updateSubtotal();
        });

        function updateSubtotal() {
            let subtotal = 0;
            $("#saleTable tbody .total").each(function() {
                subtotal += parseFloat($(this).text()) || 0;
            });
            $("#subTotal").val(subtotal.toFixed(2));
            updateTotal();
        }

        function updateTotal() {
            const subtotal = parseFloat($("#subTotal").val()) || 0;
            const tax = parseFloat($("#tax").val()) || 0;
            const discount = parseFloat($("#discount").val()) || 0;

            const total =
                subtotal + subtotal * (tax / 100) - subtotal * (discount / 100);
            $("#total").val(total.toFixed(2));
        }

        $("#tax, #discount").on("input", function() {
            updateTotal();
        });
    </script>

    {{-- price checker --}}
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('#productSelect').select2();

            // Handle change event
            $('#productSelect').on('change', function() {
                var selectedOption = $(this).find(':selected');
                var price = selectedOption.data('price');
                var quantity = selectedOption.data('quantity');

                // Update the placeholders
                $('#price').text(price);
                $('#quantity').text(quantity);
            });
        });
    </script>


    <script>
        $(function() {
            jQuery.validator.addMethod("noSpace", function(value, element) {
                return value.indexOf(" ") < 0 && value != "";
            });

            // Custom method to check if the date is not above today's date
            $.validator.addMethod("notAboveToday", function(value, element) {
                var today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
                return this.optional(element) || value <= today;
            }, "The date cannot be above today's date.");


            var editDays = @json($editDays);

            $.validator.addMethod("minDate", function(value, element) {
                var selectedDate = new Date(value);
                var today = new Date();
                var minDate = new Date();
                minDate.setDate(today.getDate() - editDays);

                return this.optional(element) || selectedDate >= minDate;
            }, "Your Editing permitted only 7 days.");

            // $.validator.addMethod("dateGreaterThan", function(value, element, params) {
            //     if (!/Invalid|NaN/.test(new Date(value))) {
            //         return new Date(value) > new Date($(params).val());
            //     }
            //     return isNaN(value) && isNaN($(params).val()) || (Number(value) > Number($(params).val()));
            // }, 'End Date must be greater than Start Date.');

            $('#quickForm').validate({
                rules: {
                    date: {
                        required: true,
                        notAboveToday: true,
                        minDate: true
                    },
                    account_id: {
                        required: true,
                    },
                    'product_id[]': {
                        required: true,
                    },
                    'quantity[]': {
                        required: true,
                    },
                    'price[]': {
                        required: true,
                    },
                },
                messages: {
                    date: {
                        required: "Please Enter date",
                        notAboveToday: "The date cannot be above Today's date.",
                        minDate: "Your Editing permitted only " + editDays + " day(s)."
                    },
                    account_id: {
                        required: "Please Select an Account",
                    },
                    'product_id[]': {
                        required: "Please Select a Product",
                    },
                    'quantity[]': {
                        required: "Please Select a Product",
                    },
                    'price[]': {
                        required: "Please Select a Product",
                    },
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
