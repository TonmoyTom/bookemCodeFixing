@extends('backend.layouts.master')
@section('title','Edit Brand')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('brand.index')}}">Brands</a></li>
        <li class="breadcrumb-item active">Edit Brands</li>
    </ol>
    <h1 class="page-header">Brands</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Edit Brands</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('brand.index') }}" class="btn btn-info btn-xs mr-2"><i class="fa fa-tags"></i> Brands</a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{route('brand.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Brand Name</label>
                                    <input type="text" name="brand_name" value="{{$data->brand_name}}" placeholder="Brand name" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('brand_name'))?($errors->first('brand_name')):''}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="">Brand Logo</label>
                                    <input id="noImage" type="file" name="brand_logo" class="form-control">
                                    <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="@if($data->brand_logo){{asset($data->brand_logo)}}@else{{asset('defaults/noimage/no_img.jpg')}}@endif" alt="image">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('brand_logo'))?($errors->first('brand_logo')):''}}</div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection