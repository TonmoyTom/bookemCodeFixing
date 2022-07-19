
@extends('dashboard.layouts.master')
@section('title','Appointments')
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
                        <a class="nav-link active" id="home-tab-2" data-toggle="tab" href="#home-2">
                            <span class="nav-icon">
                                <i class="flaticon2-layers-1"></i>
                            </span>
                            <span class="nav-text">Appointments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab-2" data-toggle="tab" href="#profile-2" aria-controls="profile">
                            <span class="nav-icon">
                                <i class="flaticon2-layers-1"></i>
                            </span>
                            <span class="nav-text">Completed Appointments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab-2" data-toggle="tab" href="#contact-2" aria-controls="contact">
                            <span class="nav-icon">
                                <i class="flaticon2-layers-1"></i>
                            </span>
                            <span class="nav-text">Canceled Appointments</span>
                        </a>
                    </li>

                </ul>
                <div class="tab-content mt-5" id="myTabContent2">
                    <div class="tab-pane fade active show" id="home-2" role="tabpanel" aria-labelledby="home-tab-2">

                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header flex-wrap py-5">
                                <div class="card-title">
                                    <h3 class="card-label">Appiontment List
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
                                    <td>{{ @$appointment->customer->name }}</td>
                               
                                    <td>
                                        @if ($appointment->payment_type=='Hand Cash')
                                        N/A
                                        @else
                                        {{ $appointment->amount }}
                                        @endif
                                    </td>
                                    <td>{{ $appointment->payment_type }}</td>
                                    <td>
                                        @if ($appointment->service_status == 0)
                                            <a href="#" class="btn label label-lg label-light-danger label-inline"
                                                data-toggle="modal"
                                                data-target="#service_status_{{ $appointment->id }}">
                                                Pending</a>
                                        @elseif($appointment->service_status == 1)

                                            <a href="#" class="btn label label-lg label-light-success label-inline"
                                                data-toggle="modal"
                                                data-target="#service_status_{{ $appointment->id }}">Progress
                                            </a>

                                        @elseif($appointment->service_status == 2)
                                            <a href="#" class="btn label label-lg label-light-danger label-inline"
                                                data-toggle="modal"
                                                data-target="#service_status_{{ $appointment->id }}">
                                                Complete</a>
                                        @endif
                                    </td>
                                    <td>

                                        <a href="{{ route('ic.provider.appointment.show', $appointment->id) }}"
                                            class="btn btn-sm btn-clean btn-icon"><i class="la la-eye"></i></a>
                                          
                                        <a id="course_status" href="{{ route('ic.provider.appointment.close', $appointment->id) }}"
                                            class="btn btn-sm btn-clean btn-icon">Cancel</a>

                                           


                                    </td>
                                </tr>

                                <!--Row Status -->
                                <div class="modal fade" id="service_status_{{ $appointment->id }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Appointment Status
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form
                                                action="{{ route('ic.provider.appointment.status', $appointment->id) }}"
                                                method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <select name="service_status" class="form-control">
                                                            <option value="0" @if ($appointment->service_status == 0) selected @endif>Pending
                                                            </option>
                                                            <option value="1" @if ($appointment->service_status == 1) selected @endif>Progress
                                                            </option>
                                                            <option value="2" @if ($appointment->service_status == 2) selected @endif>Complete
                                                            </option>
                                                        </select>

                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('service_status') ? $errors->first('service_status') : '' }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                            </div>
                        </div>
                        <!--end::Card-->

                    </div>

                    <div class="tab-pane fade" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header flex-wrap py-5">
                                <div class="card-title">
                                    <h3 class="card-label">Completed Appointments
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
                                            <th>Service Status</th>
                                            <th>Action</th>
                                            {{-- <th>Review</th> --}}
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
                                                <a href="#" class="btn label label-lg label-light-danger label-inline">
                                                    Pending</a>
                                                @elseif($appointment->service_status == 1)
                                                <a href="#" class="btn label label-lg label-light-success label-inline">Progress
                                                </a>
                                                @elseif($appointment->service_status == 2)
                                                <a href="#" class="btn label label-lg label-light-danger label-inline">
                                                    Complete</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('customer.appointment.show', $appointment->id) }}" class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>
                                            </td>

                                            {{-- @php
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
                                                <a href=" {{ route('customer.review.create', $appointment->id) }}" class="btn btn-icon btn-clean btn-sm"><i class="la la-comments-o"></i></a>
                                                @else
                                                {{ @$icrev->rating }} <i style="color: #fcc612;" class="fa fa-star"></i>
                                                @endif
                                            </td>
                                            @else
                                            <td>
                                                @if ($checkRev == 0)
                                                <a href=" {{ route('customer.review.create', $appointment->id) }}" class="btn btn-icon btn-clean btn-sm"><i class="la la-comments-o"></i></a>
                                                @else
                                                {{ @$rev->rating }} <i style="color: #fcc612;" class="fa fa-star"></i>
                                                @endif
                                            </td>
                                            @endif --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--end: Datatable-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>

                    <div class="tab-pane fade" id="contact-2" role="tabpanel" aria-labelledby="contact-tab-2">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header flex-wrap py-5">
                                <div class="card-title">
                                    <h3 class="card-label"> Canceled Appiontments
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
                                                <a href="#" class="btn label label-lg label-light-danger label-inline">
                                                    Not Paid</a>

                                                @elseif($appointment->payment_status == 1)
                                                <a href="#" class="btn label label-lg label-light-danger label-inline">
                                                    Paid</a>
                                                @if ($appointment->payment_type == 'Hand Cash')
                                                |

                                                <a href="{{ route('user.refund.money',$appointment->id) }}" class="btn btn-clean btn-sm">Refund Money</a>
                                                @endif
                                                @elseif($appointment->payment_status == 2)
                                                <a href="#" class="btn label label-lg label-light-success label-inline">
                                                    Refunded</a>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('customer.appointment.cancel.show', $appointment->id) }}" class="btn btn-clean btn-sm mr-2">View</a>

                                                <a id="course_status" href="{{ route('customer.appointment.cancel.rebook', $appointment->id) }}" class="btn btn-sm btn-clean">Rebook</a>
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

