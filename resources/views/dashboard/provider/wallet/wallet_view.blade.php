@extends('dashboard.layouts.master')
@section('title','Service')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Transaction Details</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->

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

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <!--begin::Nav Panel Widget 1-->
                    <div class="card card-custom gutter-b card-stretch card-shadowless">

                        <!--begin::Body-->
                        <div class="card-body">


                            


                            <!--begin::Nav Tabs-->
                            <ul class="dashboard-tabs nav nav-pills nav-danger row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist">
                                <!--begin::Item-->
                                <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_1">
                                        <span class="nav-icon py-2 w-auto">
                                            <span class="svg-icon svg-icon-3x">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                                        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Net Income</span>


                                        <span>
                                            @if($providerBalance)
                                            ${{ @$providerBalance->total_balance }}
                                            @else
                                                0
                                            
                                            @endif
                                        </span>
                                    </a>

                                </li>
                                <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_1">
                                        <span class="nav-icon py-2 w-auto">
                                            <span class="svg-icon svg-icon-3x">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                                        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Balance</span>


                                        <span>
                                            @if($providerBalance)
                                            ${{ @$providerBalance->balance }}
                                            @else
                                                0
                                            
                                            @endif
                                        </span>
                                    </a>

                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a data-toggle="modal" data-target="#withdraw_model" class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_2">
                                        <span class="nav-icon py-2 w-auto">
                                            <span class="svg-icon svg-icon-3x">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Available for Withdrawal</span>

                                        <span>
                                            @if($providerBalance)
                                            ${{ @$providerBalance->balance }}
                                            @else
                                                0
                                            
                                            @endif
                                        </span>
                                    </a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->


                                <!--end::Item-->
                            </ul>
                            <!--end::Nav Tabs-->


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--begin::Nav Panel Widget 1-->
                </div>
            </div>
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Withdraw History
                            <span class="d-block text-muted pt-2 font-size-sm">Withdraw History here</span>
                        </h3>
                    </div>

                </div>
                <div class="card-body table-responsive">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Bank Name</th>
                                <th>Card Holder Name</th>
                                <th>Card Number</th>
                                <th>Amount</th>
                                <th>Date & Time</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($withdrawhistorys as $withdrawhistory)


                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ @$withdrawhistory->providerCard->bank_name}}</td>
                                <td>{{ @$withdrawhistory->providerCard->cardholder_name}}</td>
                                <td>{{ @$withdrawhistory->providerCard->card_number}}</td>
                                <td>{{@$withdrawhistory->amount}}</td>
                                <td>{{@$withdrawhistory->created_at}}</td>
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

<div class="modal fade" id="withdraw_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Withdraw Now
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('provider.wallet.withdraw.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Add your card number</label>
                        <select name="card_id" class="form-control">
                            <option>Select your card number</option>
                            @foreach($carddatas as $carddata)
                            <option value="{{ $carddata->id}}">{{ $carddata->card_number}}</option>
                            @endforeach

                        </select>

                        <div style='color:red; padding: 0 5px;'>
                            {{ $errors->has('card_id') ? $errors->first('card_id') : '' }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="number" name="amount" class="form-control" placeholder="Enter Amount">
                        <div style='color:red; padding: 0 5px;'>
                            {{ $errors->has('amount') ? $errors->first('amount') : '' }}
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection