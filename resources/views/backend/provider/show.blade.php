@extends('backend.layouts.master')
@section('title','Provider')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Provider</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">provider</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Actions</a>
                <!--end::Actions-->
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-success svg-icon-2x">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover">
                            <li class="navi-header font-weight-bold py-4">
                                <span class="font-size-lg">Choose Label:</span>
                                <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                            </li>
                            <li class="navi-separator mb-3 opacity-70"></li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-success">Customer</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-danger">Partner</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-primary">Member</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-dark">Staff</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-separator mt-3 opacity-70"></li>
                            <li class="navi-footer py-4">
                                <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                    <i class="ki ki-plus icon-sm"></i>Add new</a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar-->
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
                        <h3 class="card-label">Provider Details
                            <span class="d-block text-muted pt-2 font-size-sm">All provider details here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->

                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <a href="{{ route('provider.index')}}" class="btn btn-primary font-weight-bolder">
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
                            </span>Back</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">Over View</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>Provider Name</td>
                                    <td>{{$providers->name}}</td>

                                </tr>
                                <tr>

                                    <td>Business Name</td>
                                    <td>{{$providers->business_name}}</td>

                                </tr>
                                <tr>

                                    <td>Provider Email</td>
                                    <td>{{$providers->email}}</td>
                                </tr>
                                <tr>

                                    <td>Mobile Number</td>
                                    <td>{{$providers->mobile}}</td>
                                </tr>
                                <tr>

                                    <td>Address</td>
                                    <td>{{$providers->address}}</td>
                                </tr>
                                <tr>

                                    <td>Gender</td>
                                    <td>@if($providers->gender)
                                        {{$providers->gender}}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>

                                    <td>Image</td>
                                    <td><img class="border" src="@if(!empty($providers->image)) {{asset($providers->image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="image" width="150"></td>
                                </tr>
                                <tr>

                                    <td>Service Location</td>
                                    <td>
                                        @if($providers->service_location==1)
                                        My Place
                                        @else
                                        Client Location
                                        @endif
                                    </td>
                                </tr>

                                <tr>

                                    <td>Total Service</td>
                                    <td>
                                        {{$serviceCount}}
                                    </td>
                                </tr>
                                <tr>

                                    <td>Total Appointments</td>
                                    <td>
                                        {{$appointmentCount}}
                                    </td>
                                </tr>
                                <tr>

                                    <td>Complete Appointments</td>
                                    <td>
                                        {{$completeappointmentCount}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end: Datatable-->
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->

                    <h3>All Service</h3>
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-nowrap">Image</th>

                                <th class="text-nowrap">Service Name</th>
                                <th class="text-nowrap"> Price</th>
                                <th class="text-nowrap">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($service as $row)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td><img width="80" src="{{asset($row->default_image)}}" alt="image"></td>

                                <td>{{$row->name}}</td>
                                <td>{{$row->selling_price}}</td>
                                <td>
                                    @if($row->status == 1)
                                    <a href="#" class="btn label label-lg label-light-success label-inline"> Active</a>
                                    @elseif($row->status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline"> Inactive</a>
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
                                        <form action="{{route('service.status', $row->id)}}" method="post">
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
                <div class="card-body">
                    <!--begin: Datatable-->

                    <h3>All Payment Methods</h3>
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-nowrap">Bank Name</th>

                                <th class="text-nowrap">Branch Name</th>
                                <th class="text-nowrap"> Card Holder Name</th>
                                <th class="text-nowrap"> Card Number</th>
                                <th class="text-nowrap">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($providerpaymentmetods as $paymentdata)
                            <tr class="odd gradeX">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $paymentdata->bank_name }}</td>
                                <td>{{ $paymentdata->branch_name }}</td>
                                <td>{{ $paymentdata->cardholder_name }}</td>
                                <td>{{$paymentdata->card_number}}</td>
                                <td>
                                    @if($paymentdata->status == 1)
                                    <a href="#" class="btn label label-lg label-light-success label-inline"> Active</a>
                                    @elseif($paymentdata->status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline"> Inactive</a>
                                    @endif
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