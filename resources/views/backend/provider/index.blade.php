@extends('backend.layouts.master')
@section('title','Providers')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Providers</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">Providers</a>
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
                        <h3 class="card-label">Providers List
                            <span class="d-block text-muted pt-2 font-size-sm">All provider here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{route('provider.create')}}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>New Record</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Logo</th>
                                <th>Provider Type</th>
                                <th>Business Name</th>
                                <th>Owner</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Online Status</th>
                                <th>Account Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img class="border" src="@if(!empty($row->image)) {{asset($row->image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="image" width="60"></td>
                                <td>
                                    @if($row->providertype == 1)
                                    Facility
                                    @elseif($row->providertype == 2)
                                    Independent Contractor
                                    @endif
                                </td>
                                <td>{{$row->business_name}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->mobile}}</td>
                                <td>
                                    @if (Cache::has('user-is-online-' . $row->id))
                                        <span class="text-success">Online</span>
                                    @else
                                        <span class="text-secondary">Offline</span>
                                    @endif
                                    <br>
                                    {{ \Carbon\Carbon::parse($row->last_seen)->diffForHumans() }}
                                </td>
                                <td>
                                    @if ($row->status == 0)
                                        <a href="#" class="btn label label-lg label-light-success label-inline"
                                            data-toggle="modal" data-target="#row_status_{{ $row->id }}">
                                            Active</a>
                                    @elseif($row->status == 1)
                                        <a href="#" class="btn label label-lg label-light-danger label-inline"
                                            data-toggle="modal" data-target="#row_status_{{ $row->id }}">
                                            Deactive</a>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('provider.edit',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a id="delete" href="{{route('provider.destroy',$row->id)}}" class="btn btn-icon btn-danger btn-hover-primary btn-xs mx-3">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a  href="{{route('provider.show',$row->id)}}" class="btn btn-icon btn-success btn-hover-primary btn-xs mx-3">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                </td>
                            </tr>

                            <!--Row Status -->
                            <div class="modal fade" id="row_status_{{ $row->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('provider.status', $row->id) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="0"
                                                            @if ($row->status == 0) selected @endif>Active
                                                        </option>
                                                        <option value="1"
                                                            @if ($row->status == 1) selected @endif>
                                                            Deactive</option>
                                                    </select>

                                                    <div style='color:red; padding: 0 5px;'>
                                                        {{ $errors->has('status') ? $errors->first('status') : '' }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
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
