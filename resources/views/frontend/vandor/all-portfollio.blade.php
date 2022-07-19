@extends('frontend.layouts.master')
@section('title', '' . $vendorName . '')
@section('content')
    <style>
        .vname h1 {
            font-size: 20px;

        }

    </style>

    <!-- Statrt Vandor profile -->

    <section class="service-detls py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7">

                    <div class="row">
                        <div class="col">
                            <div class="vendor-pBox">
                                <div class="text-center mb-4 mt-3 ">
                                    <div class="vname">
                                        <h1 class="mb-1 ">{{ $vendor->business_name }}</h1>
                                        <span><i class="fa fa-map-marker"></i>
                                            @if ($vendor->service_location == 1)
                                                {{ $vendor->address }}
                                            @else
                                                Home Service
                                            @endif
                                        </span>
                                    </div>


                                </div>


                                <div class="row mb-3 parent-container">
                                    @foreach ($portfolios as $portfolio)
                                        <div class="col-md-4">
                                            <div class="seeimg mb-3">
                                                <a href="{{ asset($portfolio->portfolio_image) }}"><img style="" class="img-thoumbnil"
                                                        src="{{ asset($portfolio->portfolio_image) }}" alt=""></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="vp-right">
                        <div class="googleMap">
                            <div class="form-group">
                                <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                    type="hidden" name="address" id="address" value="{{ $vendor->address }}">
                                <input type="hidden" name="latitude" id="address-latitude"
                                    value="{{ $vendor->latitude ?? '0' }}" />
                                <input type="hidden" name="longitude" id="address-longitude"
                                    value="{{ $vendor->longitude ?? '0' }}" />
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
                            <div class="col-12">
                                <div class="shiddul">
                                    <h4>Saturday</h4>
                                    <h4>{{ $businessHour->saturday ?? 'No service' }}</h4>
                                </div>
                                <div class="shiddul">
                                    <h4>Sunday</h4>
                                    <h4>{{ $businessHour->sunday ?? 'No service' }}</h4>
                                </div>
                                <div class="shiddul">
                                    <h4>Monday</h4>
                                    <h4>{{ $businessHour->monday ?? 'No service' }}</h4>
                                </div>
                                <div class="shiddul">
                                    <h4>Tuesday</h4>
                                    <h4>{{ $businessHour->tuesday ?? 'No service' }}</h4>
                                </div>
                                <div class="shiddul">
                                    <h4>Wednesday</h4>
                                    <h4>{{ $businessHour->wednesday ?? 'No service' }}</h4>
                                </div>
                                <div class="shiddul">
                                    <h4>Thursday</h4>
                                    <h4>{{ $businessHour->thursday ?? 'No service' }}</h4>
                                </div>
                                <div class="shiddul">
                                    <h4>Friday</h4>
                                    <h4>{{ $businessHour->friday ?? 'No service' }}</h4>
                                </div>
                            </div>
                        </div>
                        <hr class="my-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-name mt-4 text-center mb-4">
                                    <h2 class="mb-2">Social Media</h2>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="vendor-social text-center pb-4">
                                    @if (@$socialMedias->facebook)
                                        <a href="{{ @$socialMedias->facebook }}" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    @endif
                                    @if (@$socialMedias->twitter)
                                        <a href="{{ @$socialMedias->twitter }}" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    @endif
                                    @if (@$socialMedias->instagram)
                                        <a href="{{ @$socialMedias->instagram }}" target="_blank">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    @endif

                                    @if (@$socialMedias->linkedin)
                                        <a href="{{ @$socialMedias->linkedin }}" target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    @endif

                                    @if (@$socialMedias->youtube)
                                        <a href="{{ @$socialMedias->youtube }}" target="_blank">
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
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key')}}&libraries=places&callback=initialize&language=en&region=GB"
        async defer></script>
    <script src="/js/mapInput.js"></script>





    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62566a78876d5c3b"></script>



@endsection
@endsection
