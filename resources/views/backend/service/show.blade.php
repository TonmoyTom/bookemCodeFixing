@extends('backend.layouts.master')
@section('title', 'Service Details')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Service</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Service</a>
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
                            <h3 class="card-label">Service Details
                                <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm font-weight-bolder"> < Back</a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">

                        <style>
                            label{
                                font-weight: 700 !important;
                            }
                        </style>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Provider</label>
                                            <p>{{ $service->provider->business_name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Service Name</label>
                                            <p>{{ $service->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Regular Price</label>
                                            <p>{{ $service->selling_price }}</p>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Discount Type</label>
                                            <p>
                                                @if ($service->discount_type == 1)
                                                    U.S Dollar($)
                                                @elseif($service->discount_type == 2)
                                                    Percentage (%)
                                                @else
                                                    N/A
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Discount</label>
                                            <p>
                                                {{ $service->discount }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Discount Price</label>
                                            <p>
                                                {{ $service->discount_price }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Active Price</label>
                                            <p>
                                                @if ($service->price_active == 1)
                                                    Reqular Price
                                                @else
                                                    Discount Price
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Price Status</label>
                                            <p>
                                                @if ($service->price_status == 1)
                                                    Active
                                                @else
                                                    Upcoming
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Service Duration (Hours)</label>
                                            <p>{{ $service->service_hour }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Service Duration (Minutes)</label>
                                            <p>{{ $service->service_min }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <p>{!! $service->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="d-block">Default Image</label>
                                            <img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100px;"
                                                id="showDefaultImage" src="@if (!empty($service->default_image)) {{ asset($service->default_image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" alt="image">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Sub Images</label>
                                            <div class="row">
                                                @foreach ($serviceImages as $serviceImage)
                                                    <div class="col-md-2">
                                                        <img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100%;"
                                                            id="showSubImage1" src="@if (!empty($serviceImage->service_image)) {{ asset($serviceImage->service_image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" alt="image">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Seo Keyword</label>
                                            <p>{{ $service->seo_keyword }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Seo Description</label>
                                            <p>{{ $service->seo_description }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="d-block" for="">Status</label>
                                            @if ($service->status == 1)
                                                <button class="btn btn-success btn-sm"><i class="fa fa-check"></i>
                                                    Active</button>
                                            @else
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-check"></i>
                                                    Inactive</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
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
