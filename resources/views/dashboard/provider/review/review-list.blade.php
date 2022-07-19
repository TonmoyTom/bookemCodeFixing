
@extends('dashboard.layouts.master')
@section('title','Reviews')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Reviews</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Reviews</a>
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
                        <h3 class="card-label">Reviews List
                            <span class="d-block text-muted pt-2 font-size-sm">All Reviews here</span>
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
                                <th>Rating</th>
                                <th>Rating Comments</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                @php
                                    $rating = App\Models\CustomerReview::where('appointment_id', $appointment->id)->first();
                                @endphp

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>#{{ $appointment->appointment_no }}</td>
                                    <td>{{ @$appointment->customer->name }}</td>
                                    
                                    <td>{{ @$rating->rating }}
                                    <i style="color: #fcc612;" class="fa fa-star"></i>
                                    </td>
                                    <td>{{ @$rating->description }}</td>
                                    <td>
                                        <a href="{{ route('provider.review.show', $appointment->id) }}"
                                            class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>
                                        <a href="{{ route('provider.review.edit', $rating->id) }}"
                                            class="btn btn-icon btn-clean btn-sm"><i class="la la-edit"></i></a>
                                        <a id="delete" href="{{ route('provider.review.destroy', $rating->id) }}"
                                            class="btn btn-icon btn-clean btn-sm"><i class="la la-trash"></i></a>
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

