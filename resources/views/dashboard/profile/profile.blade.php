@extends('dashboard.layouts.master')
@section('title','Profile')
@section('udcontent')

<style>
.provider-srat > .fa{
    color: #f7bb2f;
}
.providertop-right{
    display: flex;
    justify-content: space-between;
}

</style>

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
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
                            <a href="" class="text-muted">Personal Information</a>
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
                    <form class="form" action="{{route('user.update.profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-custom card-stretch">
                            <!--begin::Header-->
                            <div class="card-header py-3">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
                                </div>
                                <div class="card-toolbar">
                                    <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <!--begin::Body-->
                            <div class="card-body">
                                @if(Auth::user()->usertype == 2)
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('backend')}}/assets/media/users/blank.png)">
                                            <div class="image-input-wrapper" style="background-image: url(@if(!empty(Auth::user()->image)) {{asset( Auth::user()->image ) }} @else {{asset('defaults/avatar/avatar.png')}} @endif)"></div>
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
                                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                    </div>
                                </div>
                                @endif

                                @if(Auth::user()->providertype == 3)
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('backend')}}/assets/media/users/blank.png)">
                                            <div class="image-input-wrapper" style="background-image: url(@if(!empty(Auth::user()->image)) {{asset( Auth::user()->image ) }} @else {{asset('defaults/avatar/avatar.png')}} @endif)"></div>
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
                                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Vendor Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="name" class="form-control form-control-lg form-control-solid" type="text" placeholder="Name" value="{{ App\User::select('name')->where('ic_provider_id', Auth::user()->ic_provider_id)->first()->name }}" disabled/>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                                    </div>
                                </div>
                                @endif

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                    <div class="col-lg-9">
                                        <input name="name" class="form-control form-control-lg form-control-solid" type="text" placeholder="Name" value="{{Auth::user()->name}}" />
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone Number</label>
                                    <div class="col-lg-9">
                                        <input id="phone" name="mobile" type="tel" placeholder="Enter phone number"  class="form-control" value="{{ Auth::user()->mobile }}">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile'))?($errors->first('mobile')):''}}</div>
                                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                    <div class="col-lg-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-at"></i>
                                                </span>
                                            </div>
                                            <input name="email" type="text" class="form-control form-control-lg form-control-solid" value="{{Auth::user()->email}}" placeholder="Email" />

                                        </div>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                                    </div>
                                </div>
                                @if(Auth::user()->usertype == 1 && Auth::user()->providertype == 2)
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input
                                        class="form-control map-input mb-2 {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                        type="text" name="address" id="address" value="{{ old('address') }}"
                                        placeholder="Enter your address">

                                    <input type="hidden" name="latitude" id="address-latitude"
                                        value="{{ old('latitude') ?? '0' }}" />
                                    <input type="hidden" name="longitude" id="address-longitude"
                                        value="{{ old('longitude') ?? '0' }}" />
                                    <div id="address-map-container" class="mb-2"
                                        style="width:100%;height:200px;">
                                        <div style="width: 100%; height: 100%" id="address-map"></div>
                                    </div>

                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('address') ? $errors->first('address') : '' }}</div>
                                </div>
                                @endif
                            </div>
                            <!--end::Body-->

                            <!--end::Form-->
                        </div>
                    </form>



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
