@extends('dashboard.layouts.master')
@section('title', 'Independent Controctor')
@section('udcontent')
<<<<<<< HEAD
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Independent Controctor</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Independent Controctor</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
=======
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Independent Contractor</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">Independent Contractor</a>
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
                        <h3 class="card-label">Independent Contractor Details

                        </h3>
>>>>>>> 3b7b9a5c84a8e29001b3acc0e6311a0aab076620
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
                            <h3 class="card-label">Independent Controctor Details

                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->

                            <!--end::Button-->
                            <!--begin::Button-->
                            <a href="{{ route('ic.provider.index') }}" class="btn btn-success font-weight-bolder">
                                <i class="la la-angle-left"></i>Back</a>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

                                @if ($businessHourUpdate && $businessHourUpdate->id)
                                    Edit
                                @else
                                    Add
                                @endif
                            </button>

                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <b class="col-sm-3 mb-4"> Image </b>
                            <b class="col-sm-1 mb-4"> : </b>
                            <b class="col-sm-8 mb-4"><img style="width: 150px;"
                                    src="{{ asset(@$dataIcshow->business_logo) }}" alt=""></b>


                            <b class="col-sm-3 mb-4"> Name </b>
                            <b class="col-sm-1 mb-4"> : </b>
                            <b class="col-sm-8 mb-4"> <span class="ml-2">{{ @$dataIcshow->name }}</span></b>

                            <b class="col-sm-3 mb-4"> Email </b>
                            <b class="col-sm-1 mb-4"> : </b>
                            <b class="col-sm-8 mb-4"> <span class="ml-2">{{ @$dataIcshow->email }}</span></b>

                            <b class="col-sm-3 mb-4"> Phone </b>
                            <b class="col-sm-1 mb-4"> : </b>
                            <b class="col-sm-8 mb-4"> <span class="ml-2">{{ @$dataIcshow->mobile }}</span></b>

                            <b class="col-sm-3 mb-4"> Address </b>
                            <b class="col-sm-1 mb-4"> : </b>
                            <b class="col-sm-8 mb-4"> <span class="ml-2">{{ @$dataIcshow->address }}</span></b>

                            <b class="col-sm-3 mb-4"> Image </b>
                            <b class="col-sm-1 mb-4"> : </b>
                            <b class="col-sm-8 mb-4"><img style="width: 150px;" src="{{ asset(@$dataIcshow->image) }}"
                                    alt=""></b>


                            <dd class="col-sm-12 border-2 border-bottom border-white pb-2 my-8">
                                <b style="font-weight:600;" class="h3"> Serivce </b>
                            </dd>
                            @foreach ($dataIcshow->businessCategories as $service)
                                <div class="col-md-3 d-flex flex-column align-items-center mb-4">
                                    <img class="mb-4" style="width: 150px;"
                                        src="{{ asset(@$service->category->category_logo) }}" alt="">
                                    <p class="col-sm-12 text-center font-weight-bold">
                                        {{ @$service->category->category_name }}</p>
                                </div>
                            @endforeach

                            @if ($dataIcshow->ic_provider_id != null)
                                <dd class="col-sm-12 border-2 border-bottom border-white pb-2 my-8">
                                    <b style="font-weight:600;" class="h3"> Vendor Serivce
                                        {{ $dataIcshow->ic_provider_id }}</b>
                                </dd>
                                @foreach ($vendorService->businessCategories as $service)
                                    <div class="col-md-3 d-flex flex-column align-items-center mb-4">
                                        <img class="mb-4" style="width: 150px;"
                                            src="{{ asset(@$service->category->category_logo) }}" alt="">
                                        <p class="col-sm-12 text-center font-weight-bold">
                                            {{ @$service->category->category_name }}</p>
                                    </div>
                                @endforeach
                            @endif

                            @php
                                $ratings = App\Models\IcReview::where('ic_id', $dataIcshow->id)->get();

                            @endphp

                            <dd class="col-sm-12 border-2 border-bottom border-white pb-2 mt-8 mb-15">
                                <b style="font-weight:600;" class="h3"> Review </b>
                            </dd>
                            @forelse ($ratings as $rating)
                                @php
                                    $name = App\User::where('id', $rating->customer_id)->first();
                                @endphp
                                <dd class="col-lg-4">
                                    <div class="indeDetails__review mb-5">
                                        <h6>{{ $name->name }}</h6>
                                        {{-- <p id="para{{ $rating->id }}" onclick="show({{ $rating->id }})">
                                            {{ Str::limit($rating->description, 240, '') }}
                                            @if (strlen($rating->description) > 240)
                                                <span id="readMore{{ $rating->id }}" class="readMore">{{ substr($rating->description, 240) }}Read
                                                    more...</span>
                                                <span class="readLess" id="readLess{{ $rating->id }}"
                                                    onclick="show({{ $rating->id }})">Read less...</span>
                                            @endif
                                        </p> --}}   
                                        <p>{{ Str::limit($rating->description, 240, '') }}</p>
                                        {{-- <p id="para{{ $rating->id }}" onclick="show({{ $rating->id }})"
                                            class="para">"Contrary to popular belief, Lorem Ipsum is not simply random
                                            text. It has roots in a piece of classical Latin literature from 45 BC, making
                                            it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
                                            College in Virgi <span id="readMore{{ $rating->id }}" class="readMore">Read
                                                more...</span> looked up one of the more obscure Latin words, consectetur,
                                            from a Lorem Ipsum passage, and going through the cites of the word in classical
                                            literature, discovered the undoubtable source. Lorem Ipsum comes from sections
                                            1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
                                            Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of
                                            ethics, very popular during the Renaissance. The first line of Lorem Ipsum,
                                            "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. <span
                                                class="readLess" id="readLess{{ $rating->id }}"
                                                onclick="show({{ $rating->id }})">Read less...</span>"</p> --}}
                                        <div class="rating d-flex justify-content-end">
                                            @if ($rating->rating >= 1 && $rating->rating <= 1.4)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            @elseif($rating->rating >= 1.5 && $rating->rating <= 1.9)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            @elseif($rating->rating >= 2 && $rating->rating <= 2.4)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            @elseif($rating->rating >= 2.5 && $rating->rating <= 2.9)
                                                <i class="fa fa-star">
                                                </i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            @elseif($rating->rating >= 3 && $rating->rating <= 3.4)
                                                <i class="fa fa-star">
                                                </i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            @elseif($rating->rating >= 3.5 && $rating->rating <= 3.9)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            @elseif($rating->rating >= 4 && $rating->rating <= 4.4)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            @elseif($rating->rating >= 4.5 && $rating->rating <= 4.9)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            @elseif($rating->rating >= 5)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                        </div>
                                    </div>
                                </dd>


                            @empty
                                <b style="font-weight:600;" class="h3"> No Review </b>
                            @endforelse






                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{ route('ic.provider.store', $dataIcshow->id) }}"
                                                method="post">
                                                @csrf
                                                <input type="hidden" name="id"
                                                    value="{{ @$businessHourUpdate->id }}" />

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Saturday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="sat_s" id="sat_s"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="Start"
                                                            value="{{ $businessHourUpdate->sat_s ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="sat_e" id="sat_e"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="End"
                                                            value="{{ $businessHourUpdate->sat_e ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" id="sat_close"
                                                            {{ $businessHourUpdate && $businessHourUpdate->sat_s == null && $businessHourUpdate->sat_s == null ? 'checked' : '' }}
                                                            name="sat_close">
                                                        <label class="form-check-label">
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Sunday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="san_s" id="san_s"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="Start"
                                                            value="{{ $businessHourUpdate->san_s ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="san_e" id="san_e"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="End"
                                                            value="{{ $businessHourUpdate->san_e ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" id="sun_close"
                                                            {{ $businessHourUpdate && $businessHourUpdate->san_s == null && $businessHourUpdate->san_e == null ? 'checked' : '' }}
                                                            name="sun_close">
                                                        <label class="form-check-label">
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Monday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="mon_s" id="mon_s"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="Start"
                                                            value="{{ $businessHourUpdate->mon_s ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="mon_e" id="mon_e"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="End"
                                                            value="{{ $businessHourUpdate->mon_e ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" id="mon_close"
                                                            {{ $businessHourUpdate && $businessHourUpdate->mon_s == null && $businessHourUpdate->mon_e == null ? 'checked' : '' }}
                                                            name="mon_close">
                                                        <label class="form-check-label">
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Tuesday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="tus_s" id="tus_s"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="Start"
                                                            value="{{ $businessHourUpdate->tus_s ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="tus_e" id="tus_e"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="End"
                                                            value="{{ $businessHourUpdate->tus_e ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" id="tus_close"
                                                            {{ $businessHourUpdate && $businessHourUpdate->tus_s == null && $businessHourUpdate->tus_e == null ? 'checked' : '' }}
                                                            name="tus_close">
                                                        <label class="form-check-label">
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Wednesday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="wen_s" id="wen_s"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="Start"
                                                            value="{{ $businessHourUpdate->wen_s ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="wen_e" id="wen_e"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="End"
                                                            value="{{ $businessHourUpdate->wen_e ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" id="wnd_close"
                                                            {{ $businessHourUpdate && $businessHourUpdate->wen_s == null && $businessHourUpdate->wen_e == null ? 'checked' : '' }}
                                                            name="wnd_close">
                                                        <label class="form-check-label">
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Thursday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="thus_s" id="thus_s"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="Start"
                                                            value="{{ $businessHourUpdate->thus_s ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="thus_e" id="thus_e"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="End"
                                                            value="{{ $businessHourUpdate->thus_e ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" id="thus_close"
                                                            {{ $businessHourUpdate && $businessHourUpdate->thus_s == null && $businessHourUpdate->thus_e == null ? 'checked' : '' }}
                                                            name="thus_close">
                                                        <label class="form-check-label">
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Friday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="fri_s" id="fri_s"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="Start"
                                                            value="{{ $businessHourUpdate->fri_s ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="fri_e" id="fri_e"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="time" placeholder="End"
                                                            value="{{ $businessHourUpdate->fri_e ?? null }}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" id="fri_close"
                                                            {{ $businessHourUpdate && $businessHourUpdate->fri_s == null && $businessHourUpdate->fri_e == null ? 'checked' : '' }}
                                                            name="fri_close">
                                                        <label class="form-check-label">
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="checkbox" name="no_change" id="vendor_date"
                                                            onchange="check({{ $dataIcshow->id }})">
                                                        <label class="form-check-label">
                                                            Use TO Vendor
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <input type="submit" value="Submit" class="btn btn-sm btn-success">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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
        <script>
            function check(id) {
                let vendorDateChecked = document.getElementById("vendor_date").checked;
                if (vendorDateChecked == true) {
                    $.ajax({
                        url: '{{ url('
                                                                                                                                                                vendor_date_show / ') }}',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': id,

                        },
                        success: function(response) {
                            // console.log(response);
                            $("#sat_s").val(response.sat_s);
                            $("#sat_e").val(response.sat_e);
                            document.getElementById("sat_close").checked = (response.sat_s == null && response
                                .sat_s == null) ? true : '';

                            $("#san_s").val(response.san_s);
                            $("#san_e").val(response.san_e);
                            document.getElementById("sun_close").checked = (response.san_s == null && response
                                .san_e == null) ? true : '';

                            $("#mon_s").val(response.mon_s);
                            $("#mon_e").val(response.mon_e);
                            document.getElementById("mon_close").checked = (response.mon_s == null && response
                                .mon_s == null) ? true : '';

                            $("#tus_s").val(response.tus_s);
                            $("#tus_e").val(response.tus_e);
                            document.getElementById("tus_close").checked = (response.tus_s == null && response
                                .tus_e == null) ? true : '';

                            $("#wen_s").val(response.wen_s);
                            $("#wen_e").val(response.wen_e);
                            document.getElementById("wnd_close").checked = (response.wen_s == null && response
                                .wen_e == null) ? true : '';

                            $("#thus_s").val(response.thus_s);
                            $("#thus_e").val(response.thus_e);
                            document.getElementById("thus_close").checked = (response.thus_s == null && response
                                .thus_s == null) ? true : '';

                            $("#fri_s").val(response.fri_s);
                            $("#fri_e").val(response.fri_e);
                            document.getElementById("fri_close").checked = (response.fri_s == null && response
                                .fri_s == null) ? true : '';
                        },
                        error: function() {

                        }
                    })
                } else {
                    $("#sat_s").val('');
                    $("#sat_e").val('');
                    document.getElementById("sat_close").checked = false;

                    $("#san_s").val('');
                    $("#san_e").val('');
                    document.getElementById("sun_close").checked = false;

                    $("#mon_s").val('');
                    $("#mon_e").val('');
                    document.getElementById("mon_close").checked = false;

                    $("#tus_s").val('');
                    $("#tus_e").val('');
                    document.getElementById("tus_close").checked = false;

                    $("#wen_s").val('');
                    $("#wen_e").val('');
                    document.getElementById("wnd_close").checked = false;

                    $("#thus_s").val('');
                    $("#thus_e").val('');
                    document.getElementById("wnd_close").checked = false;

                    $("#fri_s").val('');
                    $("#fri_e").val('');
                    document.getElementById("fri_close").checked = false;
                }
            }
        </script>
        <script>
            function show(id) {
                let show = document.querySelector(`#readMore${id}`);
                let para = document.querySelector(`#para${id}`);
                let readLess = document.querySelector(`#readLess${id}`);
                if (!para.style.height) {
                    para.style.height = "auto";
                    show.style.display = "none";
                    readLess.style.display = "inline-block";
                } else {
                    para.style.height = "110px";
                    show.style.display = "inline-block";
                    readLess.style.display = "none";
                }


            }
        </script>
    @endsection
@endsection
