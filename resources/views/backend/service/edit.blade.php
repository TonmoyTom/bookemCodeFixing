@extends('backend.layouts.master')
@section('title','Edit Service')
@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Service</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Service</a>
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
            <div class="container-fluid">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Edit Service
                                <span class="d-block text-muted pt-2 font-size-sm">Edit your Service here</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm font-weight-bolder"> < Back</a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('service.update',$service->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Providers</label>
                                        <select class="form-control myselect2" name="provider_id" id="provider_id">
                                            <option value="">Select Provider</option>
                                            @foreach ($providers as $provider)
                                                <option value="{{ $provider->id }}" @if( $provider->id == $service->provider_id ) selected @endif > {{ $provider->business_name }}</option>
                                            @endforeach
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Service Name</label>
                                        <input type="text" class="form-control" placeholder="Service name"
                                            name="name" value="{{$service->name }}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Regular Price</label>
                                        <input type="number" name="selling_price" value="{{$service->selling_price}}" id="selling_price" class="form-control" placeholder="Enter regular price">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('selling_price'))?($errors->first('selling_price')):''}}</div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Discount Type</label>
                                        <select name=" discount_type" id="discount_type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="1" @if($service->discount_type == 1) selected @endif >U.S Dollar($)</option>
                                            <option value="2" @if($service->discount_type == 2) selected @endif >Percentage (%)</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('discount_type'))?($errors->first('discount_type')):''}}</div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Discount</label>
                                        <input type="number" name="discount" id="discount" value="{{$service->discount}}" class="form-control" min="0" placeholder="Enter Discount">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('discount'))?($errors->first('discount')):''}}</div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Discount Price</label>
                                        <input type="number" name="discount_price" value="{{$service->discount_price}}" id="discount_price" class="form-control" placeholder="Discount Price" readonly>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('discount_price'))?($errors->first('discount_price')):''}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                    <label for="">Active Price</label>
                                        <select name="price_active" id="" class="form-control">
                                            <option value="1" @if($service->price_active == 1) selected @endif >Sell Price</option>
                                            <option value="2" @if($service->price_active == 2) selected @endif > Discount Price</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('price_active'))?($errors->first('price_active')):''}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Price Status</label>
                                        <select name="price_status" id="" class="form-control">
                                            <option value="1" @if($service->price_status == 1) selected @endif >Active</option>
                                            <option value="2" @if($service->price_status == 2) selected @endif >Upcoming</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('price_status'))?($errors->first('price_status')):''}}</div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-6">
                                <label for="">Service Duration</label>
                                <div class="form-group">

                                        <select name="service_hour" id="" class="form-control">
                                            <option value="0">Select Hours</option>
                                            <option value="1" @if($service->service_hour==1) selected @endif>1 h</option>
                                            <option value="2"  @if($service->service_hour==2) selected @endif >2 h</option>
                                            <option value="3"  @if($service->service_hour==3) selected @endif>3 h</option>
                                            <option value="4"  @if($service->service_hour==4) selected @endif>4 h</option>
                                            <option value="5"  @if($service->service_hour==5) selected @endif>5 h</option>
                                            <option value="6"  @if($service->service_hour==6) selected @endif>6 h</option>
                                            <option value="7"  @if($service->service_hour==7) selected @endif>7 h</option>
                                            <option value="8"  @if($service->service_hour==8) selected @endif>8 h</option>
                                            <option value="9"  @if($service->service_hour==9) selected @endif>9 h</option>
                                            <option value="10"  @if($service->service_hour==10) selected @endif>10 h</option>
                                            <option value="11"  @if($service->service_hour==11) selected @endif>11 h</option>
                                            <option value="12"  @if($service->service_hour==12) selected @endif>12 h</option>
                                            <option value="13"  @if($service->service_hour==13) selected @endif>13 h</option>
                                            <option value="14"  @if($service->service_hour==14) selected @endif>14 h</option>
                                            <option value="15"  @if($service->service_hour==15) selected @endif>15 h</option>
                                            <option value="16"  @if($service->service_hour==16) selected @endif>16 h</option>
                                            <option value="17"  @if($service->service_hour==17) selected @endif>17 h</option>
                                            <option value="18"  @if($service->service_hour==18) selected @endif>18 h</option>
                                            <option value="19"  @if($service->service_hour==19) selected @endif>19 h</option>
                                            <option value="20"  @if($service->service_hour==20) selected @endif>20 h</option>
                                            <option value="21"  @if($service->service_hour==21) selected @endif>21 h</option>
                                            <option value="22"  @if($service->service_hour==22) selected @endif>22 h</option>
                                            <option value="23"  @if($service->service_hour==23) selected @endif>23 h</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('service_hour') ? $errors->first('service_hour') : '' }}
                                        </div>
                                    </div>
                                <div class="form-group">

                                        <select name="service_min" id="" class="form-control">
                                            <option value="0">Select Minute</option>
                                            <option value="5"  @if($service->service_min==5) selected @endif>5 min</option>
                                            <option value="10"  @if($service->service_min==10) selected @endif>10 min</option>
                                            <option value="15"  @if($service->service_min==15) selected @endif>15 min</option>
                                            <option value="20"  @if($service->service_min==20) selected @endif>20 min</option>
                                            <option value="25"  @if($service->service_min==25) selected @endif>25 min</option>
                                            <option value="30"  @if($service->service_min==30) selected @endif>30 min</option>
                                            <option value="35"  @if($service->service_min==35) selected @endif>35 min</option>
                                            <option value="40"  @if($service->service_min==40) selected @endif>40 min</option>
                                            <option value="45"  @if($service->service_min==45) selected @endif>45 min</option>
                                            <option value="50"  @if($service->service_min==50) selected @endif>50 min</option>
                                            <option value="55"  @if($service->service_min==55) selected @endif>55 min</option>

                                        </select>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('service_min') ? $errors->first('service_min') : '' }}
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="summernote" name="description">{{$service->description}}</textarea>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('description'))?($errors->first('description')):''}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Default Image</label>
                                        <input id="defaultImage" type="file" name="default_image" class="form-control">
                                        <img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100px;" id="showDefaultImage" src="@if(!empty($service->default_image)) {{asset($service->default_image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="image">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('default_image'))?($errors->first('default_image')):''}}</div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Sub Images</label>
                                        <input type="file" name="service_image[]" class="form-control" multiple>
                                        <div class="row">
                                            @foreach($serviceImages as $serviceImage)
                                            <div class="col-md-2">
                                                <img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100%;" id="showSubImage1" src="@if(!empty($serviceImage->service_image)) {{asset($serviceImage->service_image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="image">
                                                <a href="{{route('service.remove.image',$serviceImage->id)}}">Remove</a>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('service_image'))?($errors->first('service_image')):''}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Seo Keyword</label>
                                        <textarea class="form-control" name="seo_keyword">{{$service->seo_keyword}}</textarea>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('seo_keyword'))?($errors->first('seo_keyword')):''}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Seo Description</label>
                                        <textarea class="form-control" name="seo_description">{{$service->seo_description}}</textarea>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('seo_description'))?($errors->first('seo_description')):''}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1" @if($service->status == 1 ) selected @endif >Active</option>
                                            <option value="0" @if($service->status == 0 ) selected @endif> Inactive</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('status'))?($errors->first('status')):''}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-success">
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

    <script>
        function offer() {
            var selling_price = $('#selling_price').val();
            var discount_type = $('#discount_type').val();
            var discount = $('#discount').val();

            if (discount_type == 1) {
                var discount_price = selling_price - discount;
            } else if (discount_type == 2) {
                var price_cal = ((selling_price * discount) / 100);
                var discount_price = selling_price - price_cal;
            } else {
                var discount_price = 0;
            }

            if (!isNaN(discount_price)) {
                $('#discount_price').val(discount_price);
            }
        }

        $('#selling_price, #discount_type, #discount, #discount_price').on('keyup change', function() {
            offer();
        });
    </script>

@endsection
@endsection

