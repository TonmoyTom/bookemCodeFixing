@extends('dashboard.layouts.master')
@section('title', 'Create Customer')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Employee</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">Employee</a>
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
                        <h3 class="card-label">Create Employee
                            <span class="d-block text-muted pt-2 font-size-sm">Create Employee here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('add.employee.index')}}" class="btn btn-success btn-sm font-weight-bolder"> <i class="la la-angle-left"></i>
                            Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('add.employee.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Employee Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Employee Name" name="business_name" value="{{ old('name') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('name') ? $errors->first('name') : '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Employee About</label>
                                    <input type="text" class="form-control" placeholder="Enter Employee About" name="business_about" value="{{ old('name') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('name') ? $errors->first('name') : '' }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Employee Name" name="name" value="{{ old('name') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('name') ? $errors->first('name') : '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Employee Email" name="email" value="{{ old('email') }}">
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
                                    <input type="text" class="form-control" placeholder="Enter Employee Phone Number" name="mobile" value="{{ old('mobile') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" placeholder="Enter Employee Addres" name="address" value="{{ old('address') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('address') ? $errors->first('address') : '' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Enter Confirm password" name="password_confirmation" />
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"> Image</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{ asset('backend') }}/assets/media/users/blank.png)">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sevice</label>
                                    <select class="form-control myselect2" multiple name="business_category[]" style="width:100% !important;">
                                        @foreach ($data as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expreinces Date From</label>
                                    <input type="date" class="form-control" placeholder="Enter Confirm password" name="experince_from" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expreinces Date To</label>
                                    <input type="text" class="form-control" disabled placeholder="Enter Confirm password" name="expreinces_to"  id="currentDate"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Expreinces</label>
                                    <textarea class="form-control" placeholder="Enter Details" name="experinces"> </textarea>
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

@section('customjs')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script>
let today = new Date();
const yyyy = today.getFullYear();
let mm = today.getMonth() + 1; // Months start at 0!
let dd = today.getDate();

if (dd < 10) dd = '0' + dd;
if (mm < 10) mm = '0' + mm;

today = mm + '/' + dd + '/' + yyyy;

document.getElementById('currentDate').value = today;
</script>
@endsection
@endsection


