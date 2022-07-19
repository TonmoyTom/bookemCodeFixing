
@extends('dashboard.layouts.master')
@section('title','Appointment Close')
@section('udcontent')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5"> Canceled Appointment</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted"> canceled appointment</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Canceled Appiontments List
                            <span class="d-block text-muted pt-2 font-size-sm">All Canceled Appiontments here</span>
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
                                <th>Customer</th>
                                <th>Vendor Name</th>
                                <th>IC Name</th>
                                <th>Paying Amount</th>
                                <th>Payment Mode</th>
                                <th>Payment status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($appointments as $appointment)

                          <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>#{{$appointment->appointment_no}}</td>
                                <td>{{ @$appointment->customer->name}}</td>
                                <td>{{ @$appointment->provider->business_name }}</td>
                                    <td>
                                        @if(@$appointment->ic->name)
                                         {{ @$appointment->ic->name }}
                                         @else
                                         N/A
                                         @endif
                                        
                                       
                                     </td>
                               
                                <td>
                                    @if ($appointment->payment_type=='Hand Cash')
                                    N/A
                                    @else
                                    {{ $appointment->amount}}
                                    @endif
                                </td>
                                <td>{{ $appointment->payment_type }}</td>
                                <td>
                                    @if ($appointment->payment_status== 0)
                                   Not Paid
                                    @elseif($appointment->payment_status== 1)
                                    Paid
                                    @elseif($appointment->payment_status== 2)
                                    Money Refunded
                                    @endif
                                </td>
                               
                                <td>
                                    <a href="{{route('ic.provider.appointment.cancel.show',$appointment->id)}}" class="btn btn-clean btn-sm">View</a>

                                   
                                        <a id="course_status" href="{{ route('ic.provider.appointment.cancel.rebook',$appointment->id)}}" class="btn btn-sm btn-clean mr-2">Rebook</a>
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

