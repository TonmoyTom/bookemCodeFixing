
@extends('dashboard.layouts.master')
@section('title','Service')
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
                        <h3 class="card-label">Service List
                            <span class="d-block text-muted pt-2 font-size-sm">All Service here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{route('user.service.trash.list')}}" class="btn btn-primary font-weight-bolder mr-3">
                           <i class="la la-trash"></i> Trash Bin</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <a href="{{route('user.service.create')}}" class="btn btn-success font-weight-bolder">
                                <i class="la la-plus"></i> New Record</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="dataTable">
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
                                    <a href="#" class="btn label label-lg label-light-success label-inline" data-toggle="modal" data-target="#row_status_{{$row->id}}"> Active</a>
                                    @elseif($row->status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline" data-toggle="modal" data-target="#row_status_{{$row->id}}"> Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('user.service.show',$row->id)}}" class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>

                                    <a href="{{route('user.service.edit',$row->id)}}" class="btn btn-icon btn-clean btn-sm mx-2"><i class="la la-edit"></i></a>

                                    @php
                                    $check1 = 0;

                                    $check2 = 0;
                                    @endphp

                                    @if( $check1 > 0 || $check2 > 0)    
                                    <button type="button" class="btn btn-icon btn-clean btn-sm delcheck"><i class="la la-trash"></i></button>
                                    @else
                                    <a id="trash" href="{{route('user.service.trash',$row->id)}}" class="btn btn-icon btn-clean btn-sm"><i class="la la-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <!--Row Status -->
                            <div class="modal fade" id="row_status_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('user.service.status', $row->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="1" @if( $row->status == 1 ) selected @endif >Active</option>
                                                        <option value="0" @if( $row->status == 0 ) selected @endif >Inactive</option>
                                                    </select>

                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('status'))?($errors->first('status')):''}}</div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

