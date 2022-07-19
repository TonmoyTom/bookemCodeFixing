@extends('dashboard.layouts.master')
@section('title', 'Appointments')
@section('udcontent')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">

                <div class="example-preview">
                    <ul class="nav nav-success nav-pills" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link   {{( request()->_token == null || request()->home == "home") ? 'active' : ''}}" id="home-tab-2" data-toggle="tab" href="#home-2">
                                <span class="nav-icon">
                                    <i class="flaticon2-layers-1"></i>
                                </span>
                                <span class="nav-text">In Progress </span>
                                <span>{{ $appointmentsCount == 0 ? '' : '(' . $appointmentsCount . ')' }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{(request()->profile == true) ? 'active' : ''}}" id="profile-tab-2" data-toggle="tab" href="#profile-2"
                                aria-controls="profile">
                                <span class="nav-icon">
                                    <i class="flaticon2-layers-1"></i>
                                </span>
                                <span class="nav-text">Completed Appointments</span>
                                <span>{{ $completedCount == 0 ? '' : '(' . $completedCount . ')' }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{(request()->cancel == true) ? 'active' : ''}}" id="contact-tab-2" data-toggle="tab" href="#contact-2"
                                aria-controls="contact">
                                <span class="nav-icon">
                                    <i class="flaticon2-layers-1"></i>
                                </span>
                                <span class="nav-text">Canceled Appointments</span>
                                <span>{{ $canceledCount == 0 ? '' : '(' . $canceledCount . ')' }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{(request()->refund == true) ? 'active' : ''}}" id="contact-tab-3" data-toggle="tab" href="#contact-3"
                                aria-controls="contact">
                                <span class="nav-icon">
                                    <i class="flaticon2-layers-1"></i>
                                </span>
                                <span class="nav-text">Refund Appointments</span>
                                <span>{{ $refundCount == 0 ? '' : '(' . $refundCount . ')' }}</span>
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content mt-5" id="myTabContent2">
                        <div class="tab-pane fade {{(request()->_token == null) ? 'active show': "" }} {{(request()->home == true) ? 'active show' : ''}} " id="home-2" role="tabpanel" aria-labelledby="home-tab-2">

                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-header flex-wrap py-5">
                                    <div class="card-title">
                                        <h3 class="card-label">In Progress
                                        </h3>
                                    </div>
                                    <div class="o__searchByDate">
                                        <form class="d-flex" action="{{ route('customer.appointment.index') }}"
                                            method="GET">
                                            @csrf
                                            <div id="dataTable_filter" class="dataTables_filter"><label
                                                    class="d-flex align-items-center">Start Date:<input type="date"
                                                        name="start_date" class="form-control form-control-sm" value="{{request()->start_date}}"></label>
                                            </div>
                                            <div id="dataTable_filter" class="dataTables_filter">
                                                <label class="d-flex align-items-center">End Date:<input type="date"
                                                        name="end_date" value="{{request()->end_date}}" class="form-control form-control-sm"></label>
                                            </div>
                                            <input type="hidden" name="home" value="home">
                                            <input type="submit" value="Search">
                                        </form>
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
                                                <th>Service Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appointments as $appointment)
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

                        <div class="tab-pane fade {{(request()->profile == true) ? 'active show' : ''}}" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-header flex-wrap py-5">
                                    <div class="card-title">
                                        <h3 class="card-label">Completed Appointments
                                        </h3>
                                    </div>
                                    <div class="o__searchByDate">
                                        <form class="d-flex" action="{{ route('customer.appointment.index') }}"
                                            method="GET">
                                            @csrf
                                            <div id="dataTable_filter" class="dataTables_filter"><label
                                                    class="d-flex align-items-center">Start Date:<input type="date"
                                                        name="cm_start_date" class="form-control form-control-sm" value="{{request()->cm_start_date}}"></label>
                                            </div>
                                            <div id="dataTable_filter" class="dataTables_filter">
                                                <label class="d-flex align-items-center">End Date:<input type="date"
                                                        name="cm_end_date" value="{{request()->cm_end_date}}" class="form-control form-control-sm"></label>
                                            </div>
                                            <input type="hidden" name="profile" value="profile">
                                            <input type="submit" value="Search">
                                        </form>
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
                                                <th>Service Status</th>
                                                <th>Action</th>
                                                <th>Review</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($completed as $appointment)
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
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('customer.appointment.show', $appointment->id) }}"
                                                            class="btn btn-icon btn-clean btn-sm"><i
                                                                class="la la-eye"></i></a>
                                                    </td>

                                                    @php
                                                        $checkRev = App\Models\ProviderReview::where('appointment_id', $appointment->id)->count();
                                                        $rev = App\Models\ProviderReview::where('appointment_id', $appointment->id)->first();
                                                    @endphp
                                                    @php
                                                        $iccheckRev = App\Models\IcReview::where('appointment_id', $appointment->id)->count();
                                                        $icrev = App\Models\IcReview::where('appointment_id', $appointment->id)->first();
                                                    @endphp

                                                    @if ($appointment->ic_id != null)
                                                        <td>
                                                            @if ($iccheckRev == 0)
                                                                <a href=" {{ route('customer.review.create', $appointment->id) }}"
                                                                    class="btn btn-icon btn-clean btn-sm"><i
                                                                        class="la la-comments-o"></i></a>
                                                            @else
                                                                {{ @$icrev->rating }} <i style="color: #fcc612;"
                                                                    class="fa fa-star"></i>
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td>
                                                            @if ($checkRev == 0)
                                                                <a href=" {{ route('customer.review.create', $appointment->id) }}"
                                                                    class="btn btn-icon btn-clean btn-sm"><i
                                                                        class="la la-comments-o"></i></a>
                                                            @else
                                                                {{ @$rev->rating }} <i style="color: #fcc612;"
                                                                    class="fa fa-star"></i>
                                                            @endif
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!--end: Datatable-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>

                        <div class="tab-pane fade {{(request()->cancel == true) ? 'active show' : ''}}" id="contact-2" role="tabpanel" aria-labelledby="contact-tab-2">
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-header flex-wrap py-5">
                                    <div class="card-title">
                                        <h3 class="card-label"> Canceled Appiontments
                                        </h3>
                                    </div>
                                    <div class="o__searchByDate">
                                        <form class="d-flex" action="{{ route('customer.appointment.index') }}"
                                            method="GET">
                                            @csrf
                                            <div id="dataTable_filter" class="dataTables_filter"><label
                                                    class="d-flex align-items-center">Start Date:<input type="date"
                                                        name="cn_start_date" class="form-control form-control-sm" value="{{request()->cn_start_date}}"></label>
                                            </div>
                                            <div id="dataTable_filter" class="dataTables_filter">
                                                <label class="d-flex align-items-center">End Date:<input type="date"
                                                        name="cn_end_date" value="{{request()->cn_end_date}}" class="form-control form-control-sm"></label>
                                            </div>
                                            <input type="hidden" name="cancel" value="cancel">
                                            <input type="submit" value="Search">
                                        </form>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($canceled as $appointment)
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
                                                            <a href="#"
                                                                class="btn label label-lg label-light-danger label-inline">
                                                                Not Paid</a>
                                                        @elseif($appointment->payment_status == 1)
                                                            <a href="#"
                                                                class="btn label label-lg label-light-danger label-inline">
                                                                Paid</a>
                                                            @if ($appointment->payment_type == 'Hand Cash')
                                                                |

                                                                <a href="{{ route('user.refund.money', $appointment->id) }}"
                                                                    class="btn btn-clean btn-sm">Refund Money</a>
                                                            @endif
                                                        @elseif($appointment->payment_status == 2)
                                                            <a href="#"
                                                                class="btn label label-lg label-light-success label-inline">
                                                                Refunded</a>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('customer.appointment.cancel.show', $appointment->id) }}"
                                                            class="btn btn-clean btn-sm mr-2">View</a>

                                                        <a id="course_status"
                                                            href="{{ route('customer.appointment.cancel.rebook', $appointment->id) }}"
                                                            class="btn btn-sm btn-clean">Rebook</a>
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

                        <div class="tab-pane fade {{(request()->refund == true) ? 'active show' : ''}}" id="contact-3" role="tabpanel" aria-labelledby="contact-tab-3">
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-header flex-wrap py-5">
                                    <div class="card-title">
                                        <h3 class="card-label">Refund Appiontments
                                        </h3>
                                    </div>

                                    <div class="o__searchByDate">
                                        <form class="d-flex" action="{{ route('customer.appointment.index') }}"
                                            method="GET">
                                            @csrf
                                            <div id="dataTable_filter" class="dataTables_filter"><label
                                                    class="d-flex align-items-center">Start Date:<input type="date"
                                                        name="_re_start_date" class="form-control form-control-sm" value="{{request()->re_start_date}}"></label>
                                            </div>
                                            <div id="dataTable_filter" class="dataTables_filter">
                                                <label class="d-flex align-items-center">End Date:<input type="date"
                                                        name="re_end_date" value="{{request()->re_end_date}}" class="form-control form-control-sm"></label>
                                            </div>
                                            <input type="hidden" name="refund" value="refund">
                                            <input type="submit" value="Search">
                                        </form>
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
                                                <th>Paying Status</th>
                                                <th>Payment Mood</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($refund as $appointment)
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
                                                        @if ($appointment->payment_status == 1)
                                                            <a href="#"
                                                                class="btn label label-lg label-light-success label-inline">
                                                                Refunded</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('provider.appointment.show', $appointment->id) }}"
                                                            class="btn btn-clean btn-sm mr-2"><i
                                                                class="la la-comments-o"></i></a>
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


                    </div>
                </div>



            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
