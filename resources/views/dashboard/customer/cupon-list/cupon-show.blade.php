@extends('dashboard.layouts.master')
@section('title', 'Appointment Details')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Appointment Canceled</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Appointment Canceled</a>
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
                            <h3 class="card-label">My Cupon Details
                                <span class="d-block text-muted pt-2 font-size-sm">All My Cupon here</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ URL::previous() }}"
                                class="btn btn-primary btn-sm font-weight-bolder">
                                < Back</a>
                                    <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            

                            <b class="col-sm-3">#Order_no</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$data->order_no }}</dd>

                            <b class="col-sm-3">Purchase By</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$data->user->name }}</dd>

                            <b class="col-sm-3">Cupon Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                               
                                {{ @$data->purchase->name }}
                               
                            </dd>
                            <b class="col-sm-3">Cupon Code</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                {{ @$data->purchase->promocode }}
                            </dd>
                            <b class="col-sm-3">Price</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                {{ @$data->purchase->price }}
                            </dd>
                           
                            <b class="col-sm-3">Promocode Discount</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">${{ @$data->purchase->discount }}</dd>

                            <b class="col-sm-3">Payment Type</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->payment_type }}</dd>
                            <b class="col-sm-3">Payment Method</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->payment_method }}</dd>
                            <b class="col-sm-3">Balance Transaction</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->balance_transaction }}</dd>
                            <b class="col-sm-3">Amount</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->amount }}</dd>

                            <b class="col-sm-3">Payment Status</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">@if ($data->payment_status == 0) Not Paid @elseif ($data->payment_status == 1) Paid @endif</dd>

                          <b class="col-sm-3">Start Time </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->purchase->start_time }}</dd>

                            <b class="col-sm-3">End Time </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->purchase->end_time }}</dd>

                         

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
