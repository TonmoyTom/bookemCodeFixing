@extends('dashboard.layouts.master')
@section('title','Service Trash List')
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
                        <h3 class="card-label">Service Trash List
                            <span class="d-block text-muted pt-2 font-size-sm">All Trashed Service here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm font-weight-bolder"> < Back</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-nowrap">Image</th>
                                <th class="text-nowrap">Service Name</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td><img width="80" src="@if (!empty($row->default_image)) {{ asset($row->default_image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" alt="image"></td>
                                <td>{{$row->name}}</td>
                                <td>
                                    @if($row->status == 1)
                                    <a href="javascript:;" class="btn label label-lg label-light-success label-inline"> Active</a>
                                    @elseif($row->status == 0)
                                    <a href="javascript:;" class="btn label label-lg label-light-danger label-inline"> Inactive</a>
                                    @endif
                                </td>
                                <td>

                                    <a id="restore" href="{{route('user.service.restore',$row->id)}}" class="btn btn-icon btn-warning btn-hover-primary btn-xs mx-2" title="Restore"><i class="fa fa-undo"></i></a>
                                    <a id="delete" href="{{route('user.service.destroy',$row->id)}}" class="btn btn-icon btn-danger btn-hover-primary btn-xs mx-2" title="Delete"><i class="fa fa-trash"></i></a>
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


