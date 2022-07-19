@extends('dashboard.layouts.master')
@section('title', 'Dashboard')
@section('udcontent')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col">
                    @if (auth()->check() && auth()->user()->trial_ends_at)
                        <div class="mb-5 text-center" style="background: #dff0f3; border-radius:5px; padding:10px; font-weight:600">You have not yet subscribed to any plan <a href="{{ route('plan') }}">Choose your plan</a> at any time.
                        </div>
                    @endif
                </div>
            </div>
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Recent Appointment
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        @if (Auth::user()->usertype == 1)
                        <a href="{{ route('provider.appointment.index') }}" class="btn btn-primary font-weight-bolder">
                            <i class="la la-list"></i>Check All</a>
                        @endif
                        @if (Auth::user()->usertype == 2)
                        <a href="{{ route('customer.appointment.index') }}" class="btn btn-primary font-weight-bolder">
                            <i class="la la-list"></i>Check All</a>
                        @endif
                        <!--end::Button-->
                    </div>

                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    @if (Auth::user()->usertype == 1 && Auth::user()->providertype == 1)
                    <table class="table table-separate table-head-custom" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Order Id</th>
                                <th>Customer</th>
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
                                <td>{{ @$appointment->customer->name }}</td>
                                <td>{{ @$appointment->provider->business_name }}</td>
                                <td>
                                   @if(@$appointment->ic->name)
                                    {{ @$appointment->ic->name }}
                                    @else
                                    N/A
                                    @endif


                                </td>
                                <td>
                                    @if ($appointment->amount)
                                    {{ $appointment->amount }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>{{ $appointment->payment_type }}</td>
                                <td>
                                    @if ($appointment->service_status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline" data-toggle="modal" data-target="#service_status_{{ $appointment->id }}">
                                        Pending</a>
                                    @elseif($appointment->service_status == 1)

                                    <a href="#" class="btn label label-lg label-light-success label-inline" data-toggle="modal" data-target="#service_status_{{ $appointment->id }}">Progress
                                    </a>

                                    @elseif($appointment->service_status == 2)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline" data-toggle="modal" data-target="#service_status_{{ $appointment->id }}">
                                        Complete</a>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ route('provider.appointment.show', $appointment->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-eye"></i></a>

                                    <a id="course_status" href="{{ route('provider.appointment.close', $appointment->id) }}" class="btn btn-sm btn-clean mr-2">Cancel</a>
                                </td>
                            </tr>

                            <!--Row Status -->
                            <div class="modal fade" id="service_status_{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Service Status
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('provider.appointment.status', $appointment->id) }}" method="post">
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
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    @elseif (Auth::user()->usertype == 1 && Auth::user()->providertype == 2)
                    <table class="table table-separate table-head-custom" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Order Id</th>
                                <th>Customer</th>
                                <th>Provider Name</th>
                                <th>IC Name</th>

                                <th>Paying Amount</th>
                                <th>Payment Mode</th>
                                <th>Service Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointmentsic as $appointment)

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
                                <td>
                                    @if ($appointment->amount)
                                    {{ $appointment->amount }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>{{ $appointment->payment_type }}</td>
                                <td>
                                    @if ($appointment->service_status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline" data-toggle="modal" data-target="#service_status_{{ $appointment->id }}">
                                        Pending</a>
                                    @elseif($appointment->service_status == 1)

                                    <a href="#" class="btn label label-lg label-light-success label-inline" data-toggle="modal" data-target="#service_status_{{ $appointment->id }}">Progress
                                    </a>

                                    @elseif($appointment->service_status == 2)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline" data-toggle="modal" data-target="#service_status_{{ $appointment->id }}">
                                        Complete</a>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ route('ic.provider.appointment.show', $appointment->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-eye"></i></a>

                                    <a id="course_status" href="{{ route('ic.provider.appointment.close', $appointment->id) }}" class="btn btn-sm btn-clean mr-2">Cancel</a>
                                </td>
                            </tr>

                            <!--Row Status -->
                            <div class="modal fade" id="service_status_{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Service Status
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('provider.appointment.status', $appointment->id) }}" method="post">
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
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    @elseif(Auth::user()->usertype == 2)
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
                                        @if(@$appointment->ic->name)
                                         {{ @$appointment->ic->name }}
                                         @else
                                         N/A
                                         @endif


                                     </td>

                                <td>
                                    @if ($appointment->amount)
                                    {{ $appointment->amount }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>{{ $appointment->payment_type }}</td>
                                <td>
                                    @if ($appointment->service_status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline">
                                        Pending</a>
                                    @elseif($appointment->service_status == 1)

                                    <a href="#" class="btn label label-lg label-light-success label-inline" data-toggle="modal">Progress
                                    </a>

                                    @elseif($appointment->service_status == 2)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline">
                                        Complete</a>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ route('customer.appointment.show', $appointment->id) }}" class="btn btn-sm btn-clean btn-icon mr-2"><i class="la la-eye"></i></a>

                                    <a id="course_status" href="{{ route('customer.appointment.close', $appointment->id) }}" class="btn btn-sm btn-clean">Cancel</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    @elseif(Auth::user()->providertype == 3)
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
                                        @if(@$appointment->ic->name)
                                         {{ @$appointment->ic->name }}
                                         @else
                                         N/A
                                         @endif
                                     </td>
                                <td>
                                    @if ($appointment->amount)
                                    {{ $appointment->amount }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>{{ $appointment->payment_type }}</td>
                                <td>
                                    @if ($appointment->service_status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline">
                                        Pending</a>
                                    @elseif($appointment->service_status == 1)

                                    <a href="#" class="btn label label-lg label-light-success label-inline" data-toggle="modal">Progress
                                    </a>

                                    @elseif($appointment->service_status == 2)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline">
                                        Complete</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('customer.appointment.show', $appointment->id) }}" class="btn btn-sm btn-clean btn-icon mr-2"><i class="la la-eye"></i></a>

                                    <a id="course_status" href="{{ route('customer.appointment.close', $appointment->id) }}" class="btn btn-sm btn-clean">Cancel</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
            <!--end::Card-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection
