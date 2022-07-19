@extends('frontend.layouts.master')
@section('title', '' . $setting->site_name . '')
@section('content')
<style>
    .banner-search-box input:focus,
    .banner-search-box select:focus,
    .banner-search-box button:focus {
        box-shadow: none;
    }

    .bg-white a {
        text-decoration: none;
        color: #333;
    }
</style>

<!-- Start Quality persone service section -->
<section class="persone-section">
    <div class="header__search">
        <form action="{{ route('advance.search') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-4 pr-0">
                    <input type="text" name="service_name" id="" placeholder="Service Name">
                </div>
                <div class="col-8 pl-2 position-relative h_search">
                    <input type="text" name="name" id="" placeholder="Or Username  & Business Name">
                    <button type="submit">
                        <i class="ri-search-eye-line"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="swiper header_slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide"
                style="background-image: url('{{ asset('frontend/asset/image/heroBanner/hero1.jpg') }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero__content align-items-end">
                                <h1 class="text-right">Barbers &<br> <span>Hair Cutting</span>
                                </h1>
                                <p class="text-right">Sit amet consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua suspendisse ultrices gravida</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide"
                style="background-image: url('{{ asset('frontend/asset/image/heroBanner/hero2.jpg') }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero__content align-items-start">
                                <h1 class="text-left">Refreshing Trim of<br> <span>your Beard </span>
                                </h1>
                                <p class="text-left">Sit amet consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua suspendisse ultrices gravida</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide"
                style="background-image: url('{{ asset('frontend/asset/image/heroBanner/hero3.jpg') }}'); background-position: top;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero__content align-items-end">
                                <h1 class="text-right">real man go to<br> <span>real barbers </span>
                                </h1>
                                <p class="text-right">Sit amet consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua suspendisse ultrices gravida</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide"
                style="background-image: url('{{ asset('frontend/asset/image/heroBanner/hero4.jpg') }}'); background-position: top;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero__content align-items-start">

                                <h1 class="text-left">we’re Best barbers &<br> <span>hair cutting salon</span>
                                </h1>
                                <p class="text-left">Sit amet consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua suspendisse ultrices gravida</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide"
                style="background-image: url('{{ asset('frontend/asset/image/heroBanner/hero5.jpg') }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero__content align-items-end">
                                <h1 class="text-right">New tools of<br> <span>the Craft</span>
                                </h1>
                                <p class="text-right">Sit amet consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua suspendisse ultrices gravida</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"><i class="ri-arrow-right-s-line"></i></div>
        <div class="swiper-button-prev"><i class="ri-arrow-left-s-line"></i></div>
    </div>




    <div class="container">
        <div class="banner-cat">
            <ul>
                @foreach ($bannercats as $category)
                <li><a href="{{ route('category.vendor', $category->slug) }}">{{ $category->category_name }}</a>
                </li>
                @endforeach

                @if ($bannercats_more->count() != 0)
                <li class="bc-dd-btn">
                    <a href="">More...</a>
                    <div class="bc-dd">
                        @foreach ($bannercats_more as $category)
                        <a href="{{ route('category.vendor', $category->slug) }}">{{ $category->category_name }}</a>
                        @endforeach
                    </div>
                </li>
                @endif

            </ul>
        </div>
    </div>
</section>
<!-- End Quality persone service section -->

<!-- Start Service Provide  -->
<section class="service-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title mb-4">
                    <h2>Get inspired with {{ $setting->site_name }}</h2>

                </div>

            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <div class="owl-header-category owl-carousel owl-theme">
                    @foreach ($categories as $category)
                    <div class="service-box">
                        <a href="{{ route('category.vendor', $category->slug) }}">
                            <img src="{{ asset($category->category_logo) }}" alt="{{ $category->category_name }}">
                            <div class="service_name">
                                <p>{{ $category->category_name }}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
</section>
<!--    ==========end service========= -->
<!--    ==========Start Offer Section========= -->
<section class="offer-raning-section py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title mb-4">

                    <h2>Offer Runing Right Now</h2>

                </div>
            </div>
        </div>
        <div class="bg-white p-4" style="border-radius: 8px;">
            <div class="row">

                @foreach ($offervendor as $allvendor)
                @php
                $starSum = App\Models\CustomerReview::where('provider_id', $allvendor->id)->sum('rating');

                $ratingCount = App\Models\CustomerReview::where('provider_id', $allvendor->id)->count();

                if ($ratingCount != 0) {
                $ratingAvg = round($starSum / $ratingCount, 1);
                } else {
                $ratingAvg = 0;
                }
                @endphp



                <div class="col-lg-4 col-sm-6 mb-4">
                    <a href="{{ route('vendor.details', $allvendor->business_url) }}">
                        <div class="offerRunning-box">
                            <div class="orImg-box">
                                <img src="@if (!empty($allvendor->thumbnail_img)) {{ asset($allvendor->thumbnail_img) }} @else {{ asset('defaults/avatar/provider-default-thumbnil.jpeg') }} @endif"
                                    alt="">
                            </div>
                            <div class="img-titlerating-box">
                                <div class="rating-title-left d-flex  ">
                                    <div class="smallImg mr-2">
                                        <img src="@if (!empty($allvendor->business_logo)) {{ asset($allvendor->business_logo) }} @else {{ asset('defaults/avatar/avatar.png') }} @endif"
                                            alt="">
                                    </div>
                                    <div>
                                        <h4>{{ \Str::limit($allvendor->business_name,20) }}</h4>
                                        <p><i class="fa fa-map-marker"></i>
                                            @if ($allvendor->service_location == 1)
                                            {{ \Str::limit($allvendor->address, 40) }}
                                            @else
                                            {{ \Str::limit($allvendor->address, 40) }}
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

            </div>
        </div>
    </div>
</section>
<!--    ==========end Offer Section========= -->
<!--    ==========Start top Vendors section========= -->
<section class="topVendors-section py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title mb-4">
                    <h2>Top Vendors</h2>
                </div>
            </div>
        </div>
        <div class="row vendors-row">


            @foreach ($topvendors as $topvendor)
            @php
            $starSum = App\Models\CustomerReview::where('provider_id', $topvendor->id)->sum('rating');

            $ratingCount = App\Models\CustomerReview::where('provider_id', $topvendor->id)->count();

            if ($ratingCount != 0) {
            $ratingAvg = round($starSum / $ratingCount, 1);
            } else {
            $ratingAvg = 0;
            }
            @endphp

            <div class="col-lg-4 col-sm-6 mb-4">
                <a href="{{ route('vendor.details', $topvendor->business_url) }}">
                    <div class="offerRunning-box bg-white">
                        <div class="orImg-box">
                            <img src="@if (!empty($topvendor->thumbnail_img)) {{ asset($topvendor->thumbnail_img) }} @else {{ asset('defaults/avatar/provider-default-thumbnil.jpeg') }} @endif"
                                alt="">
                        </div>
                        <div class="img-titlerating-box">
                            <div class="rating-title-left d-flex  ">
                                <div class="smallImg mr-2">
                                    <img src="@if (!empty($topvendor->business_logo)) {{ asset($topvendor->business_logo) }} @else {{ asset('defaults/avatar/avatar.png') }} @endif"
                                        alt="">
                                </div>
                                <div>
                                    <h4>{{ \Str::limit($topvendor->business_name, 20) }}</h4>
                                    <p><i class="fa fa-map-marker"></i>
                                        @if ($topvendor->service_location == 1)
                                        {{ \Str::limit($topvendor->address, 40) }}
                                        @else
                                        {{ \Str::limit($topvendor->address, 40) }}
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

        </div>
    </div>
</section>
<!--    ==========end Offer Section========= -->

<!-- Start Recommend Section -->

<section class="recommend-section py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h2 class="text-center">Suggest for you</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($recommend as $vendorr)
            @php
            $starSum = App\Models\CustomerReview::where('provider_id', $vendorr->id)->sum('rating');

            $ratingCount = App\Models\CustomerReview::where('provider_id', $vendorr->id)->count();

            if ($ratingCount != 0) {
            $ratingAvg = round($starSum / $ratingCount, 1);
            } else {
            $ratingAvg = 0;
            }
            @endphp
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="recom-box mt-4">
                    <div class="recom-image">

                        <img src=" @if (!empty($vendorr->thumbnail_img)) {{ asset($vendorr->thumbnail_img) }} @else {{ asset('defaults/avatar/provider-default-thumbnil.jpeg') }} @endif"
                            class="card-img-top" alt="">

                    </div>
                    <div class="col-sm-4 right-rating float-right">
                        <p class="rating-02 text-center">{{ $ratingAvg }}</p>
                        <p class="rating-03 text-center">Rating</p>
                    </div>
                    <div class="card-body" style="position: relative">

                        <img class="card-sticker"
                            src="@if (!empty($vendorr->business_logo)) {{ asset($vendorr->business_logo) }} @else {{ asset('defaults/avatar/avatar.png') }} @endif"
                            alt="">
                        <h6 class="mt-1">{{ \Str::limit($vendorr->business_name ,20)}}</h6>
                        <hr />
                        <p class="recomand"><i class="fa fa-map-marker"></i>
                            @if ($vendorr->service_location == 1)
                            {{ \Str::limit($vendorr->address, 30) }}
                            @else
                            {{ \Str::limit($vendorr->address, 30) }}
                            @endif
                        </p>

                        <a href="{{ route('vendor.details', $vendorr->business_url) }}" class="vibeBtn">Explore</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end Recommend Section -->

<!-- Start reviews section -->
<section class="reviews-section py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h2>Review</h2>
                </div>

            </div>
        </div>
        <div class="reviews-owl owl-carousel owl-theme">
            @foreach ($adminreviews as $adminreview)
            <div class="items">
                <div class="card review-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="card-image-review col-sm-12 mb-3 mb-lg-0 col-lg-6">
                                <img class="rounded" src="{{ asset($adminreview->image) }}" height="210px"
                                    width="200px">
                            </div>
                            <div class="col-sm-12 col-lg-6 ">
                                <p class="recomand">{{ $adminreview->customer_name }}</p>
                                <p class="card-text review-text">{!! $adminreview->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Start reviews section -->

<section class="bid-slider py-4">
    <div class="container">
        <div class="bidimage-slider owl-carousel owl-theme">
            <div class="items">
                <div class="card rounded-lg midslider mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/hair1.jpg" class="card-img-top-01" alt="">
                    <div class="card-body card-slider">
                        <h3 class=" exploer-card-title">Find professional hair designer<br>
                            nearby you.</h3>
                        <a href="{{ route('user.register') }}" class="btn btn-info">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="items">
                <div class="card rounded-lg midslider mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/hair2.jpg" class="card-img-top-01" alt="">
                    <div class="card-body card-slider">
                        <h3 class=" exploer-card-title">Find professional hair designer<br>
                            nearby you.</h3>
                        <a href="{{ route('user.register') }}" class="btn btn-info">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="py-4">
    <div class="container">
        <div class="download-appss">
            <div class="row">

                <div class="card-image-review col-lg-6 mb-5 mb-lg-0">
                    <img class="mb-3 revv-img" src="{{ asset($setting->logo ?? '/') }}">
                    <h2 style="font-size: 30px;" class="mb-2">Wholesome features on our mobile app.</h2>
                    <p class="my-3" style="font-size: 18px;">Anys plalaligt. Kamunat galigt,
                        anana och leska såväl som gun. Heterose speprena, gur anar. Selingar vände, gus.
                        Ojås dol cyntiv, tegisk, belogi.
                        Bötött arade. Trejasamma spoilervarning. Jåv mat epilagen. Ass multipänar. Trikång
                        bögisk, preröskap, för att sysade ontotologi.
                        Supragugt infraligen. Or neböktig kivis. Dire fagukögt. Kvasiligt apfälla. Mavis ro.
                        Joliga sögt, göskapet varade. Gunde rösera flexitarian, krobös.
                    </p>
                    <a href="#"><img style="width: 170px;" src="{{ asset('frontend') }}/asset/image/image-7.png"></a>
                    <a href="#"><img style="width: 170px;" src="{{ asset('frontend') }}/asset/image/image-8.png"></a>
                </div>
                <div class="col-lg-6">
                    <div class="wholeSome__img">
                        <img src="{{ asset('frontend') }}/asset/image/playimg.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-4">
    <div class="container">
        <div class="row ">
            <div class="col-12 mt-3">
                <h3 class="cardTitle" style="font-size: 32px;text-transform: capitalize;">What We Believe</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="Mycard mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/people-first.png">

                    <div class="whyB-image-text">
                        <p class="text-center">We empower and elevate the service provider, the consumer, and their
                            communities. We build relationships and experiences and we apply a human touch to everything
                            we do. We live by the golden rule—treat others as you want to be treated.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="Mycard mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/act-like-an-owner.png">
                    <div class="whyB-image-text">
                        <p class="text-center">We are proud, passionate guardians delivering Booksy to the world. We
                            follow through on our promises while taking responsibility for our actions and their
                            results. We go the extra distance to deliver on every commitment.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="Mycard mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/work-as-a-team.png">
                    <div class="whyB-image-text">
                        <p class="text-center">We are collaborative, and we care about the success of our team, other
                            teams, and Team Booksy. We are inclusive, give credit to others, and break down barriers. We
                            take care of one another and trust in each other’s abilities.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="Mycard mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/shoot-for-the-moon.png">
                    <div class="whyB-image-text">
                        <p class="text-center">We go beyond boundaries and take a different approach when we hit
                            obstacles. We're ambitious in setting our sights on the best, never settling for what’s
                            mediocre or taking “no” for an answer. When a door shuts, break a window.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('customjs')
<script
    src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key')}}&libraries=places&callback=initialize&language=en&region=GB"
    async defer></script>
<script src="/js/mapInput.js"></script>

@endsection
@endsection



<!-- <div class="row">
    <div class="col-md-7 mx-auto">
        <div class="banner-search-box">
            <form action="{{ route('advance.search') }}" method="get">
                <div class="row">
                    <div class="col-md-4" style="border-right: 1px solid #ddd;">
                        <div class="drop-lefts">
                            <input
                                class="form-control border-0 map-input {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                type="text" name="service_name" value="{{ old('address') }}"
                                placeholder="Service Name ">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="search-frm">
                            <div class="input-group">
                                <input
                                    class="form-control border-0 map-input {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                    type="text" name="name" value="{{ old('address') }}"
                                    placeholder="Or Username  & Business Name">
                                {{-- <input type="hidden" name="latitude" id="address-latitude"
                                                    value="{{ old('latitude') ?? '0' }}" />
                                <input type="hidden" name="longitude" id="address-longitude"
                                    value="{{ old('longitude') ?? '0' }}" />
                                <div id="address-map-container" class="mb-2"
                                    style="width:100%;height:400px; display:none; ">
                                    <div style="width: 100%; height: 100%" id="address-map"></div>
                                </div> --}}
                                <div class="input-group-append">
                                    <button class="btn bg-white" type="submit">
                                        <i class="fa fa-search text-muted"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->