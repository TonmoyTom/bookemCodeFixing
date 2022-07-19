@extends('frontend.layouts.master')
@section('title', '' . $icName . '')
@section('content')
<!-- Statrt Vandor profile -->

<section class="service-detls py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col">
                        <div class="vendor-pBox ">
                            <div class="row pt-3">
                                <div class="col-xl-5 col-12 mb-3 mb-xl-0">
                                    <div class="vendor-imgBox">
                                        <img class="rounded" src=" @if(!empty($vendor->thumbnail_img)) {{ asset($vendor->thumbnail_img) }} @else {{ asset('defaults/avatar/provider-default-thumbnil.jpeg') }} @endif" alt="{{ $vendor->business_name }}">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-12">
                                    <div class="vendor-nameBox mb-3">
                                        <h1 class="mb-1">{{ $vendor->business_name }}</h1>
                                        <span><i class="fa fa-map-marker"></i>
                                            @if ($vendor->service_location == 1)
                                            {{ $vendor->address }}
                                            @else
                                            {{ $vendor->address }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="vendor-ratingBox mb-2">
                                        <div class="row text-center">
                                            <div class="col-4">
                                                <div class="rating-sec">
                                                    <h4>Complete Work</h4>
                                                    <span>5</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="rating-sec">
                                                    <h4>Rating</h4>
                                                    <span>{{ $ratingCount }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="rating-sec">
                                                    <h4>Rating</h4>
                                                    <span>{{ $ratingAvg }}</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="heart d-flex my-3">
                                        <span class="mr-2 mt-1"><strong>Share Now </strong></span>

                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                        <div class="addthis_inline_share_toolbox"></div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col">
                        <div class="vendor-serviceBox">
                        <div class="row">
                                <div class="col">
                                    <div class="title-name mb-3">
                                        <h2>See our work</h2>
                                    </div>
                                </div>
                            </div>
                            @if($Icportfolios->count() != 0)

                            

                            <div class="row">
                                @foreach ($Icportfolios as $portfolio)
                                <div class="col-md-4 mb-3">
                                    <div class="seeimg">
                                        <img style="height: 170px;" class="img-thoumbnil" src="{{ asset(@$portfolio->portfolio_image) }}" alt="">
                                    </div>
                                </div>
                                @endforeach


                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn border w-100 pb-1 pt-2">SEE ALL WORKS</a>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col">
                                    <span>Not added yet</span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="vendor-serviceBox my-4">
                    <div class="row">
                        <div class="col-md-8">

                            <div class="title-name">
                                <h2>Reviews</h2>
                            </div>

                            <div class="review-head-text">
                                <p class="text-gray">Reviews are no joke! Booksy values authentic reviews and only
                                    verifies them if we know the reviewer has visited this business.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="review-rating border rounded text-center py-4">
                                <h2 class="m-0">{{ $ratingAvg }}<sub>/5</sub></h2>
                                <div class="custom-rating">

                                    @if(($ratingAvg >= 1) && ($ratingAvg <= 1.4)) <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>

                                        @elseif(($ratingAvg >= 1.5) && ($ratingAvg <= 1.9)) <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>

                                            @elseif(($ratingAvg >= 2) && ($ratingAvg <= 2.4)) <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>

                                                @elseif(($ratingAvg >= 2.5) && ($ratingAvg <= 2.9)) <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>

                                                    @elseif(($ratingAvg >= 3) && ($ratingAvg <= 3.4)) <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>

                                                        @elseif(($ratingAvg >= 3.5) && ($ratingAvg <= 3.9)) <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>

                                                            @elseif(($ratingAvg >= 4) && ($ratingAvg <= 4.4)) <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>

                                                                @elseif(($ratingAvg >= 4.5) && ($ratingAvg <= 4.9)) <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>

                                                                    @elseif(($ratingAvg >= 5))
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
                                <p class="text-gray mb-0">{{ $ratingCount }} reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @foreach($ratings as $rating)
                            <div class="review-box border-btm py-3">
                                <div class="r-top">
                                    <div class="top-left">
                                        @if($rating->rating == 1)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>

                                        @elseif($rating->rating == 2)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>

                                        @elseif($rating->rating == 3)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>

                                        @elseif($rating->rating == 4)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>

                                        @elseif($rating->rating == 5)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>

                                        @endif
                                        <div class="reviewer-name">
                                            <p> {{ @$rating->service->name}}</p>
                                            <span>by {{ @$rating->users->name}}</span>
                                        </div>
                                    </div>
                                    <div class="top-right">
                                        <span>{{ \Carbon\Carbon::parse($rating->created_at)->format('M d Y')}}</span><i class="fa fa-check"></i>
                                    </div>
                                </div>
                                <div class="review-msg">
                                    <p> {{ $rating->description}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>




            </div>
            <div class="col-md-5">
                <div class="vp-right">
                    <div class="googleMap">
                        <div class="form-group">
                            <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}" type="hidden" name="address" id="address" value="{{ $vendor->address }}">
                            <input type="hidden" name="latitude" id="address-latitude" value="{{ $vendor->latitude ?? '0' }}" />
                            <input type="hidden" name="longitude" id="address-longitude" value="{{ $vendor->longitude ?? '0' }}" />
                        </div>
                        <div id="address-map-container" class="mb-2" style="width:100%;height:400px; ">
                            <div style="width: 100%; height: 100%" id="address-map"></div>
                        </div>
                    </div>
                    <div class="title-name mt-4">
                        <h2 class="mb-2">About</h2>
                        <p class="">{{ $vendor->business_about }}</p>
                    </div>
                    <div class="vendor-phones">
                        <div class="row">
                            <div class="col-6 align-self-center">
                                <div class="phn-icon d-flex">
                                    <i class="fa fa-phone-alt mr-2"></i>
                                    <p class="m-0">{{ $vendor->mobile }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="al-btn float-right">

                                    <a href="tel:{{ $vendor->mobile }}" class="btn border bg-white pt-2 pb-1">Call</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">

                    </div>
                    <hr class="my-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-name mt-4 text-center mb-4">
                                <h2 class="mb-2">Social Media & Share</h2>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="vendor-social text-center pb-4">
                                @if(@$Icsocial->facebook)
                                <a href="{{ @$Icsocial->facebook }}" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                @endif
                                @if(@$Icsocial->twitter)

                                <a href="{{ @$Icsocial->twitter }}" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                @endif
                                @if(@$Icsocial->instagram)
                                <a href="{{ @$Icsocial->instagram }}" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                @endif

                                @if(@$Icsocial->linkedin)
                                <a href="{{ @$Icsocial->linkedin }}" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                @endif

                                @if(@$Icsocial->youtube)
                                <a href="{{ @$Icsocial->youtube }}" target="_blank">
                                    <i class="fa fa-youtube"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- end Vandor profile -->




@section('customjs')
<script src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key')}}&libraries=places&callback=initialize&language=en&region=GB" async defer></script>
<script src="/js/mapInput.js"></script>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62566a78876d5c3b"></script>


@endsection
@endsection