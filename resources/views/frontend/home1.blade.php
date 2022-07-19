@extends('frontend.layouts.master')
@section('title', 'JustBooKem')
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
    <div class="container">
        <div class="header-bannerBOx">
            <div class="row">
                <div class="col-md-7 mx-auto">
                    <div class="header-title text-center text-white">
                        <h2>Quality personal care services, anytime</h2>
                        <p class="mt-3">Find top professionals of their field nearby you in your single tap
                        </p>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-7 mx-auto">
                    <div class="banner-search-box">
                        <form action="{{ route('advance.search') }}" method="get">
                            <div class="row">
                                <div class="col-md-4" style="border-right: 1px solid #ddd;">
                                    <div class="drop-lefts">
                                        <select name="category_id" id="" class="form-control" style="border:none;">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="search-frm">
                                        <div class="input-group">
                                            <input type="text" class="form-control border-0" placeholder="Where are you?" name="name">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit">
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
            </div>
        </div>
        <div class="banner-cat">
            <ul>
                @foreach ($categories->splice(0, 5) as $category)
                <li><a href="{{ route('category.vendor', $category->slug) }}">{{ $category->category_name }}</a></li>
                @endforeach

                @if($categories->splice(0)->count() != 0)
                <li class="bc-dd-btn">
                    <a href="">More...</a>
                    <div class="bc-dd">
                        @foreach ($categories->splice(0) as $category)
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
                    <h2>Service We Provide You</h2>
                </div>

            </div>
        </div>
        <div class="row mb-2">


            <div class="owl-header-category owl-carousel owl-theme">
                @foreach($categories as $category)
                <div class="items">
                    <div class="service-box">
                        <a href="{{ route('category.vendor', $category->slug) }}">
                            <img src="{{ asset($category->category_logo) }}" alt="{{ $category->category_name }}">
                            <div class="service_name">
                                <p>{{ $category->category_name }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
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
        <div class="bg-white p-3 rounded">
            <div class="row">
                {{-- @if ($allvendors->whareHas('offervendor')->isNotEmpty()) --}}
                @foreach ($allvendors->has('offervendor')->get() as $offervendor)

                @php
                $starSum = App\Models\CustomerReview::where('provider_id', $offervendor->id)->sum('rating');

                $ratingCount = App\Models\CustomerReview::where('provider_id', $offervendor->id)->count();

                if ($ratingCount != 0) {
                $ratingAvg = round($starSum / $ratingCount, 1);
                } else {
                $ratingAvg = 0;
                }
                @endphp



                <div class="col-md-3 mb-2 ">
                    <a href="{{ route('vendor.details', $offervendor->business_url) }}">
                        <div class="offerRunning-box bg-white">
                            <div class="orImg-box mb-2">
                                <img src="{{ asset($offervendor->thumbnail_img) }}" alt="">
                            </div>
                            <div class="img-titlerating-box">
                                <div class="rating-title-left d-flex  ">
                                    <div class="smallImg mr-2">
                                        <img src="{{ asset($offervendor->business_logo) }}" alt="">
                                    </div>
                                    <div>
                                        <h4>{{ $offervendor->business_name }}</h4>
                                        <p><i class="fa fa-map-marker"></i>
                                            @if ($offervendor->service_location == 1)
                                            {{ $offervendor->address }}
                                            @else
                                            Home Service
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <h5>{{ $ratingAvg }} <br> Rating</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                {{-- @endif --}}

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


            @foreach ($allvendors->where('rating', '>=', '4.3')->get() as $topvendor)
            @php
            $starSum = App\Models\CustomerReview::where('provider_id', $topvendor->id)->sum('rating');

            $ratingCount = App\Models\CustomerReview::where('provider_id', $topvendor->id)->count();

            if ($ratingCount != 0) {
            $ratingAvg = round($starSum / $ratingCount, 1);
            } else {
            $ratingAvg = 0;
            }
            @endphp

            <div class="col-md-3 mb-2 ">
                <a href="{{ route('vendor.details', $topvendor->business_url) }}">
                    <div class="offerRunning-box bg-white">
                        <div class="orImg-box mb-2">
                            <img src="{{ asset($topvendor->thumbnail_img) }}" alt="">
                        </div>
                        <div class="img-titlerating-box">
                            <div class="rating-title-left d-flex  ">
                                <div class="smallImg mr-2">
                                    <img src="{{ asset($topvendor->business_logo) }}" alt="">
                                </div>
                                <div>
                                    <h4>{{ $topvendor->business_name }}</h4>
                                    <p><i class="fa fa-map-marker"></i>
                                        @if ($topvendor->service_location == 1)
                                        {{ $topvendor->address }}
                                        @else
                                        Home Service
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div>
                                <h5>{{ $ratingAvg }} <br> Rating</h5>
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
                    <h2>Recommended</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($allvendors->get() as $vendor)
            <div class="col-md-3 mb-2">
                <div class="card rounded-lg Mycard mt-4">
                    <div class="recom-image">

                        <img src="{{ asset($vendor->thumbnail_img) }}" class="card-img-top" alt="">

                    </div>
                    <div class="col-sm-4 right-rating float-right">
                        <p class="rating-02 text-center">{{ $vendor->customerRatings }}</p>
                        <p class="rating-03 text-center">Rating</p>
                    </div>
                    <div class="card-body">

                        <img class="card-sticker" src="{{ asset($vendor->business_logo) }}" alt="">
                        <h6 class="mt-1">{{ $vendor->business_name }}</h6>
                        <hr />
                        <p class="recomand"><i class="fa fa-map-marker"></i>
                            @if ($vendor->service_location == 1)
                            {{ $vendor->address }}
                            @else
                            Home Service
                            @endif
                        </p>

                        <a href="{{ route('vendor.details', $vendor->business_url) }}" class="vibeBtn">Explore</a>
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
            @foreach($adminreviews as $adminreview)
            <div class="items">
                <div class="card review-card">
                    <div class="card-body">
                        <div class="card-image-review col-sm-6 float-left">
                            <img src="{{ asset($adminreview->image) }}" height="210px" width="200px">
                        </div>
                        <div class="col-sm-6 float-right">
                            <p class="recomand">{{$adminreview->customer_name}}</p>
                            <p class="card-text review-text">{!! $adminreview->description !!}</p>
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
                <div class="card rounded-lg midslider  mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/bigimage.png" class="card-img-top-01" alt="">
                    <div class="card-body card-slider">

                        <h3 class=" exploer-card-title">Find professional hair designer<br>
                            nearby you.</h3>
                            <a href="{{ route('login')}}" class="btn btn-info">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="items">
                <div class="card rounded-lg midslider mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/hair1.jpg" class="card-img-top-01" alt="">
                    <div class="card-body card-slider">
                        <h3 class=" exploer-card-title">Find professional hair designer<br>
                            nearby you.</h3>
                        <a href="{{ route('login')}}" class="btn btn-info">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="items">
                <div class="card rounded-lg midslider mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/hair2.jpg" class="card-img-top-01" alt="">
                    <div class="card-body card-slider">
                        <h3 class=" exploer-card-title">Find professional hair designer<br>
                            nearby you.</h3>
                        <a href="{{ route('login')}}" class="btn btn-info">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="items">
                <div class="card rounded-lg midslider mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/hair3.jpg" class="card-img-top-01" alt="">
                    <div class="card-body card-slider">
                        <h3 class=" exploer-card-title">Find professional hair designer<br>
                            nearby you.</h3>
                        <a href="{{ route('login')}}" class="btn btn-info">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="items">
                <div class="card rounded-lg midslider mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/hair4.jpg" class="card-img-top-01" alt="">
                    <div class="card-body card-slider">
                        <h3 class=" exploer-card-title">Find professional hair designer<br>
                            nearby you.</h3>
                        <a href="{{ route('login')}}" class="btn btn-info">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="items">
                <div class="card rounded-lg midslider mt-4">
                    <img src="{{ asset('frontend') }}/asset/image/hair5.jpg" class="card-img-top-01" alt="">
                    <div class="card-body card-slider">
                        <h3 class=" exploer-card-title">Find professional hair designer<br>
                            nearby you.</h3>
                        <a href="{{ route('login')}}" class="btn btn-info">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">


                <div class="col-sm-6 float-right">
                    <img src="{{ asset('frontend') }}/asset/image/playimg.png" height="517px" width="524px">
                </div>
                <div class="card-image-review col-sm-6 float-left">
                    <img src="{{ asset($setting->logo ?? '/') }}">
                    <h2 style="font-size: 40px;">Wholesome features on our mobile app.</h2>
                    <p class="mt-1" style="font-size: 18px;">Anys plalaligt. Kamunat galigt,
                        anana och leska såväl som gun. Heterose speprena, gur anar. Selingar vände, gus.
                        Ojås dol cyntiv, tegisk, belogi.
                        Bötött arade. Trejasamma spoilervarning. Jåv mat epilagen. Ass multipänar. Trikång
                        bögisk, preröskap, för att sysade ontotologi.
                        Supragugt infraligen. Or neböktig kivis. Dire fagukögt. Kvasiligt apfälla. Mavis ro.
                        Joliga sögt, göskapet varade. Gunde rösera flexitarian, krobös.
                    </p>
                    <a href="#"><img src="{{ asset('frontend') }}/asset/image/image-7.png"></a>
                    <a href="#"><img src="{{ asset('frontend') }}/asset/image/image-8.png"></a>
                </div>


            </div>
        </div>
    </div>
</section>
<section class="py-4">
    <div class="container">
        <div class="row ">
            <div class="col-12 mt-3">
                <h3 class="cardTitle" style="font-size: 25px;">Why Just Bookem ?</h3>
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-3">
                <div class="card rounded-lg Mycard mt-4">
                    <img class="mx-auto vactor" src="{{ asset('frontend') }}/asset/image/vactor/Vector.png" width="35" height="35" alt="">
                    <div class="card-body col-sm-12 justify-content-center">
                        <p class="text-center cliptym-01">Affordable</p>
                    </div>
                    <div class="col-sm-12">
                        <p class="text-center">Vask. Ask kabes sulig. Anakament bevis. Apresa suvis pseudolapp
                            begt än fast. Boling bet supraning. </p>
                    </div>
                </div>
            </div>
            <div class=" col-sm-3">
                <div class="card rounded-lg Mycard mt-4">
                    <img class="mx-auto vactor" src="{{ asset('frontend') }}/asset/image/vactor/Vector(1).png" width="35" height="35" alt="">
                    <div class="card-body col-sm-12 justify-content-center">
                        <p class="text-center cliptym-01">Affordable</p>
                    </div>
                    <div class="col-sm-12">
                        <p class="text-center">Vask. Ask kabes sulig. Anakament bevis. Apresa suvis pseudolapp
                            begt än fast. Boling bet supraning. </p>
                    </div>
                </div>
            </div>
            <div class=" col-sm-3">
                <div class="card rounded-lg Mycard mt-4">
                    <img class="mx-auto vactor" src="{{ asset('frontend') }}/asset/image/vactor/Vector(2).png" width="35" height="35" alt="">
                    <div class="card-body col-sm-12 justify-content-center">
                        <p class="text-center cliptym-01">Affordable</p>
                    </div>
                    <div class="col-sm-12">
                        <p class="text-center">Vask. Ask kabes sulig. Anakament bevis. Apresa suvis pseudolapp
                            begt än fast. Boling bet supraning. </p>
                    </div>
                </div>
            </div>
            <div class=" col-sm-3">
                <div class="card rounded-lg Mycard mt-4">
                    <img class="mx-auto vactor " src="{{ asset('frontend') }}/asset/image/vactor/Vector(3).png" width="35" height="35" alt="">
                    <div class="card-body col-sm-12 justify-content-center">
                        <p class="text-center cliptym-01">Affordable</p>
                    </div>
                    <div class="col-sm-12">
                        <p class="text-center">Vask. Ask kabes sulig. Anakament bevis. Apresa suvis pseudolapp
                            begt än fast. Boling bet supraning. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('customjs')


@endsection
@endsection
