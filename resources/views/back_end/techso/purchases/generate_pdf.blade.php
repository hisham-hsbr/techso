<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>pdf Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    {{-- <h1>Page 1</h1>
    <div class="page-break"></div>
    <h1>Page 2</h1> --}}
    <div class="container-fluid">
        @can('Activity Log View')
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1">
                    </div>
                    <!-- left column -->

                    <div class="col-sm-11">
                        <!-- form start -->
                        <h5 class="card-title">TECHSO</h5>
                        <p class="card-text">jubai, saudi arabia, TECHSO@gmail.com ,
                            +91 900000000</p>
                        <p class="card-text"></p>
                        <div style="border-style: groove;" class="form-group row p-3">
                            <div class="col-sm-12">
                                <label class="col-sm-4">Job Number</label>
                                <label><code>: TF-{{ $services->job_number }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Date</label>
                                {{ \Carbon\Carbon::parse($services->date)->format('Y-m-d') }}
                                {{-- <label><code>: {{ $services->date->format('Y-m-d') }}</code></label> --}}
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Job Type</label>

                                <label><code>: {{ $services->jobType->name }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">customer Name</label>
                                <label><code>: {{ $services->customer->name }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">customer Number</label>
                                <label><code>: {{ $services->customer->phone_1 }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Address</label>
                                <label><code>: {{ $services->customer->address }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">serial_number</label>
                                <label><code>: {{ $services->serial_number }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Product</label>
                                <label><code>: {{ $services->product->name }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Complaint</label>
                                <label><code>: {{ $services->complaint->name }}</code></label>
                            </div>

                        </div>
                    </div>

                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        @endcan
    </div><!-- /.container-fluid -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
