<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Stock Report</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Purchase Number</th>
                    <th scope="col">Product</th>
                    <th scope="col">RCVD-QTY</th>
                    <th scope="col">RCVD-Price</th>
                    <th scope="col">ISSD-Qty</th>
                    <th scope="col">ISSD-Price</th>
                    <th scope="col">Balance-QTY</th>
                    <th scope="col">AVG-price</th>
                    <th scope="col">Sum</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventories as $inventory)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $inventory->document_number }}</td>
                        <td>{{ $inventory->product->name }}</td>
                        <td>{{ $inventory->received_quantity }}</td>
                        <td>{{ $inventory->received_price }}</td>
                        <td>{{ $inventory->issued_quantity }}</td>
                        <td>{{ $inventory->issued_price }}</td>
                        <td>{{ $inventory->balance }}</td>
                        <td>{{ $inventory->balance }}</td>
                        <td>{{ $inventory->balance * $inventory->received_price }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <h1>Product Stock</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Current Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->current_stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
