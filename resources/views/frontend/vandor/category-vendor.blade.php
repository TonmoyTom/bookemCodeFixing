@extends('frontend.layouts.master')
@section('title', '' . $catsName . '')
@section('content')

    <!--    ==========Start top Vendors section========= -->
    <section class="topVendors-section py-4 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h2> {{ $catsName }}</h2>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <div class="vandors-carousel owl-carousel owl-theme">
                        @foreach ($businessCats as $businessCat)

                            @php
                                $vendors = App\User::where('id', $businessCat->provider_id)->get();
                            @endphp

                            @foreach ($vendors as $vendor)

                            @php
                                $starSum = App\Models\CustomerReview::where('provider_id', $vendor->id)->sum('rating');

                                $ratingCount = App\Models\CustomerReview::where('provider_id', $vendor->id)->count();

                                if ($ratingCount != 0) {
                                    $ratingAvg = round($starSum / $ratingCount, 1);
                                } else {
                                    $ratingAvg = 0;
                                }
                            @endphp

                                <div class="item">

                                    <a href="{{ route('vendor.details', $vendor->business_url) }}">
                                        <div class="offerRunning-box bg-white">
                                            <div class="orImg-box mb-2">
                                                <img src=" @if(!empty($vendor->thumbnail_img)) {{ $vendor->thumbnail_img }} @else {{ asset('defaults/avatar/provider-default-thumbnil.jpeg') }} @endif" alt="">
                                            </div>
                                            <div class="img-titlerating-box">
                                                <div class="rating-title-left d-flex  ">
                                                    <div class="smallImg mr-2">
                                                        <img src= " @if(!empty($vendor->business_logo)) {{ $vendor->business_logo }} @else {{ asset('defaults/avatar/avatar.png') }} @endif" alt="">
                                                    </div>
                                                    <div>
                                                        <h4>{{ $vendor->business_name }}</h4>
                                                        <p><i class="fa fa-map-marker"></i>
                                                            @if ($vendor->service_location == 1)
                                                            {{ \Str::limit($vendor->address,40) }}
                                                            @else
                                                            {{ \Str::limit($vendor->address,40) }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h5>{{ $ratingAvg }} Rating</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endforeach

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="vandor-service-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card p-4 border-0 all-vendors-card">
                        @if ($businessCats->count() == 0)
                            <span class="d-block text-center">No vendors available!</span>
                        @endif
                        @foreach ($businessCats as $businessCat)
                            @php
                                $vendors = App\User::where('id', $businessCat->provider_id)->get();
                            @endphp


                            @foreach ($vendors as $vendorandservice)

                            @php
                                $starSum = App\Models\CustomerReview::where('provider_id', $vendorandservice->id)->sum('rating');

                                $ratingCount = App\Models\CustomerReview::where('provider_id', $vendorandservice->id)->count();

                                if ($ratingCount != 0) {
                                    $ratingAvg = round($starSum / $ratingCount, 1);
                                } else {
                                    $ratingAvg = 0;
                                }
                            @endphp

                                <div class="row my-3">
                                    <div class="col-md-4">
                                        <div class="salun-image vandor-thumb-image">
                                            <img src=" @if(!empty($vendorandservice->thumbnail_img)) {{ $vendorandservice->thumbnail_img }} @else {{ asset('defaults/avatar/provider-default-thumbnil.jpeg') }} @endif" alt="">
                                            <div class="right-rating ">
                                                <h3 class=" text-center">{{ $ratingAvg }}</h3>
                                                <p class=" text-center">{{ $ratingCount }} reviews</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="vandors-service-box">
                                            <div class="titleAndService">
                                                <div class="vendor-title">
                                                    <a href="{{ route('vendor.details', $vendorandservice->business_url) }}">
                                                        <h2> {{ $vendorandservice->business_name }}</h2>
                                                    </a>
                                                    <p><i class="fa fa-map-marker"></i> @if ($vendorandservice->service_location == 1) {{ $vendorandservice->address }} @else {{ $vendorandservice->address }}@endif</p>
                                                </div>

                                            </div>

                                            @php

                                        if($vendorandservice && $vendorandservice->providertype == 3){
                                            $employeeSevice = \App\EmployeeService::where('user_id' , $vendorandservice->id)->get();
                                            $servicesIds = $employeeSevice->pluck('service_id');
                                            $services = App\Models\Service::whereIn('id' ,  $servicesIds )->where('provider_id', $vendorandservice->ic_provider_id)
                                                ->where('status', 1)
                                                ->limit(3)
                                                ->get();
                                        }else{
                                            if($vendorandservice && $vendorandservice->ic_provider_id != null){
                                                $services = App\Models\Service::where('provider_id', $vendorandservice->ic_provider_id)
                                                ->where('status', 1)
                                                ->limit(3)
                                                ->get();
                                            }else{
                                                $services = App\Models\Service::where('provider_id', $vendorandservice->id)
                                                ->where('status', 1)
                                                ->limit(3)
                                                ->get();
                                            }

                                        }
                                            @endphp

                                            @if ($services->count() == 0)
                                                No service available!
                                            @endif


                                            @foreach ($services as $service)
                                                <div class="vandor-name mb-3 pb-3 border-btm">
                                                    <div class="vandor__img">
                                                        <img src="{{ asset('frontend/asset/image/heroBanner/hairCut.jpg') }}" alt="">
                                                    </div>
                                                    <div class="title-service">
                                                        <h4>{{ $service->name }}</h4>
                                                        <p>{!! substr(strip_tags($service->description), 0, 80) !!} <a href="#" data-toggle="modal"
                                                            data-target="#service_text_{{ $service->id }}">more</a>
                                                        </p>

                                                    </div>
                                                    <div class="right-btn d-flex align-items-center">
                                                        @php
                                                           if($vendorandservice && $vendorandservice->providertype == 3){
                                                                $user = $vendorandservice->ic_provider_id;
                                                           }
                                                            else{
                                                            //    if($vendorandservice && $vendorandservice->ic_provider_id != null ){
                                                            //     $user = $vendorandservice->ic_provider_id;
                                                            //    }else {
                                                                $user =  $vendorandservice->id;
                                                            //    }

                                                            }
                                                        @endphp
                                                        @if($vendorandservice && $vendorandservice->providertype == 3)
                                                        <input type="hidden" value="{{$vendorandservice->ic_provider_id}}">
                                                        @else
                                                        <input type="hidden" value="{{$vendorandservice->id}}">
                                                        @endif
                                                        <div class="mr-2">
                                                            @if ($service->price_active == 1)
                                                                <p class="mb-0">${{ $service->selling_price }}</p>
                                                            @else
                                                                <p class="mb-0">${{ $service->discount_price }}</p>
                                                                <span
                                                                    class="float-right text-gray"><del>${{ $service->selling_price }}</del></span>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <a href="{{url('user_checkout/' . $service->id . '/' . $user )}}" data-id="{{ $service->id }}"
                                                                class="btn btn-primary2 btn-sm">Book</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="service_text_{{ $service->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    {{ $service->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="form-group mservice-text">
                                                                    <p>{!! $service->description !!}</p>
                                                                </div>
                                                                <div class="row"></div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="mPrice-text">
                                                                    @if ($service->price_active == 1)
                                                                        <p class="mb-0">${{ $service->selling_price }}</p>
                                                                    @else
                                                                        <p class="mb-0">${{ $service->discount_price }}</p>
                                                                        <span
                                                                            class="float-right text-gray"><del>${{ $service->selling_price }}</del></span>
                                                                    @endif
                                                                </div>

                                                                <a href="javascript:;" id="cartStore" data-id="{{ $service->id }}" class="btn btn-primary2 btn-sm">Book</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
