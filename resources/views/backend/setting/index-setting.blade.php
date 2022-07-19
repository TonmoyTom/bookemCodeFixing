@extends('backend.layouts.master')
@section('title', 'Site Setting')
@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none"
                        id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>
                    <!--end::Mobile Toggle-->
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Site Setting </h5>
                        <!--end::Page Title-->
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">Update Site Setting</h3>
                            </div>
                            <!--begin::Form-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{ route('setting.update', $setting->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Coupon Fee For One Service</label>
                                                        <input type="number" min="0" class="form-control"
                                                            placeholder="Enter fee" name="coupon_fee_one"
                                                            value="{{ $setting->coupon_fee_one }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('coupon_fee_one') ? $errors->first('coupon_fee_one') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Coupon Fee For All Service</label>
                                                        <input type="number" min="0" class="form-control"
                                                            placeholder="Enter fee" name="coupon_fee_all"
                                                            value="{{ $setting->coupon_fee_all }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('coupon_fee_all') ? $errors->first('coupon_fee_all') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Booking Fee</label>
                                                        <input type="number" min="0" class="form-control"
                                                            placeholder="Booking fee" name="booking_fee"
                                                            value="{{ $setting->booking_fee }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('booking_fee') ? $errors->first('booking_fee') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Site Name</label>
                                                        <input type="text" class="form-control" placeholder="Site name"
                                                            name="site_name" value="{{ $setting->site_name }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('site_name') ? $errors->first('site_name') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Site Slogan</label>
                                                        <input type="text" class="form-control" placeholder="Site slogan"
                                                            name="site_slogan" value="{{ $setting->site_slogan }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('site_slogan') ? $errors->first('site_slogan') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Facebook Link</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Facebook link" name="facebook_link"
                                                            value="{{ $setting->facebook_link }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('facebook_link') ? $errors->first('facebook_link') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Twitter Link</label>
                                                        <input type="text" class="form-control" placeholder="Twitter link"
                                                            name="twitter_link" value="{{ $setting->twitter_link }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('twitter_link') ? $errors->first('twitter_link') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Instagram Link</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Instagram link" name="instagram_link"
                                                            value="{{ $setting->instagram_link }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('instagram_link') ? $errors->first('instagram_link') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Linkedin Link</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Linkedin link" name="linkedin_link"
                                                            value="{{ $setting->linkedin_link }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('linkedin_link') ? $errors->first('linkedin_link') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Youtube Link</label>
                                                        <input type="text" class="form-control" placeholder="Youtube link"
                                                            name="youtube_link" value="{{ $setting->youtube_link }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('youtube_link') ? $errors->first('youtube_link') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Phone Number</label>
                                                            <input id="phone" name="phone" type="tel" placeholder="Enter phone number"  class="form-control" value="{{ $setting->phone }}">

                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('phone') ? $errors->first('phone') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="text" class="form-control" placeholder="Email"
                                                            name="email" value="{{ $setting->email }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('email') ? $errors->first('email') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Address</label>
                                                        <input
                                                            class="form-control map-input mb-2 {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                                            type="text" name="address" id="address" value="{{ $setting->address }}"
                                                            placeholder="Enter your address">
                    
                                                        <input type="hidden" name="latitude" id="address-latitude"
                                                            value="{{ $setting->latitude ?? '0' }}" />
                                                        <input type="hidden" name="longitude" id="address-longitude"
                                                            value="{{ $setting->longitude ?? '0' }}" />
                                                        <div id="address-map-container" class="mb-2" style="display:none;">
                                                            <div style="width: 100%; height: 100%" id="address-map"></div>
                                                        </div>
                    
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('address') ? $errors->first('address') : '' }}</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="" class="d-block">Site Dark Logo</label>
                                                        <div class="image-input image-input-outline" id="kt_profile_avatar"
                                                            style="background-image: url({{ asset('backend') }}/assets/media/users/blank.png)">
                                                            <div class="image-input-wrapper"
                                                                style="background-image: url({{ asset($setting->logo) }})">
                                                            </div>
                                                            <label
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="change" data-toggle="tooltip" title=""
                                                                data-original-title="Change avatar">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="logo" />
                                                                <input type="hidden" name="profile_avatar_remove" />
                                                            </label>
                                                            <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="cancel" data-toggle="tooltip"
                                                                title="Cancel avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                            <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="remove" data-toggle="tooltip"
                                                                title="Remove avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                        </div>
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('logo') ? $errors->first('logo') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="" class="d-block">Site White Logo</label>
                                                        <div class="image-input image-input-outline" id="kt_profile_avatar"
                                                            style="background-image: url({{ asset('backend') }}/assets/media/users/blank.png)">
                                                            <div class="image-input-wrapper"
                                                                style="background-image: url({{ asset($setting->white_logo) }})">
                                                            </div>
                                                            <label
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="change" data-toggle="tooltip" title=""
                                                                data-original-title="Change avatar">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="white_logo" />
                                                                <input type="hidden" name="profile_avatar_remove" />
                                                            </label>
                                                            <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="cancel" data-toggle="tooltip"
                                                                title="Cancel avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                            <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="remove" data-toggle="tooltip"
                                                                title="Remove avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                        </div>
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('white_logo') ? $errors->first('white_logo') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="">Copyright Text</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Copyright text" name="copyright"
                                                            value="{{ $setting->copyright }}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('copyright') ? $errors->first('copyright') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="submit" value="Update" class="btn btn-success">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
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
    {{-- Phone number --}}
    <script src="{{ asset('intphone/intlTelInput.js') }}"></script>
    <script>
        // Vanilla Javascript
        var input = document.querySelector("#phone");
        window.intlTelInput(input, ({
            // options here
        }));

        $(document).ready(function() {
            $('.iti__flag-container').click(function() {
                var countryCode = $('.iti__selected-flag').attr('title');
                var countryCode = countryCode.replace(/[^0-9]/g, '')
                $('#phone').val("");
                $('#phone').val("+" + countryCode + " " + $('#phone').val());
            });
        });
    </script>
    

@endsection
@endsection
