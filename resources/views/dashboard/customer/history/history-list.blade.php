@extends('dashboard.layouts.master')
@section('title', 'History')
@section('udcontent')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">History
                                <span class="d-block text-muted pt-2 font-size-sm">All History here</span>
                            </h3>
                        </div>

                    </div>
                    <div class="card-body table-responsive">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Order Id</th>
                                                <th>Provider Name</th>
                                                <th>IC Name</th>

                                                <th>Paying Amount</th>
                                                <th>Payment Mode</th>
                                                <th>Payment Status</th>
                                                <th>Service Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($historys as $appointment)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>#{{ $appointment->appointment_no }}</td>
                                                    <td>{{ @$appointment->provider->business_name }}</td>
                                                    <td>
                                                        @if (@$appointment->ic->name)
                                                            {{ @$appointment->ic->name }}
                                                        @else
                                                            N/A
                                                        @endif


                                                    </td>

                                                    <td>
                                                        @if ($appointment->payment_type == 'Hand Cash')
                                                            N/A
                                                        @else
                                                            {{ $appointment->amount }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $appointment->payment_type }}</td>
                                                    <td>
                                                        @if ($appointment->payment_status == 0)
                                                            Not Paid
                                                        @elseif($appointment->payment_status == 1)
                                                            Paid
                                                        @elseif($appointment->payment_status == 2)
                                                             Refunded
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($appointment->service_status == 0)
                                                            <a href="#"
                                                                class="btn label label-lg label-light-danger label-inline">
                                                                Pending</a>
                                                        @elseif($appointment->service_status == 1)
                                                            <a href="#"
                                                                class="btn label label-lg label-light-success label-inline">Progress
                                                            </a>
                                                        @elseif($appointment->service_status == 2)
                                                            <a href="#"
                                                                class="btn label label-lg label-light-danger label-inline">
                                                                Complete</a>
                                                        @elseif($appointment->service_status == 3)
                                                            <a href="#"
                                                                class="btn label label-lg label-light-danger label-inline">
                                                                Cancel</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('customer.appointment.show', $appointment->id) }}"
                                                            class="btn btn-icon btn-clean btn-sm"><i
                                                                class="la la-eye"></i></a>

                                                        @if ($appointment->service_status == 0)
                                                            <a id="course_status"
                                                                href="{{ route('customer.appointment.close', $appointment->id) }}"
                                                                class="btn btn-sm btn-clean">Cencel</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
