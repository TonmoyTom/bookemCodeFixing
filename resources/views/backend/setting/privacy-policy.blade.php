@extends('backend.layouts.master')
@section('title','Setting Privacy-Policy')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Setting Privacy Policy</h5>
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
                            <h3 class="card-title">Update Setting Privacy Policy</h3>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                        <div class="row">
                        <div class="col-12">
                            <form action="@if($privacyCount != 0 ){{route('privacy.update',$privacy->id)}} @else {{route('privacy.store')}} @endif" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Privacy Policy Title</label>
                                            <input type="text" class="form-control" value="{{@$privacy->title}}" name="title" >
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('title'))?($errors->first('title')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Privacy Policy Description</label>
                                        <textarea class="summernote"
                                            name="description">
                                            {{@$privacy->description}}
                                        </textarea>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('description') ? $errors->first('description') : '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                               
                               
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="form-group">
                                            @if($privacyCount != 0)
                                            <input type="submit" value="Update" class="btn btn-success">
                                            @else
                                            <input type="submit" value="Insert" class="btn btn-success">
                                            @endif
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
@endsection
