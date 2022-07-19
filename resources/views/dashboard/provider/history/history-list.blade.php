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
                            <h3 class="card-label">Appointment History
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
                                    <th>Customer</th>
                                    <th>Provider Name</th>
                                    <th>IC Name</th>
                                    <th>Paying Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Payment Status</th>
                                    <th>Service Status</th>
                                    <th>Action</th>
                                    {{-- <th>Review</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historys as $appointment)
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
                                            @if ($appointment->payment_type=='Hand Cash')
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
                                            @elseif($appointment->payment_status == 2)
                                            <a href="#" class="btn label label-lg label-light-success label-inline">
                                                Refunded</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($appointment->service_status == 0)
                                                <a href="#"
                                                    class="btn label label-lg label-light-danger label-inline"
                                                    data-toggle="modal"
                                                    data-target="#service_status_{{ $appointment->id }}">
                                                    Pending</a>
                                            @elseif($appointment->service_status == 1)
                                                <a href="#"
                                                    class="btn label label-lg label-light-success label-inline"
                                                    data-toggle="modal"
                                                    data-target="#service_status_{{ $appointment->id }}">Progress
                                                </a>
                                            @elseif($appointment->service_status == 2)
                                                <a href="javascript:;"
                                                    class="btn label label-lg label-light-danger label-inline">
                                                    Complete</a>
                                            @elseif($appointment->service_status == 3)
                                                <a href="#"
                                                    class="btn label label-lg label-light-danger label-inline"
                                                    data-toggle="modal"
                                                    data-target="#service_status_{{ $appointment->id }}">
                                                    Cancel</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('provider.appointment.show', $appointment->id) }}"
                                                class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>


                                        </td>
                                        {{-- @if($appointment->service_status == 2)
                                        @if($appointment->provider_id !=null && $appointment->ic_id !=null)
                                        <td>
                                         <a href="#" class="btn btn-clean btn-sm"> Only IC</a>
                                            </td>
                                        @else
                                        <td>
                                            @php
                                                $checkRev = App\Models\CustomerReview::where('appointment_id', $appointment->id)->count();
                                                $rev = App\Models\CustomerReview::where('appointment_id', $appointment->id)->first();
                                            @endphp


                                            @if ($checkRev == 0)
                                                <a href="{{ route('provider.review.create', $appointment->id) }}"
                                                    class="btn btn-icon btn-clean btn-sm"><i
                                                        class="la la-comments-o"></i></a>
                                            @else
                                                {{ @$rev->rating }}  <i style="color: #fcc612;" class="fa fa-star"></i>
                                            @endif


                                        </td>
                                        @endif
                                        @endif --}}
                                    </tr>

                                    <!--Row Status -->
                                    <div class="modal fade" id="service_status_{{ $appointment->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Appointment Status
                                                    </h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form
                                                    action="{{ route('provider.appointment.status', $appointment->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Status</label>
                                                            <select name="service_status"
                                                                class="form-control">
                                                                <option value="0"
                                                                    @if ($appointment->service_status == 0) selected @endif>
                                                                    Pending
                                                                </option>
                                                                <option value="1"
                                                                    @if ($appointment->service_status == 1) selected @endif>
                                                                    Progress
                                                                </option>
                                                                <option value="2"
                                                                    @if ($appointment->service_status == 2) selected @endif>
                                                                    Complete
                                                                </option>
                                                                <option value="3"
                                                                    @if ($appointment->service_status == 3) selected @endif>
                                                                    Cancel
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
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
