@extends('dashboard.layouts.master')
@section('title', 'edit Independent Controctor')
@section('udcontent')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Independent Controctor</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">Edit Independent Controctor</a>
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
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Edit Independent Controctor Provider
                            
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm font-weight-bolder">
                            < Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('ic.provider.update',$dataIcedit->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" value="{{ $dataIcedit->name}}" name="name" value="{{ old('name') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('name') ? $errors->first('name') : '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Business Name</label>
                                    <input type="text" class="form-control" value="{{ $dataIcedit->business_name}}" name="business_name" value="{{ old('business_name') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('business_name') ? $errors->first('business_name') : '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" value="{{ $dataIcedit->email}}" name="email" value="{{ old('email') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" value="{{ $dataIcedit->mobile}}" name="mobile" value="{{ old('mobile') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" value="{{ $dataIcedit->address}}" name="address" value="{{ old('address') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('address') ? $errors->first('address') : '' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <span class="text-muted">If you want change the password.so Enter the new password.</span>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" />
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> Image</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url( @if(!empty($dataIcedit->image)) {{asset($dataIcedit->image)}} @else {{ asset('backend') }}/assets/media/users/blank.png) @endif">
                                            <div class="image-input-wrapper">
                                            </div>
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
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('image') ? $errors->first('image') : '' }}
                                        </div>
                                        <span class="form-text text-muted">Allowed file types: png,
                                            jpg,jpeg,svg,
                                            jpeg.</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" id="submitBtn" value="Submit" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

@endsection