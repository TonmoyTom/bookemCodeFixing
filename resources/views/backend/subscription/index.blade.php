@extends('backend.layouts.master')
@section('title', 'Subscriptions')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">All Subscriptions Here..</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted"> Subscriptions</a>
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
                            <h3 class="card-label">Subscription List
                                <span class="d-block text-muted pt-2 font-size-sm">All Subscriptions here</span>
                            </h3>
                        </div>

                    </div>
                    <div class="card-body table-responsive">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom" id="dataTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>User Name</th>
                                    <th>Plan Name</th>
                                    <th>Subs Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Trial Start at</th>
                                    <th>Trial Ends at</th>
                                    <th>Stripe Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscriptions as $subscription)
    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ @$subscription->user->business_name }}</td>
                                        <td>{{ @$subscription->plan->name }}</td>
                                        <td>{{ $subscription->name }}</td>
                                        <td>{{ @$subscription->plan->price }}</td>
                                        <td>{{ $subscription->quantity }}</td>
                                        <td>{{ $subscription->created_at }}</td>
                                        <td>{{ $subscription->trial_ends_at }}</td>
                                        <td>{{ $subscription->stripe_status }}</td>
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
