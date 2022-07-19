@extends('dashboard.layouts.master')
@section('title', 'Create Coupon')
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
                            <h3 class="card-label">Edit Coupon</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive" id="multipleService" >
                        <form action="{{ route('cuppon.multiple.update' , $serviceCode->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-10">Coupon for All Services</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Coupon Name</label>
                                        <input type="text" name="name" placeholder="Cupon name" class="form-control" value="{{$serviceCode->name}}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Cupon Code</label>
                                        <input type="text" name="promocode" placeholder="Cupon Code" class="form-control" value="{{$serviceCode->promocode}}">
                                        <div style='color:red; padding: 0 5px;' >
                                            {{ $errors->has('promocode') ? $errors->first('promocode') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Percetange</label>
                                        <input type="text" name="percentage" id="pecentange"
                                            placeholder="Enter Discount on Cupon" class="form-control" value="{{$serviceCode->percentage}}">
                                        <div style='color:red; padding: 0 5px;' >
                                            {{ $errors->has('discount') ? $errors->first('discount') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Start Date</label>
                                        <input type="date" name="start_date" placeholder="Start Date" class="form-control" value="{{ $serviceCode->start_date->toDateString() }}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('end_date') ? $errors->first('start_date') : '' }}</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">End Date</label>
                                        <input type="date" name="end_date" placeholder="End Date" class="form-control" value="{{ $serviceCode->end_date->toDateString() }}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('end_date') ? $errors->first('end_date') : '' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-10">Payment Information</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="radio" checked id="card_payment" name="payment_type"
                                            value="Card Payment"><label for="card_payment"> Card Payment</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="radio" id="wallet_payment" name="payment_type"
                                            value="Wallet Payment"><label for="wallet_payment"> Wallet Payment</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Next Step</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
