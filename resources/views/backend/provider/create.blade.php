@extends('backend.layouts.master')
@section('title', 'Create Vendor')
@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Vendor</h5>
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Create Vendor</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('provider.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Business Name</label>
                                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('name') ? $errors->first('name') : '' }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Vendor Name</label>
                                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('name') ? $errors->first('name') : '' }}
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Vendor Location At</label>
                                            <select name="service_location" class="custom-select myselect2">
                                                <option class="hidden" selected disabled>Where do you work</option>
                                                <option value="1">At Vendor place</option>
                                                <option value="1">At clint's location</option>
                                            </select>
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('service_location') ? $errors->first('service_location') : '' }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Business Category</label>
                                            <select class="form-control myselect2" multiple name="business_category[]">
                                                @foreach ($data as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach


                                            </select>
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('business_category') ? $errors->first('business_category') : '' }}
                                            </div>
                                        </div>

                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('email') ? $errors->first('email') : '' }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="d-block">Phone Number</label>
                                            <input id="phone" name="mobile" type="tel" placeholder="Enter phone number" class="form-control">

                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Work Address</label>
                                            <input class="form-control map-input mb-2 {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address') }}" placeholder="Enter your address">

                                            <input type="hidden" name="latitude" id="address-latitude" value="{{ old('latitude') ?? '0' }}" />
                                            <input type="hidden" name="longitude" id="address-longitude" value="{{ old('longitude') ?? '0' }}" />
                                            <div id="address-map-container" class="mb-2" style="width:100%;height:200px;">
                                                <div style="width: 100%; height: 100%; display:none" id="address-map"></div>
                                            </div>

                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('address') ? $errors->first('address') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="d-block">Picture</label>
                                            <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('backend')}}/assets/media/users/blank.png)">
                                                <div class="image-input-wrapper"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="image" />
                                                    <input type="hidden" name="profile_avatar_remove" />
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('image'))?($errors->first('image')):''}}</div>
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">Password</label>
                                            <input class="form-control" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('password') ? $errors->first('password') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">Confirm Password</label>
                                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation') }}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="submit" value="Submit" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
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

<script src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key')}}&libraries=places&callback=initialize&language=en&region=GB" async defer></script>
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

    <script>
        //Load
        function loadPhone() {
            var countryCode = $('.iti__selected-flag').attr('title');
            var countryCode = countryCode.replace(/[^0-9]/g, '');
            $('#phone').val("");
            $('#phone').val("+" + countryCode + " " + $('#phone').val());
        }
        loadPhone();
    </script>

@endsection
@endsection