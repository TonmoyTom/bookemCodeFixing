@extends('backend.layouts.master')
@section('title','Coupon')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Coupon</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">Coupon</a>
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
                        <h3 class="card-label">Coupon List
                            <span class="d-block text-muted pt-2 font-size-sm">All Coupon here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="" data-toggle="modal" data-target="#addmodal" class="btn btn-primary font-weight-bolder">
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
                            </span>New Coupon</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Purchase by</th>
                                <th>Sell Status</th>
                                <th>Coupon Name</th>
                                <th>Coupon Code</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>@if($row->purchase_by)
                                    {{$row->purches->name}}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>@if($row->purchase_by)
                                    sold
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->promocode}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{$row->discount}}</td>
                                <td>{{$row->start_date}}</td>
                                <td>{{$row->end_date}}</td>


                                <td>
                                    @if($row->status == 1)
                                    <a href="#" class="btn label label-lg label-light-success label-inline" data-toggle="modal" data-target="#row_status_{{$row->id}}"> Active</a>
                                    @elseif($row->status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline" data-toggle="modal" data-target="#row_status_{{$row->id}}"> Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editmodal_{{$row->id}}" class="btn btn-icon btn-clean"><i class="la la-edit"></i></a>

                                    @php
                                    $check1 = 0;

                                    $check2 = 0;
                                    @endphp

                                    @if( $check1 > 0 || $check2 > 0)
                                    <button type="button" class="btn btn-icon btn-clean delcheck"><i class="la la-trash"></i></button>
                                    @else
                                    <a id="delete" href="{{route('cupon.destroy',$row->id)}}" class="btn btn-icon btn-clean"><i class="la la-trash"></i></a>
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
                                        <form action="{{route('category.status', $row->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="1" @if( $row->status == 1 ) selected @endif >Active</option>
                                                        <option value="2" @if( $row->status == 0 ) selected @endif >Inactive</option>
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

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editmodal_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Coupon</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('cupon.update',$row->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Coupon Name</label>
                                                    <input type="text" name="name" value="{{$row->name}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Coupon Code</label>
                                                    <input type="text" name="promocode" value="{{$row->promocode}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('promocode'))?($errors->first('promocode')):''}}</div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="">Price</label>
                                                    <input type="number" name="price" value="{{$row->price}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('price'))?($errors->first('price')):''}}</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Discount</label>
                                                    <input type="number" name="discount" value="{{$row->discount}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('discount'))?($errors->first('discount')):''}}</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">start Date</label>
                                                    <input type="date" name="start_date" class="form-control" value="{{$row->start_date}}">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('start_date'))?($errors->first('start_date')):''}}</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">End Date</label>
                                                    <input type="date" name="end_date" value="{{$row->end_date}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('end_date'))?($errors->first('end_date')):''}}</div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
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


<!-- Add Modal -->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('cupon.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Coupon Name</label>
                        <input type="text" name="name" placeholder="Category name" class="form-control">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Coupon Code</label>
                        <input type="text" name="promocode" placeholder="Category name" class="form-control">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('promocode'))?($errors->first('promocode')):''}}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" placeholder="Enter Discount on Coupon" class="form-control">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('price'))?($errors->first('price')):''}}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Discount</label>
                        <input type="number" name="discount" placeholder="Enter Discount on Coupon" class="form-control">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('discount'))?($errors->first('discount')):''}}</div>
                    </div>

                    <div class="form-group">
                        <label for="">start Date</label>
                        <input type="date" name="start_date" placeholder="Start Date" class="form-control">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('start_date'))?($errors->first('start_date')):''}}</div>
                    </div>
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input type="date" name="end_date" placeholder="End Date" class="form-control">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('end_date'))?($errors->first('end_date')):''}}</div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
