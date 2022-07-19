@extends('backend.layouts.master')
@section('title', 'Create Blog')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Blog</h5>
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
                                <h3 class="card-title">Create Blog</h3>
                                <div class="card-toolbar">
                                    <!--begin::Button-->
                                    <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm font-weight-bolder">
                                        < Back</a>
                                            <!--end::Button-->
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="card-body">
                                <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                            <div class="form-group">
                                                <label for="">Blog Title</label>
                                                <input type="text" class="form-control" placeholder="Name" name="title"
                                                    value="{{ old('title') }}">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('title') ? $errors->first('title') : '' }}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select class="form-control myselect2" name="category_id" id="category_id">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('category_id') ? $errors->first('category_id') : '' }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Descriptions</label>
                                                <textarea name="description" class="form-control summernote"
                                                    placeholder="Enter Your Description"></textarea>
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('description') ? $errors->first('description') : '' }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="" class="d-block">Blog Image</label>
                                                <div class="image-input image-input-outline" id="kt_profile_avatar"
                                                    style="background-image: url({{ asset('backend') }}/assets/media/users/blank.png)">
                                                    <div class="image-input-wrapper"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="image" />
                                                        <input type="hidden" name="profile_avatar_remove" />
                                                    </label>
                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                </div>
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('image') ? $errors->first('image') : '' }}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">In Active</option>
                                                </select>
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('status') ? $errors->first('status') : '' }}</div>
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
@endsection
