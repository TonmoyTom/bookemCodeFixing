@extends('dashboard.layouts.master')
@section('title','Favourite')
@section('udcontent')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Favourite List
                            <span class="d-block text-muted pt-2 font-size-sm">All Favourite here</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-nowrap">Image</th>
                                <th class="text-nowrap">Provider Name</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td><img width="80" src="{{asset($row->provider->business_logo)}}" alt="image"></td>
                                <td>{{$row->provider->business_name}}</td>
                                <td>

                                    <a id="delete" href="#" class="btn btn-icon btn-clean btn-sm"><i class="la la-trash"></i></a>

                                    <a href="{{ route('vendor.details',$row->provider->business_url) }}" target="_blank" class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>

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