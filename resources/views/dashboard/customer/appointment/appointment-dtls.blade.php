@extends('dashboard.layouts.master')
@section('title', 'Appointment Details')
@section('udcontent')

<style>
    * Modal Css  */
.addressModal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  /* Modal Content */
  .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
  }

  /* Add Animation */
  @-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
  }

  @keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
  }

  /* The Close Button */
  .close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }

  .modal-header {
    padding: 2px 16px;
    color: white;
  }

  .modal-body {padding: 2px 16px;}
  .modal-body h2{
    padding: 15px 0px;
  }
  .modal-footer {
    padding: 15px 16px;
    color: white;
    border: none!important;
  }
</style>

<div class="addressModal" id="exampleModal" style="display: none"  >
    <div class="modal-content" >
        <form action="{{route('customer.appointment.address.update' , $data->id)}}" method="post">
            @csrf
        <div class="modal-body">
            <h2>Change Your Address</h2>
            <div class="form-group">
                <input
                    class="form-control map-input mb-2 {{ $errors->has('address') ? 'is-invalid' : '' }}"
                    type="text" name="address" id="address" value="{{ old('address' , $data->address) ?? null }}"
                    placeholder="Enter your address">

                <input type="hidden" name="latitude" id="address-latitude"
                    value="{{ old('latitude' ,$data->latitude) ?? '0' }}" />
                <input type="hidden" name="longitude" id="address-longitude"
                    value="{{ old('longitude' ,$data->longitude) ?? '0' }}" />

                <div id="address-map-container" class="mb-2"
                    style="width:100%;height:200px;">
                    <div style="width: 100%; height: 100%" id="address-map"></div>
                </div>
                <div style='color:red; padding: 0 5px;'>
                    {{ $errors->has('address') ? $errors->first('address') : '' }}</div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary"  id="close">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Appointment</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Appointment</a>
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
                            <h3 class="card-label">Appointment Details
                                <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ URL::previous() }}"
                                class="btn btn-primary btn-sm font-weight-bolder">
                                < Back</a>
                                    <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <b class="col-sm-3">Order ID </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">#{{ $data->appointment_no }}</dd>

                            <b class="col-sm-3">Vendor Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                {{ @$data->provider->business_name }}
                            </dd>
                            <b class="col-sm-3">IC Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if(@$data->ic->name)
                                {{ @$data->ic->name }}
                                @else
                                N/A
                                @endif
                            </dd>
                            <b class="col-sm-3">Service Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                 @foreach($items as $item)
                                 {{ $item->service?->name}},
                                 @endforeach

                            </dd>


                            <b class="col-sm-3">Travel Fee</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">${{ $data->travel_fee }}</dd>

                            <b class="col-sm-3">Promocode Discount</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">${{ $data->promocode_discount }}</dd>

                            <b class="col-sm-3">Payment Mode</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->payment_type }}</dd>

                            <b class="col-sm-3">Payment Status</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">@if ($data->payment_status == 0) Not Paid @elseif ($data->payment_status == 1) Paid @endif</dd>

                            <b class="col-sm-3">Paying Amount</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if (@$data->payment_type == 'Hand Cash')
                                N/A
                                @else
                                ${{ $data->amount }}
                                @endif
                            </dd>
                            <b class="col-sm-3">Payable Amount</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">

                                ${{ $data->payable_amount  }}

                            </dd>
                            <b class="col-sm-3">Work Location</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">@if (@$data->provider->service_location == 1) At Provider Place  @else At Client's Location @endif</dd>


                            <b class="col-sm-3"> Address </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if ($data->address)
                                    {{ $data->address }}

                                @else
                                    N/A
                                @endif
                                <a style="cursor: pointer" id="modalAddress"  ">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </dd>

                            <b class="col-sm-3">Start Time </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->start_time }}</dd>

                            <b class="col-sm-3">End Time </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->end_time }}</dd>

                            <b class="col-sm-3">Your Rating</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if (@$customerReview->rating)
                                    {{ @$customerReview->rating }}
                                @else
                                    N/A
                                @endif
                            </dd>

                            <b class="col-sm-3">Your Rating Comments</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if (@$customerReview->description)
                                    {{ @$customerReview->description }}
                                @else
                                    N/A
                                @endif
                            </dd>

                            <b class="col-sm-3">Vendor Rating</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if (@$providerReview->rating)
                                    {{ @$providerReview->rating }}
                                @else
                                    N/A
                                @endif
                            </dd>

                            <b class="col-sm-3">Vendor Rating Comments</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if (@$providerReview->description)
                                    {{ @$providerReview->description }}
                                @else
                                    N/A
                                @endif
                            </dd>

                            <b class="col-sm-3">Service Status</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if ($data->service_status == 0)
                                    Pending
                                @elseif ($data->service_status == 1)
                                    Progress
                                @elseif ($data->service_status == 2)
                                    Complete
                                @endif
                            </dd>

                            <b class="col-sm-3">Employee Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @foreach($items as $item)
                                     {{ucfirst(App\User::findOrFail($item->employee_id)->name) }},
                                @endforeach
                            </dd>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

@section('customjs')
<script
src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key')}}&libraries=places&callback=initialize&language=en&region=GB"
async defer></script>
<script src="/js/mapInput.js"></script>
<script>
  let inputV = document.getElementById("exampleModal");
    $('#modalAddress').click(function(){
        inputV.style.display = 'block';
    });
    $('#close').click(function(){
        inputV.style.display= 'none';
    });



</script>
@endsection
@endsection
