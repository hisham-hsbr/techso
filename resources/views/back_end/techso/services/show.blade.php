@extends('back_end.layouts.app')

@section('PageHead', 'Services Show')

@section('PageTitle', 'Services Show')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Mobile Services</a></li>
    <li class="breadcrumb-item active">Show</li>
@endsection

@section('headLinks')
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="{{ asset('back_end_links/adminLinks/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('back_end_links/adminLinks/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('back_end_links/adminLinks/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('actionTitle', 'Services Show')
@section('mainContent')
    <div class="container-fluid">
        @can('Services View')
            <div class="row">
                <div class="col-md-1">

                </div>
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card-body">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div style="border-style: groove;" class="form-group row p-3">
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Date</label>
                                    <label><code>: {{ $service->date }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Job Number</label>
                                    <label><code>:
                                            TJ-{{ $service->job_number }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Job Type</label>
                                    <label><code>:
                                            {{ $service->jobType->name }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Customer Name</label>
                                    <label><code>:
                                            {{ $service->customer->name }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Customer Number</label>
                                    <label><code>:
                                            {{ $service->customer->phone_1 }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Customer Address</label>
                                    <label><code>:
                                            {{ $service->customer->address }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Lock</label>
                                    <label><code>:
                                            {{ $service->lock }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Serial Number</label>
                                    <label><code>:
                                            {{ $service->serial_number }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Product Name</label>
                                    <label><code>:
                                            {{ $service->product->name }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Complaint</label>
                                    <label><code>:
                                            {{ $service->complaint->name }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Complaint Details</label>
                                    <label><code>:
                                            {{ $service->complaint_details }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Work Details</label>
                                    <label><code>:
                                            {{ $service->work_details }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Work Status</label>
                                    <label><code>:
                                            {{ $service->workStatus->name }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Job Status</label>
                                    <label><code>:
                                            {{ $service->jobStatus->name }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Payment</label>
                                    <label><code>:
                                            {{ $service->payment }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Advance</label>
                                    <label><code>:
                                            {{ $service->advance }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Balance</label>
                                    <label><code>:
                                            {{ $service->balance }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Delivered At</label>
                                    <label><code>:
                                            {{ $service->delivered_at }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Created At</label>
                                    <label><code>:
                                            {{ $service->created_at }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Updated At</label>
                                    <label><code>:
                                            {{ $service->updated_at }}</code></label>
                                </div>

                                {{-- @foreach ($activityLog->properties as $key => $value)
                                    <div class="col-md-6 pt-2">
                                        <table class="table table-bordered">

                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="bg-secondary color-palette">
                                                        @if ($key == 'attributes')
                                                            New {{ $activityLog->event }} {{ $activityLog->log_name }}
                                                        @elseif ($key == 'old')
                                                            Old {{ $activityLog->log_name }}
                                                        @endif
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($value as $lists => $data)
                                                    <tr class="bg-light color-palette">
                                                        <td style="color:red ;width: 10%">{{ $lists }}</td>
                                                        <td>{{ $data }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach --}}


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 cta-btn-container text-center">
                        For Contact Customer : -
                        <a class="cta-btn align-middle pr-3 pr-2"
                            href="https://wa.me/{{ $service->customer->phone_1 }}?text=Dear, %20{{ $service->customer->contact_name }}%20your%20{{ $service->product->name }}%20%20Job Status is%20{{ $service->jobStatus->name }}%0a__%0aTECHSO%0a+91000000"
                            target="_blank"><i class="bi bi-whatsapp">
                                WhatsApp</i></a>

                        <a class="cta-btn align-middle" href="tel:+91{{ $service->customer->phone_1 }}"><i
                                class="bi bi-telephone">
                                Call</i></a>
                    </div>
                    <!-- /.card-body -->
                    <div class="">
                        @can('Mobile Service Pdf')
                            <a type="button" href="{{ route('services.pdf', $service->id) }}"
                                class="btn btn-info float-right ml-1"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                        @endcan
                        <a type="button" href="{{ route('services.edit', $service->id) }}"
                            class="btn btn-primary float-right ml-1">Edit</a>
                        <a type="button" href="{{ route('services.index') }}"
                            class="btn btn-warning float-right ml-1">Back</a>
                    </div>
                    <!-- /.card-footer -->

                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        @endcan
    </div><!-- /.container-fluid -->


@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')


    <x-message.message />



@endsection
