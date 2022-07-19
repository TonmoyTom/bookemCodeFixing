
@extends('dashboard.layouts.master')
@section('title','Payment Method')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Payment Method</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                
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
                        <h3 class="card-label">Create Payment Method
                            <span class="d-block text-muted pt-2 font-size-sm">create your Payment Method here</span>
                        </h3>
                    </div>

                </div>
                <div class="card-body table-responsive">
                    <!--begin: Datatable-->
                    <form action="{{ route('provider.payment.method.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Bank Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your bank name"
                                            name="bank_name" value="{{ old('bank_name') }}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('bank_name') ? $errors->first('bank_name') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Branch Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your branch name"
                                            name="branch_name" value="{{ old('branch_name') }}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('branch_name') ? $errors->first('branch_name') : '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Card Holder Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your card holder name"
                                            name="cardholder_name" value="{{ old('cardholder_name') }}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('cardholder_name') ? $errors->first('cardholder_name') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Card Number</label>
                                        <input type="text" class="form-control" placeholder="Enter your card number name"
                                            name="card_number" value="{{ old('card_number') }}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('card_number') ? $errors->first('card_number') : '' }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            

                          
                            
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="submit" id="submitBtn" value="Submit" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <!--end: Datatable-->
                </div>
                <hr>
                <div class="card-body table-responsive">

                
                    <div class="card-title">
                        <h3 class="card-label">Your All Payment Method</h3>
                    </div>
                <hr>
                
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom" id="dataTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Bank Name</th>
                                    <th>Branch Name</th>
                                    <th>Card Holder Name</th>
                                    <th>Status</th>
                                   
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $paymentdata)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $paymentdata->bank_name }}</td>
                                        <td>{{ $paymentdata->branch_name }}</td>
                                        <td>{{ $paymentdata->cardholder_name }}</td>
                                       
                                        
                                        <td>
                                            @if ($paymentdata->status == 0)
                                                <a href="#" class="btn label label-lg label-light-danger label-inline"
                                                    data-toggle="modal"
                                                    data-target="#paymentdata_status_{{ $paymentdata->id }}"> Inactive</a>
                                            @else
                                            <a href="#" class="btn label label-lg label-light-success label-inline"
                                                    data-toggle="modal"
                                                    data-target="#paymentdata_status_{{ $paymentdata->id }}"> Active</a>
                                            
                                            @endif
                                        </td>
                                    <td>
                                    <a href="#" data-toggle="modal" data-target="#editmodal_{{$paymentdata->id}}" class="btn btn-icon btn-clean"><i class="la la-edit"></i></a>

                                    @php
                                    $check1 = 0;

                                    $check2 = 0;
                                    @endphp

                                    @if( $check1 > 0 || $check2 > 0)
                                    <button type="button" class="btn btn-icon btn-clean delcheck"><i class="la la-trash"></i></button>
                                    @else
                                    <a id="delete" href="{{route('provider.payment.method.destroy',$paymentdata->id)}}" class="btn btn-icon btn-clean"><i class="la la-trash"></i></a>
                                    @endif

                                </td>
                                        
                                    </tr>

                                    <!--Row Status -->
                                    <div class="modal fade" id="paymentdata_status_{{ $paymentdata->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Payment Status</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form
                                                    action="{{ route('provider.payment.method.status', $paymentdata->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="1" @if( $paymentdata->status == 1 ) selected @endif >Active</option>
                                                        <option value="0" @if( $paymentdata->status == 0 ) selected @endif >Inactive</option>
                                                    </select>

                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('status'))?($errors->first('status')):''}}</div>
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

                                     <!-- Edit Modal -->
                            <div class="modal fade" id="editmodal_{{$paymentdata->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Payment Method</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('provider.payment.method.update',$paymentdata->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Bank Name</label>
                                                    <input type="text" name="bank_name" value="{{$paymentdata->bank_name}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('bank_name'))?($errors->first('bank_name')):''}}</div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="">Branch Name</label>
                                                    <input type="text" name="branch_name" value="{{$paymentdata->branch_name}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('branch_name'))?($errors->first('branch_name')):''}}</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Card Holder Name</label>
                                                    <input type="text" name="cardholder_name" value="{{$paymentdata->cardholder_name}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('cardholder_name'))?($errors->first('cardholder_name')):''}}</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Card Holder Name</label>
                                                    <input type="text" name="card_number" value="{{$paymentdata->card_number}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('card_number'))?($errors->first('card_number')):''}}</div>
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
@endsection

