
@extends('dashboard.layouts.master')
@section('title','Provider Blogs')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Blogs</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">blogs</a>
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
            {{-- Category List --}}
            <div class="card card-custom mb-4">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Category List
                            <span class="d-block text-muted pt-2 font-size-sm">All Category here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                      
                        <!--end::Button-->
                        <!--begin::Button-->
                        <a href="#" class="btn btn-success font-weight-bolder" data-toggle="modal"
                        data-target="#add_categorymodal">
                                <i class="la la-plus"></i>Add Category</a>
                        <!--end::Button-->
                    </div>


                </div>
                <div class="card-body table-responsive">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>name</th>
                              
                                
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($blogcategorys as $blogcategory)

                          <tr>
                                <td>{{$loop->iteration}}</td>
                               
                                <td>{{ $blogcategory->category_name}}</td>
                               
                               
                               
                               
                                <td>

                                    <a href=""
                                        class="btn btn-sm btn-clean btn-icon"><i class="la la-eye"></i></a>
                                    <a href=""
                                        class="btn btn-sm btn-clean btn-icon" data-toggle="modal"
                                        data-target="#edit_categorymodal_{{$blogcategory->id}}"><i class="la la-edit"></i></a>

                                        @php
                                        $check1 = 0;
    
                                        $check2 = 0;
                                        @endphp
    
                                        @if( $check1 > 0 || $check2 > 0)
                                        <button type="button" class="btn btn-icon btn-clean btn-sm delcheck"><i class="la la-trash"></i></button>
                                        @else
                                        <a id="delete" href="{{route('provider.blog.category.destroy',$blogcategory->id)}}" class="btn btn-icon btn-clean btn-sm"><i class="la la-trash"></i></a>
                                        @endif
                                      </td>

                               
                            </tr>

                            {{-- Add Category Modals --}}
<div class="modal fade" id="edit_categorymodal_{{$blogcategory->id}}"
tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Category
            </h5>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form
            action="{{ route('provider.blog.category.update', $blogcategory->id) }}"
            method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Category Name</label>
                    
                    <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name" value="{{$blogcategory->category_name}}">

                    <div style='color:red; padding: 0 5px;'>
                        {{ $errors->has('category_name') ? $errors->first('category_name') : '' }}
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save
                    Changes</button>
            </div>
        </form>
    </div>
</div>
</div>
                           
                          
                            @endforeach


                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            {{-- Blog List --}}
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Blogs List
                            <span class="d-block text-muted pt-2 font-size-sm">All Blogs here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                      
                        <!--end::Button-->
                        <!--begin::Button-->
                        <a href="#" class="btn btn-success font-weight-bolder" data-toggle="modal"
                        data-target="#add_blogmodal">
                                <i class="la la-plus"></i>Add Blog</a>
                        <!--end::Button-->
                    </div>

                </div>
                <div class="card-body table-responsive">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Status</th>
                                
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($blogs as $blog)

                          <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img width="50" src="{{asset($blog->image)}}" alt="">
                                </td>
                                <td>{{ $blog->title}}</td>
                               
                                <<td>{!! substr(strip_tags($blog->description), 0, 80) !!}</td>
                                <td>{{ $blog->category->category_name}}</td>
                                <td>
                                    @if ($blog->status == 1)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline"
                                    data-toggle="modal"
                                    data-target="#blog_status_{{ $blog->id }}">
                                    Active</a>
                                       
                                    

                                    @else 
                                    <a href="#" class="btn label label-lg label-light-danger label-inline"
                                    data-toggle="modal"
                                    data-target="#blog_status_{{ $blog->id }}">
                                    Inactive</a>
                                    @endif
                                </td>
                                <td>

                                    <a href=""
                                        class="btn btn-sm btn-clean btn-icon"><i class="la la-eye"></i></a>
                                    <a href=""
                                        class="btn btn-sm btn-clean btn-icon" data-toggle="modal"
                                        data-target="#edit_blogmodal_{{$blog->id}}"><i class="la la-edit"></i></a>

                                        @php
                                        $check1 = 0;
    
                                        $check2 = 0;
                                        @endphp
    
                                        @if( $check1 > 0 || $check2 > 0)
                                        <button type="button" class="btn btn-icon btn-clean btn-sm delcheck"><i class="la la-trash"></i></button>
                                        @else
                                        <a id="delete" href="{{route('provider.blog.destroy',$blog->id)}}" class="btn btn-icon btn-clean btn-sm"><i class="la la-trash"></i></a>
                                        @endif
                                      </td>

                               
                            </tr>
                             <!--Row Status -->
                             <div class="modal fade" id="blog_status_{{ $blog->id }}"
                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Blog Status
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form
                                            action="{{ route('provider.blog.status', $blog->id) }}"
                                            method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="service_status" class="form-control">
                                                        <option value="1" @if ($blog->status == 1) selected @endif>Active
                                                        </option>
                                                        <option value="0" @if ($blog->status == 0) selected @endif>Inactive
                                                        </option>
                                                        
                                                        
                                                    </select>

                                                    <div style='color:red; padding: 0 5px;'>
                                                        {{ $errors->has('service_status') ? $errors->first('service_status') : '' }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save
                                                    Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Edit Blog Modals --}}
<div class="modal fade" id="edit_blogmodal_{{$blog->id}}"
tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Blog
            </h5>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form
            action="{{ route('provider.blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" placeholder="Independent Controctor Name" name="title" value="{{ $blog->title }}">
                            <div style='color:red; padding: 0 5px;'>
                                {{ $errors->has('title') ? $errors->first('title') : '' }}
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Descriptions</label>
                            <textarea name="description" class="form-control summernote"
                                placeholder="Enter Your Description">
                                {!! $blog->description !!}
                            </textarea>
                            <div style='color:red; padding: 0 5px;'>
                                {{ $errors->has('description') ? $errors->first('description') : '' }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($blogcat as $data)
                                <option value="{{$data->id}}" @if($data->id == $blog->category_id) selected @endif>{{$data->category_name}}</option>
                                @endforeach
                            </select>
                            <div style='color:red; padding: 0 5px;'>
                                {{ $errors->has('description') ? $errors->first('description') : '' }}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label"> Image</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{ asset($blog->image) }}">
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
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                            <div style='color:red; padding: 0 5px;'>
                                {{ $errors->has('status') ? $errors->first('status') : '' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save
                    Changes</button>
            </div>
        </form>
    </div>
</div>
</div>
                            @endforeach


                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

{{-- Add Category Modals --}}
<div class="modal fade" id="add_categorymodal"
    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form
                action="{{ route('provider.blog.category.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        
                        <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name">

                        <div style='color:red; padding: 0 5px;'>
                            {{ $errors->has('category_name') ? $errors->first('category_name') : '' }}
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Add Blog Modals --}}
<div class="modal fade" id="add_blogmodal"
    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Blog
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form
                action="{{ route('provider.blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" placeholder="Independent Controctor Name" name="title" value="{{ old('title') }}">
                                <div style='color:red; padding: 0 5px;'>
                                    {{ $errors->has('title') ? $errors->first('title') : '' }}
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Descriptions</label>
                                <textarea name="description" class="form-control summernote"
                                    placeholder="Enter Your Description"></textarea>
                                <div style='color:red; padding: 0 5px;'>
                                    {{ $errors->has('description') ? $errors->first('description') : '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($blogcat as $data)
                                    <option>Select a Category</option>
                                    <option value="{{$data->id}}">{{$data->category_name}}</option>
                                    @endforeach
                                </select>
                                <div style='color:red; padding: 0 5px;'>
                                    {{ $errors->has('description') ? $errors->first('description') : '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                                <div style='color:red; padding: 0 5px;'>
                                    {{ $errors->has('status') ? $errors->first('status') : '' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

