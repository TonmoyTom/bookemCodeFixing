@extends('backend.layouts.master')
@section('title', 'Provider Review Details')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Provider Review Details</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Provider Review Details</a>
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
                            <h3 class="card-label">Provider Review Details
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('providerreview.index') }}"
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


                            <b class="col-sm-3">User Name </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$data->customer->name }}</dd>

                            <b class="col-sm-3">Provider Name </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$data->provider->business_name }}</dd>

                            <b class="col-sm-3">Service Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                 @foreach($items as $item)
                                 {{ $item->service->name}} /

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
                                @if ($data->amount)
                                    ${{ $data->amount }}
                                @else
                                    N/A
                                @endif
                            </dd>



                            <b class="col-sm-3">Work Location</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">@if (@$data->provider->service_location == 1) At Provider Place @else At Client's Location @endif</dd>


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

                            <b class="col-sm-3">Rating</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">

                                @if (@$rating->rating)
                                {{ @$rating->rating }}
                                @endif
                            </dd>


                            <b class="col-sm-3">Rating Comments</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if (@$rating->description)
                                {{ @$rating->description }}
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
                                @endif
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
