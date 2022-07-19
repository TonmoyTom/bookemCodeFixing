
@extends('dashboard.layouts.master')
@section('title','IC List')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">IC List</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">IC List</a>
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
                        <h3 class="card-label">IC List
                            <span class="d-block text-muted pt-2 font-size-sm">IC List here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->

                        <!--end::Button-->
                        <!--begin::Button-->
                        <a href="{{route('ic.provider.create')}}" class="btn btn-success font-weight-bolder">
                                <i class="la la-plus"></i>Add IC</a>
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
                                <th class="text-nowrap">Rating</th>
                                <th class="text-nowrap">Address</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataIcs as $dataIc)

                            <tr>
                                <td>{{@$loop->iteration}}</td>
                                <td>{{ @$dataIc->name}}</td>
                                <td>{{ @$dataIc->email}}</td>
                                <td>{{ @$dataIc->mobile}}</td>

                                <td>{{ @$dataIc->address}}</td>
                                <td>
                                    <a href="{{route('ic.provider.show',$dataIc->id)}}" class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>
                                    @php
                                    $check1 = 0;

                                    $check2 = 0;
                                    @endphp
                                    <form action="{{route('ic.provider.destroy',$dataIc->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-clean btn-sm" ><i class="la la-trash"></i></button>
                                    </form>
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

