@extends('backend.layouts.master')
@section('title', 'Provider Review')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Provider Review</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Provider Review</a>
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
                            <h3 class="card-label">Provider Review List
                                <span class="d-block text-muted pt-2 font-size-sm">All new Provider Review here</span>
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
                                @foreach ($appointments as $appointment)

                                @php
                                    $rating = App\Models\CustomerReview::where('appointment_id',$appointment->id)->first();
                                @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>#{{ $appointment->appointment_no }}</td>
                                        <td>{{ @$appointment->customer->name }}</td>
                                        <td>{{ @$appointment->provider->business_name }}</td>
                                       
                                       
                                        <td>{{ @$rating->rating }}</td>
                                        <td>{{ @$rating->description }}</td>
                                        <td>
                                            <a href="{{ route('providerreview.show', $appointment->id) }}"
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
