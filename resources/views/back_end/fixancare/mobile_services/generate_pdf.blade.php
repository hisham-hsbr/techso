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
                        <h5 class="card-title">Fixancare</h5>
                        <p class="card-text">Bandankai Arcade, Shop NO.10/666 Bus stand Road, 671541, fixancare@gmail.com ,
                            +91 9020 88 00 88</p>
                        <p class="card-text"></p>
                        <div style="border-style: groove;" class="form-group row p-3">
                            <div class="col-sm-12">
                                <label class="col-sm-4">Job Number</label>
                                <label><code>: F-{{ $mobile_services->job_number }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Date</label>
                                <label><code>: {{ $mobile_services->date->format('Y-m-d') }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Job Type</label>

                                <label><code>: {{ $mobile_services->jobType->name }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Contact Name</label>
                                <label><code>: {{ $mobile_services->contact_name }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Contact Number</label>
                                <label><code>: {{ $mobile_services->contact_number }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Address</label>
                                <label><code>: {{ $mobile_services->contact_address }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">IMEI</label>
                                <label><code>: {{ $mobile_services->imei }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Mobile Model</label>
                                <label><code>: {{ $mobile_services->mobileModel->name }}</code></label>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-4">Mobile Complaint</label>
                                <label><code>: {{ $mobile_services->mobileComplaint->name }}</code></label>
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
