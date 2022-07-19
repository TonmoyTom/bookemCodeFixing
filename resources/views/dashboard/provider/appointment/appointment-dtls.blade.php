@extends('dashboard.layouts.master')
@section('title', 'Appointment Details')
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
                            <h3 class="card-label">Appointment Details
                                <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('provider.appointment.index') }}"
                                class="btn btn-primary btn-sm font-weight-bolder">
                                < Back</a>
                                    <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <b class="col-sm-3">Order ID </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">#{{ $data->appointment_no }}</dd>

                            <b class="col-sm-3">Customer Name </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$data->customer->name }}</dd>

                            <b class="col-sm-3">Vendor Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">

                                {{ @$data->provider->business_name }}

                            </dd>
                            <b class="col-sm-3">IC Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if(@$data->ic->name)
                                {{ @$data->ic->name }}
                                @else
                                N/A
                                @endif
                            </dd>

                            <b class="col-sm-3">Service Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                 @foreach($items as $item)
                                 {{ @$item->service->name}},

                                 @endforeach

                            </dd>


                            <b class="col-sm-3">Travel Fee</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">${{ $data->travel_fee }}</dd>

                            <b class="col-sm-3">Promocode Discount</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">${{ $data->promocode_discount }}</dd>

                            <b class="col-sm-3">Payment Mode</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->payment_type }}</dd>

                            <b class="col-sm-3">Payment Status</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">@if ($data->payment_status == 0) Not Paid @elseif ($data->payment_status == 1) Paid @endif</dd>

                            <b class="col-sm-3">Paying Amount</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if (@$data->payment_type == 'Hand Cash')
                                N/A
                                @else
                                ${{ $data->amount }}
                                @endif
                            </dd>
                            <b class="col-sm-3">Payable Amount</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">

                                ${{ $data->payable_amount  }}

                            </dd>



                            <b class="col-sm-3">Work Location</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">@if (@$data->provider->service_location == 1) At Provider Place  @else At Client's Location @endif</dd>


                            <b class="col-sm-3">Pickup Address </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if ($data->address)
                                    {{ $data->address }}
                                @else
                                    N/A
                                @endif
                            </dd>

                            <b class="col-sm-3">Start Time </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->start_time }}</dd>

                            <b class="col-sm-3">End Time </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->end_time }}</dd>

                            <b class="col-sm-3">Your Rating</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if (@$providerReview->rating)
                                    {{ @$providerReview->rating }}
                                @else
                                    N/A
                                @endif
                            </dd>

                            <b class="col-sm-3">Your Rating Comments</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if (@$providerReview->description)
                                    {{ @$providerReview->description }}
                                @else
                                    N/A
                                @endif
                            </dd>

                            <b class="col-sm-3">Customer Rating</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if (@$customerReview->rating)
                                    {{ @$customerReview->rating }}
                                @else
                                    N/A
                                @endif
                            </dd>

                            <b class="col-sm-3">Customer Rating Comments</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if (@$customerReview->description)
                                    {{ @$customerReview->description }}
                                @else
                                    N/A
                                @endif
                            </dd>

                            <b class="col-sm-3">Service Status</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if ($data->service_status == 0)
                                    Pending
                                @elseif ($data->service_status == 1)
                                    Progress
                                @elseif ($data->service_status == 2)
                                    Complete
                                @elseif ($data->service_status == 3)
                                    Cancel
                                @endif
                            </dd>

                            <b class="col-sm-3">Employee Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @foreach($items as $item)
                                     {{ucfirst(App\User::findOrFail($item->employee_id)->name) }},
                                @endforeach
                            </dd>
                        </div>
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
