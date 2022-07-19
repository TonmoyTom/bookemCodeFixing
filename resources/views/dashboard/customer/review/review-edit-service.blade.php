@extends('dashboard.layouts.master')
@section('title', 'Edit Service Reviews')
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
                            <h3 class="card-label">Edit Your Reviews
                            </h3>
                        </div>

                    </div>
                    <div class="card-body table-responsive">
                        <!--begin: Datatable-->
                        <form action="{{ route('customer.review.serviceupdate', $serviceEdit->id)}}" method="POST">
                            @csrf
        
                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <!-- Rating Stars Box -->
                                    <label>Select Your Rating</label>
                                    <div id="full-stars-example-two">
                                        <div class="rating-group">
                                            <input disabled checked class="rating__input rating__input--none"
                                                name="rating" id="rating3-none" value="0" type="radio">
                                            <label aria-label="1 star" class="rating__label" for="rating3-1"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>

                                            <input @if ($serviceEdit->rating == 1) checked @endif class="rating__input" name="rating"
                                                id="rating3-1" value="1" type="radio">
                                            <label aria-label="2 stars" class="rating__label"
                                                for="rating3-2"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>

                                            <input @if ($serviceEdit->rating == 2) checked @endif class="rating__input" name="rating"
                                                id="rating3-2" value="2" type="radio">
                                            <label aria-label="3 stars" class="rating__label"
                                                for="rating3-3"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>

                                            <input @if ($serviceEdit->rating == 3) checked @endif class="rating__input" name="rating"
                                                id="rating3-3" value="3" type="radio">
                                            <label aria-label="4 stars" class="rating__label"
                                                for="rating3-4"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>

                                            <input @if ($serviceEdit->rating == 4) checked @endif class="rating__input" name="rating"
                                                id="rating3-4" value="4" type="radio">
                                            <label aria-label="5 stars" class="rating__label"
                                                for="rating3-5"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>

                                            <input @if ($serviceEdit->rating == 5) checked @endif class="rating__input" name="rating"
                                                id="rating3-5" value="5" type="radio">

                                            <div style="color: red; padding:0 5px;">
                                                {{ $errors->has('rating') ? $errors->first('rating') : '' }}
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                {{-- @php
                                $serviceitems = App\Models\AppointmentItem::where('appointment_id', $serviceEdit->appointment_id)->get();
          
                                                
                                     @endphp --}}
                                            
                                <div class="form-group">
                                    <select class="form-control myselect2" multiple name="service_id[]">
                                        @foreach($serviceDatas as $serviceData)
                                        <option value="{{$serviceData->service->id}}"  @if (@in_array(['service_id' => $serviceData->service_id], $selectService)) selected @endif >{{$serviceData->service->name}}</option>
                                        @endforeach
                                    </select>
                                    <div style="color: red; padding:0 5px;">
                                        {{ $errors->has('servide_id') ? $errors->first('servide_id'):''}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Type Your Comment</label>
                                    <textarea class="form-control comment" name="description" placeholder="Type here..">
                                        {!! $serviceEdit->description !!}
                                    </textarea>
                                    <div style="color: red; padding:0 5px;">
                                        {{ $errors->has('description') ? $errors->first('description'):''}}
                                    </div>
        
                                </div>
                            </div>
        
                          
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        <!--end: Datatable-->
                    </div>
                    
 
                    <!--end::Entry-->
                </div>
                <!--end::Content-->

            @section('customjs')


                <script>

                </script>


            @endsection
        @endsection
