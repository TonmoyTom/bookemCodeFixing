@extends('backend.layouts.master')
@section('title', 'Customer Review')
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">All Customer to Provider Review Here..</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted"> Review</a>
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
            <div class="container-fluid">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Customer To Provider Review List
                                <span class="d-block text-muted pt-2 font-size-sm">All new provider review here</span>
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
                                    <th>Customer Name</th>
                                    <th>Provider Name</th>
                                    <th>Rating</th>
                                    <th>Rating Comments</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providerreviews as $providerreview)
                                @php
                                    $appointment = App\Models\Appointment::where('id', $providerreview->appointment_id)->first();
                                 @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>#{{ $appointment->appointment_no }}</td>
                                        <td>{{ @$appointment->customer->name }}</td>
                                        <td>{{ @$appointment->provider->business_name }}</td>
                                        
                                       
                                        <td>{{ @$providerreview->rating }}</td>
                                        <td>{{ @$providerreview->description }}</td>
                                        <td>
                                            <a href="{{ route('userreview.show', $appointment->id) }}"
                                                class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>
                                        </td>
                                    </tr>


                                @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Customer To Independent Contractor Review List
                                <span class="d-block text-muted pt-2 font-size-sm">All new indepentdent contractor review here</span>
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
                                    <th>Customer Name</th>
                                    <th>Provider Name</th>
                                    <th>IC Name</th>
                                    <th>Rating</th>
                                    <th>Rating Comments</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($icreviews as $icreview)
                                @php
                                    $appointment = App\Models\Appointment::where('id', $icreview->appointment_id)->first();
                                 @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>#{{ $appointment->appointment_no }}</td>
                                        <td>{{ @$appointment->customer->name }}</td>
                                        <td>{{ @$appointment->provider->business_name }}</td>
                                        <td>
                                            @if(@$appointment->ic->name)
                                             {{ @$appointment->ic->name }}
                                             @else
                                             N/A
                                             @endif
                                            </td>
                                        
                                       
                                        <td>{{ @$icreview->rating }}</td>
                                        <td>{{ @$icreview->description }}</td>
                                        <td>
                                            <a href="{{ route('userreview.show', $appointment->id) }}"
                                                class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>
                                        </td>
                                    </tr>


                                @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Customer To Service Review List
                                <span class="d-block text-muted pt-2 font-size-sm">All new provider review here</span>
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
                                    <th>Customer Name</th>
                                    <th>Provider Name</th>
                                    <th>IC Name</th>
                                    <th>Service Name</th>
                                    <th>Rating</th>
                                    <th>Rating Comments</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicereviews as $servicereview)
                                @php
                                    $appointment = App\Models\Appointment::where('id', $servicereview->appointment_id)->first();
                                    $serviceitem = App\Models\AppointmentItem::where('service_id', $servicereview->service_id)->first();
                                 @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>#{{ $appointment->appointment_no }}</td>
                                        <td>{{ @$appointment->customer->name }}</td>
                                        <td>{{ @$appointment->provider->business_name }}</td>
                                        <td>
                                            @if(@$appointment->ic->name)
                                             {{ @$appointment->ic->name }}
                                             @else
                                             N/A
                                             @endif
                                        </td>
                                        <td>{{$serviceitem->service->name}}</td>
                                        
                                       
                                        <td>{{ @$servicereview->rating }}</td>
                                        <td>{{ @$servicereview->description }}</td>
                                        <td>
                                            <a href="{{ route('userreview.show', $appointment->id) }}"
                                                class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>
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
