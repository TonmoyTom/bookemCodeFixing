@extends('dashboard.layouts.master')
@section('title','Edit Password')
@section('udcontent')


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
                            <a href="" class="text-muted">Change Password</a>
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
                    <form class="form" action="{{route('user.update.password')}}" method="post">
                        @csrf
                        <div class="card card-custom card-stretch">
                            <!--begin::Header-->
                            <div class="card-header py-3">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
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
                                <!--begin::Alert-->
                                <div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-3x svg-icon-danger">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Info-circle.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                                    <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"></rect>
                                                    <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"></rect>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="alert-text font-weight-bold">Configure user passwords to expire periodically. Users will need warning that their passwords are going to expire,
                                        <br>or they might inadvertently get locked out of the system!
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="ki ki-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <!--end::Alert-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current Password</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input type="password" class="form-control form-control-lg form-control-solid mb-2" name="current_password" placeholder="Current password">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('current_password'))?($errors->first('current_password')):''}}</div>
                                        <a href="#" class="text-sm font-weight-bold">Forgot password ?</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input name="new_password" type="password" class="form-control form-control-lg form-control-solid" value="" placeholder="New password">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('new_password'))?($errors->first('new_password')):''}}</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify Password</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input name="password_confirmation" type="password" class="form-control form-control-lg form-control-solid" value="" placeholder="Verify password">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</div>
                                    </div>
                                </div>
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
@endsection
