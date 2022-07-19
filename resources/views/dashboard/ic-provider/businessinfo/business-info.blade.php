@extends('dashboard.layouts.master')
@section('title', 'Business Information')
@section('udcontent')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none"
                        id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>
                    <!--end::Mobile Toggle-->
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Profile</h2>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Profile</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Business Information</a>
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
                <!--begin::Profile Personal Information-->
                <div class="d-flex flex-row">
                    <!--begin::Aside-->
                    @include('dashboard.profile.aside')
                    <!--end::Aside-->
                    <!--begin::Content-->
                    <div class="flex-row-fluid ml-lg-8">
                        <!--begin::Card-->
                        <div class="card card-custom card-stretch">
                            <!--begin::Header-->
                            <div class="card-header py-3">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Business Information</h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Update your business
                                        information</span>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="example-preview">
                                    <ul class="nav nav-light-success nav-pills mb-20" id="myTab3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab-3" data-toggle="tab" href="#home-3">
                                                <span class="nav-icon">
                                                    <i class="flaticon2-chat-1"></i>
                                                </span>
                                                <span class="nav-text">About</span>
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab-5" data-toggle="tab" href="#contact-5"
                                                aria-controls="privider-social">
                                                <span class="nav-icon">
                                                    <i class="flaticon2-social-icons-1"></i>
                                                </span>
                                                <span class="nav-text">Social Media</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab-6" data-toggle="tab" href="#contact-6"
                                                aria-controls="privider-portfolio">
                                                <span class="nav-icon">
                                                    <i class="flaticon2-social-icons-1"></i>
                                                </span>
                                                <span class="nav-text">Portfolio</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab-6" data-toggle="tab" href="#contact-7"
                                                aria-controls="privider-portfolio">
                                                <span class="nav-icon">
                                                    <i class="flaticon2-social-icons-1"></i>
                                                </span>
                                                <span class="nav-text">Timing Sloting</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-5" id="myTabContent3">
                                        <div class="tab-pane fade active show" id="home-3" role="tabpanel"
                                            aria-labelledby="home-tab-3">

                                            <form action="{{ route('user.ic.businessinfo.update.about') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Business Logo</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="image-input image-input-outline" id="kt_profile_avatar"
                                                            style="background-image: url({{ asset('backend') }}/assets/media/users/blank.png)">
                                                            <div class="image-input-wrapper"
                                                                style="background-image: url(@if (!empty(Auth::user()->business_logo)) {{ asset(Auth::user()->business_logo) }} @else {{ asset('defaults/avatar/avatar.png') }} @endif)">
                                                            </div>
                                                            <label
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="change" data-toggle="tooltip" title=""
                                                                data-original-title="Change avatar">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="business_logo" />
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
                                                            {{ $errors->has('business_logo') ? $errors->first('business_logo') : '' }}
                                                        </div>
                                                        <span class="form-text text-muted">Allowed file types: png,
                                                            jpg,jpeg,svg,
                                                            jpeg.</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Thumbnail Image</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="image-input image-input-outline" id="kt_profile_avatar"
                                                            style="background-image: url({{ asset('backend') }}/assets/media/users/blank.png)">
                                                            <div class="image-input-wrapper"
                                                                style="background-image: url(@if (!empty(Auth::user()->thumbnail_img)) {{ asset(Auth::user()->thumbnail_img) }} @else {{ asset('defaults/avatar/avatar.png') }} @endif)">
                                                            </div>
                                                            <label
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="change" data-toggle="tooltip" title=""
                                                                data-original-title="Change avatar">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="thumbnail_img" />
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
                                                            {{ $errors->has('thumbnail_img') ? $errors->first('thumbnail_img') : '' }}
                                                        </div>
                                                        <span class="form-text text-muted">Allowed file types: png,
                                                            jpg,jpeg,svg,
                                                            jpeg.</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Business Name</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input name="business_name"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="text" placeholder="Name"
                                                            value="{{ Auth::user()->business_name }}" />
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('business_name') ? $errors->first('business_name') : '' }}
                                                        </div>
                                                    </div>
                                                </div>



                                                {{-- <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Address</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('address'))?($errors->first('address')):''}}</div>
                                                    </div>
                                                </div> --}}
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="address">Address</label>

                                                            <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ Auth::user()->address }}">
                                                            <input type="hidden" name="latitude" id="address-latitude" value="{{ Auth::user()->latitude ?? '0' }}" />
                                                            <input type="hidden" name="longitude" id="address-longitude" value="{{ Auth::user()->longitude ?? '0' }}" />

                                                            @if($errors->has('address'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('address') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div id="address-map-container" class="mb-2" style="width:100%;height:400px; ">
                                                            <div style="width: 100%; height: 100%" id="address-map"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">About</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <textarea name="business_about" placeholder="Enter business about"
                                                            rows="2"
                                                            class="form-control">{{ Auth::user()->business_about }}</textarea>
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('business_about') ? $errors->first('business_about') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-phone"></i>
                                                                </span>
                                                            </div>
                                                            <input name="mobile" type="text"
                                                                class="form-control form-control-lg form-control-solid"
                                                                value="{{ Auth::user()->mobile }}" placeholder="Phone" />

                                                        </div>
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Type</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="mobile" type="text"
                                                                class="form-control form-control-lg form-control-solid"
                                                                value="{{ (auth()->user()->ic_status == 0) ? "Travel" : "Saloon" }}" disabled />

                                                        </div>
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input type="submit" value="Update" class="btn btn-sm btn-success">
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="tab-pane fade" id="contact-7" role="tabpanel" aria-labelledby="contact-tab-4">
                                            <form action="@if ($whCheck != 0) {{ route('user.businessinfo.update.wh', @$businessHourUpdate->id) }} @else {{ route('user.businessinfo.add.wh') }} @endif" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Saturday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="sat_s" class="form-control form-control-lg form-control-solid" type="time" placeholder="Start" value="{{$businessHourUpdate->sat_s ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="sat_e" class="form-control form-control-lg form-control-solid" type="time" placeholder="End" value="{{$businessHourUpdate->sat_e ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" {{( $businessHourUpdate && $businessHourUpdate->sat_s == null &&  $businessHourUpdate->sat_s == null ) ? 'checked' : ''}} name="sat_close">
                                                        <label class="form-check-label" >
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Sunday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="san_s" class="form-control form-control-lg form-control-solid" type="time" placeholder="Start" value="{{$businessHourUpdate->san_s ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="san_e" class="form-control form-control-lg form-control-solid" type="time" placeholder="End" value="{{$businessHourUpdate->san_e ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" {{( $businessHourUpdate && $businessHourUpdate->san_s == null &&  $businessHourUpdate->san_e == null ) ? 'checked' : ''}}  name="sun_close">
                                                        <label class="form-check-label" >
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Monday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="mon_s" class="form-control form-control-lg form-control-solid" type="time" placeholder="Start" value="{{$businessHourUpdate->mon_s ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="mon_e" class="form-control form-control-lg form-control-solid" type="time" placeholder="End" value="{{$businessHourUpdate->mon_e ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" {{( $businessHourUpdate && $businessHourUpdate->mon_s == null &&  $businessHourUpdate->mon_e == null ) ? 'checked' : ''}}  name="mon_close">
                                                        <label class="form-check-label" >
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Tuesday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="tus_s" class="form-control form-control-lg form-control-solid" type="time" placeholder="Start" value="{{$businessHourUpdate->tus_s ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="tus_e" class="form-control form-control-lg form-control-solid" type="time" placeholder="End" value="{{$businessHourUpdate->tus_e ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox"  {{( $businessHourUpdate && $businessHourUpdate->tus_s == null &&  $businessHourUpdate->tus_e == null ) ? 'checked' : ''}} name="tus_close">
                                                        <label class="form-check-label" >
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Wednesday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="wen_s" class="form-control form-control-lg form-control-solid" type="time" placeholder="Start" value="{{$businessHourUpdate->wen_s ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="wen_e" class="form-control form-control-lg form-control-solid" type="time" placeholder="End" value="{{$businessHourUpdate->wen_e ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" {{( $businessHourUpdate && $businessHourUpdate->wen_s == null &&  $businessHourUpdate->wen_e == null ) ? 'checked' : ''}} name="wnd_close">
                                                        <label class="form-check-label" >
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Thursday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="thus_s" class="form-control form-control-lg form-control-solid" type="time" placeholder="Start" value="{{$businessHourUpdate->thus_s ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="thus_e" class="form-control form-control-lg form-control-solid" type="time" placeholder="End" value="{{$businessHourUpdate->thus_e ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" {{( $businessHourUpdate && $businessHourUpdate->thus_s == null &&  $businessHourUpdate->thus_e == null ) ? 'checked' : ''}} name="thus_close">
                                                        <label class="form-check-label" >
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Friday</label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="fri_s" class="form-control form-control-lg form-control-solid" type="time" placeholder="Start" value="{{$businessHourUpdate->fri_s ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input name="fri_e" class="form-control form-control-lg form-control-solid" type="time" placeholder="End" value="{{$businessHourUpdate->fri_e ?? null}}" />

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <input class="form-check-input" type="checkbox" {{($businessHourUpdate && $businessHourUpdate->fri_s == null &&  $businessHourUpdate->fri_e == null ) ? 'checked' : ''}}  name="fri_close">
                                                        <label class="form-check-label">
                                                            CLOSE
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="submit" value="@if ($whCheck != 0) Update @else Submit @endif" class="btn btn-sm btn-success">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="contact-5" role="tabpanel"
                                            aria-labelledby="contact-tab-5">
                                            <form action="@if($socialCheck != 0) {{ route('user.ic.businessinfo.update.social', @$socialmedia->id) }} @else {{ route('user.ic.businessinfo.add.social') }} @endif" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Facebook</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input name="facebook"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="text" placeholder="Facebook" value="{{ @$socialmedia->facebook }}" />
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('facebook') ? $errors->first('facebook') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Twitter</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input name="twitter"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="text" placeholder="Twitter" value="{{ @$socialmedia->twitter }}" />
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('twitter') ? $errors->first('twitter') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Linkedin</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input name="linkedin"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="text" placeholder="Linkedin" value="{{ @$socialmedia->linkedin }}" />
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('linkedin') ? $errors->first('linkedin') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Instagram</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input name="instagram"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="text" placeholder="instagram" value="{{ @$socialmedia->instagram }}" />
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('instagram') ? $errors->first('instagram') : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Youtube</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input name="youtube"
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="text" placeholder="youtube" value="{{ @$socialmedia->youtube }}" />
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('youtube') ? $errors->first('youtube') : '' }}
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input type="submit" value=" Submit" class="btn btn-sm btn-success">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="contact-6" role="tabpanel"
                                            aria-labelledby="contact-tab-6">
                                            <form action="{{ route('user.ic.businessinfo.add.portfolio')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Portfolio Image</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{ asset('backend') }}/assets/media/users/blank.png)">
                                                            <div class="image-input-wrapper">
                                                            </div>
                                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="portfolio_image" />
                                                                <input type="hidden" name="profile_avatar_remove" />
                                                            </label>
                                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                        </div>
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('portfolio_image') ? $errors->first('portfolio_image') : '' }}
                                                        </div>
                                                        <span class="form-text text-muted">Allowed file types: png,
                                                            jpg,jpeg,svg,
                                                            jpeg.</span>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="submit" value=" Submit" class="btn btn-sm btn-success">
                                                    </div>
                                                </div>
                                            </form>



                                        <label for="">Portfolio Images</label>

                                        <div class="row">
                                            @foreach($portfolios as $portfolio)
                                            <div class="col-md-6">
                                                <img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100%; height:170px;" id="showSubImage1" src="@if(!empty($portfolio->portfolio_image)) {{asset($portfolio->portfolio_image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="image">
                                                <a href="{{route('user.ic.businessinfo.remove.portfolio',$portfolio->id)}}">Remove</a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!--end::Body-->

                            <!--end::Form-->
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Profile Personal Information-->
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


@endsection
@endsection
