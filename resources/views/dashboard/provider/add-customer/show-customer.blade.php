
@extends('dashboard.layouts.master')
@section('title','Customer Details')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Customer</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">Customer</a>
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
                        <h3 class="card-label">Customer Details
                            
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                      
                        <!--end::Button-->
                        <!--begin::Button-->
                        <a href="{{route('provider.add.customer.index')}}" class="btn btn-success font-weight-bolder">
                                <i class="la la-angle-left"></i>Back</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                        <div class="row">


                            <b class="col-sm-3"> Name </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$dataIcshow->name }}</dd>

                            <b class="col-sm-3"> Email </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$dataIcshow->email }}</dd>

                            <b class="col-sm-3"> Phone </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$dataIcshow->mobile }}</dd>

                            <b class="col-sm-3"> Address </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$dataIcshow->address }}</dd>

                            <b class="col-sm-3"> Image </b>
                            <b class="col-sm-1"> : </b>
                            <img style="width: 150px;" src="{{ asset(@$dataIcshow->image)}}" alt="">


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

