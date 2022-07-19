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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Employee</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">Employee</a>
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
                        <h3 class="card-label">Employee Details

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
                        <b class="col-sm-8 mb-2"><img style="width: 150px;" src="{{ asset(@$dataIcshow->image)}}" alt=""></b>

                        <b class="col-sm-3"> Exprience </b>
                        <b class="col-sm-1"> : </b>
                        <b class="col-sm-8 mb-2">{{$dataIcshow->exprineces->experinces}} </b>

                        <b class="col-sm-3"> Exprience Year</b>
                        <b class="col-sm-1"> : </b>
                        <b class="col-sm-8">{{$diff}} </b>

                        <dd class="col-sm-12 border-2 border-bottom border-white pb-2 my-8">
                            <b style="font-weight:600;" class="h3"> Serivce </b>
                        </dd>

                        @foreach ($dataIcshow->empolyeeServices as $service)
                        <div class="col-md-3 d-flex flex-column align-items-center mb-4">
                            <img class="mb-4" style="width: 150px;"
                            src="{{ asset(@$service->services->default_image)}}" alt="">
                            <p class="col-sm-12 text-center font-weight-bold">
                            {{ @$service->services->name }}</p>
                        </div>
                        @endforeach

                        <!-- <dd class="col-sm-12 border-2 border-bottom border-white pb-2 my-8">
                            <b style="font-weight:600;" class="h3"> Serivce </b>
                            @foreach ($dataIcshow->empolyeeServices as $service)
                        <dd class="col-sm-8 text-center">{{ @$service->services->name }}</dd>
                        <img style="width: 150px;" src="{{ asset(@$service->services->default_image)}}" alt="">
                        @endforeach
                        </dd> -->


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