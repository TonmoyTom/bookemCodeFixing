
@extends('dashboard.layouts.master')
@section('title','Customer List')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Customers</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">customer</a>
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
                        <h3 class="card-label">Customer List
                            <span class="d-block text-muted pt-2 font-size-sm">All Customer here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                      
                        <!--end::Button-->
                        <!--begin::Button-->
                        <a href="{{route('provider.add.customer.create')}}" class="btn btn-success font-weight-bolder">
                                <i class="la la-plus"></i>Add Customer</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-nowrap">Name</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Phone</th>
                                <th class="text-nowrap">Address</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $customer)
                            <tr>
                                <td>{{@$loop->iteration}}</td>
                                <td>{{ @$customer->name}}</td>
                                <td>{{ @$customer->email}}</td>
                                <td>{{ @$customer->mobile}}</td>
                                <td>{{ @$customer->address}}</td>
                                <td>
                                    <a href="{{route('provider.add.customer.show',$customer->id)}}" class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>

                                    <a href="{{route('provider.add.customer.edit',$customer->id)}}" class="btn btn-icon btn-clean btn-sm mx-2"><i class="la la-edit"></i></a>

                                    @php
                                    $check1 = 0;

                                    $check2 = 0;
                                    @endphp

                                    @if( $check1 > 0 || $check2 > 0)
                                    <button type="button" class="btn btn-icon btn-clean btn-sm delcheck"><i class="la la-trash"></i></button>
                                    @else
                                    <a id="delete" href="{{route('provider.add.customer.destroy',$customer->id)}}" class="btn btn-icon btn-clean btn-sm"><i class="la la-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            
                            <!--Row Status -->
                           
                          
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

