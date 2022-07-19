@extends('dashboard.layouts.master')
@section('title','My Cupon')
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
                        <h3 class="card-label">My Cupon List
                            <span class="d-block text-muted pt-2 font-size-sm">All My Cupon here</span>
                        </h3>
                    </div>
                   

                </div>
                <div class="card-body table-responsive">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                               
                                <th>Cupon Name</th>
                                <th>Cupon Code</th>
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
                               
                                <td>{{$row->purchase->name}}</td>
                                <td>{{$row->purchase->promocode}}</td>
                                <td>{{$row->purchase->price}}</td>
                                <td>{{$row->purchase->discount}}</td>
                                <td>{{$row->purchase->start_date}}</td>
                                <td>{{$row->purchase->end_date}}</td>


                                <td>
                                    @if($row->purchase->status == 1)
                                    <a href="#" class="btn label label-lg label-light-success label-inline"> Active</a>
                                    @elseif($row->purchase->status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline"> Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('my.cupon.show',$row->id)}}" class="btn btn-icon btn-clean"><i class="la la-eye"></i></a>


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