@extends('dashboard.layouts.master')
@section('title', 'Facility Reviews')
@section('udcontent')


<style>
    .rating-group {
        display: inline-flex;
    }

    /* make hover effect work properly in IE */
    .rating__icon {
        pointer-events: none;
    }

    /* hide radio inputs */
    .rating__input {
        position: absolute !important;
        left: -9999px !important;
    }

    /* hide 'none' input from screenreaders */
    .rating__input--none {
        display: none
    }

    /* set icon padding and size */
    .rating__label {
        cursor: pointer;
        padding: 0 0.1em;
        font-size: 2rem;
    }

    /* set default star color */
    .rating__icon--star {
        color: orange;
        font-size: 35px;
    }

    /* if any input is checked, make its following siblings grey */
    .rating__input:checked~.rating__label .rating__icon--star {
        color: #ddd;

    }

    /* make all stars orange on rating group hover */
    .rating-group:hover .rating__label .rating__icon--star {
        color: orange;

    }

    /* make hovered input's following siblings grey on hover */
    .rating__input:hover~.rating__label .rating__icon--star {
        color: #ddd;

    }

</style>
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Reviews</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Reviews</a>
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
                            <h3 class="card-label">Facility Reviews
                                <span class="d-block text-muted pt-2 font-size-sm">All Reviews here</span>
                            </h3>
                        </div>

                    </div>
                    <div class="card-body table-responsive">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom" id="dataTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Order Id</th>
                                    <th>Facility Name</th>
                                    <th>Rating</th>
                                    <th>Rating Comments</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providerreviews as $providerreview)
                                    @php
                                        $reviewdata = App\Models\Appointment::where('id', $providerreview->appointment_id)->first();
                                     @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>#{{ $reviewdata->appointment_no }}</td>
                                        <td>{{ @$reviewdata->provider->business_name }}</td>
                                       
                                        
                                        
                                        <td>{{ @$providerreview->rating }}
                                            <i style="color: #fcc612;" class="fa fa-star"></i>
                                            </td>
                                       

                                        <td>{{ @$providerreview->description }}</td>
                                        
                                        <td>
                                            <a href="{{ route('vendor.review.show', $providerreview->appointment_id) }}"
                                                class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>
                                           
                                        </td>
                                    </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">IC Reviews
                                <span class="d-block text-muted pt-2 font-size-sm">All Reviews here</span>
                            </h3>
                        </div>

                    </div>
                    <div class="card-body table-responsive">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom" id="dataTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Order Id</th>
                                    <th>Facility Name</th>
                                    <th>IC Name</th>
                                    
                                    <th>Rating</th>
                                    <th>Rating Comments</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($icreviews as $icreview)
                                    @php
                                          $icreviewdata = App\Models\Appointment::where('id', $icreview->appointment_id)->first();

                                      
                                    @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>#{{ $icreviewdata->appointment_no }}</td>
                                        <td>{{ @$icreviewdata->provider->business_name }}</td>
                                        <td>
                                            @if(@$icreviewdata->ic->name)
                                             {{ @$icreviewdata->ic->name }}
                                             @else
                                             N/A
                                             @endif
                                            </td>
                                        
                                        
                                        <td>{{ @$icreview->rating }}
                                            <i style="color: #fcc612;" class="fa fa-star"></i>
                                            </td>
                                        

                                        
                                        <td>{{ @$icreview->description }}</td>
                                       
                                        <td>
                                            <a href="{{ route('vendor.review.show', $icreview->appointment_id) }}"
                                                class="btn btn-icon btn-clean btn-sm"><i class="la la-eye"></i></a>
                                            
                                            
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
