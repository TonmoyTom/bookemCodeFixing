@extends('backend.layouts.master')
@section('title', 'Edit Plan')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Plan</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Plan</a>
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
                            <h3 class="card-label">Edit Plan
                                <span class="d-block text-muted pt-2 font-size-sm">edit your Plan here</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('plan.index')}}" class="btn btn-primary btn-sm font-weight-bolder">
                                < Back</a>
                                    <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('plan.update',$data->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Plan Name</label>
                                        <input type="text" class="form-control" placeholder="Plan name" name="name"
                                            value="{{ $data->name}}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="number" name="price" value="{{ $data->price}}"
                                            id="price" class="form-control" placeholder="Enter price">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('selling_price') ? $errors->first('selling_price') : '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Stripe Plan</label>
                                        <input type="text" class="form-control" placeholder="Stripe plan" name="stripe_plan_id"
                                        value="{{ $data->stripe_plan_id}}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('stripe_plan_id') ? $errors->first('stripe_plan_id') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">About Plan</label>
                                        <input type="text" class="form-control" placeholder="About plan" name="about"
                                        value="{{ $data->about}}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('about') ? $errors->first('about') : '' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <label for="">Billing Period</label>
                                                <input min="1" type="number" name="billing_period"
                                                value="{{ $data->billing_period}}" id="validity"
                                                    class="form-control" placeholder="1, 2, 3, 4, 5">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('billing_period') ? $errors->first('billing_period') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 align-self-end pl-0">
                                            <div class="form-group">
                                                <label for=""></label>
                                                <select required name="billing_period_type" class="custom-select">
                                                    <option value="Days" @if ($data->billing_period_type == "Days")  selected @endif>Days</option>
                                                    <option value="Weeks" @if ($data->billing_period_type == "Weeks")  selected @endif>Weeks</option>
                                                    <option value="Months" @if ($data->billing_period_type == "Months")  selected @endif>Months</option>
                                                    <option value="Years" @if ($data->billing_period_type == "Years")  selected @endif>Years</option>
                                                </select>
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('billing_period_type') ? $errors->first('billing_period_type') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                        <label>Access features</label>
                                            <select class="form-control myselect2" multiple name="feature[]">
                                                @foreach($featureData as $feature)
                                                <option value="{{$feature->id}}"  @if (@in_array(['feature_id' => $feature->id], $selectFeature)) selected @endif >{{$feature->name}}</option>
                                                @endforeach
                                            </select>
                                </div>

                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('feature') ? $errors->first('feature') : '' }}
                                    </div>
                                     <!-- <div class="form-group">
                                        <label>Access Features</label>
                                        <input id="kt_tagify_1" class="form-control tagify" name='access_list' placeholder='type...' value='' autofocus="" />
                                            <div class="mt-3">
                                                <a href="javascript:;" id="kt_tagify_1_remove" class="btn btn-sm btn-light-primary font-weight-bold">Remove pricing list</a>
                                            </div>
                                    </div> -->
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

<script>
        $(".myselect2").select2({

        });
    </script>

@endsection
@endsection
