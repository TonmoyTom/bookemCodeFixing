@extends('dashboard.layouts.master')
@section('title', 'Create Service')
@section('udcontent')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Create Service
                                <span class="d-block text-muted pt-2 font-size-sm">Create your Service here</span>
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
                        <form action="{{ route('user.service.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Service Name</label>
                                        <input type="text" class="form-control" placeholder="Service name" name="name"
                                            value="{{ old('name') }}">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Regular Price</label>
                                        <input type="number" name="selling_price" value="{{ old('selling_price') }}"
                                            id="selling_price" class="form-control" placeholder="Enter selling price">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('selling_price') ? $errors->first('selling_price') : '' }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Discount Type</label>
                                        <select name=" discount_type" id="discount_type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="1">U.S Dollar($)</option>
                                            <option value="2">Percentage (%)</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('discount_type') ? $errors->first('discount_type') : '' }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Discount</label>
                                        <input type="number" name="discount" id="discount" value="0" min="0"
                                            class="form-control" placeholder="Enter Discount">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('discount') ? $errors->first('discount') : '' }}</div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Discount Price</label>
                                        <input type="number" name="discount_price" value="0" id="discount_price"
                                            class="form-control" placeholder="Discount Price" readonly>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('discount_price') ? $errors->first('discount_price') : '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Active Price</label>
                                        <select name="price_active" id="" class="form-control">
                                            <option value="1">Sell Price</option>
                                            <option value="2"> Discount Price</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('price_active') ? $errors->first('price_active') : '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Price Status</label>
                                        <select name="price_status" id="" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="2">Upcoming</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('price_status') ? $errors->first('price_status') : '' }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Service Duration</label>
                                        <input name="service_min" class="form-control html-duration-picker"
                                             id="service_min" placeholder="Service Duration">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('service_min') ? $errors->first('service_min') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Setup Duration</label>
                                        <input name="service_min_setup" class="form-control html-duration-picker"
                                            id="service_min_setup" placeholder="Setup Duration">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('service_min') ? $errors->first('service_min') : '' }}</div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="summernote" name="description">{{ old('description') }}</textarea>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('description') ? $errors->first('description') : '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="">Default Image</label>
                                                <input id="defaultImage" type="file" name="default_image"
                                                    class="form-control">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('default_image') ? $errors->first('default_image') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;"
                                                    id="showDefaultImage"
                                                    src="{{ asset('defaults/noimage/no_img.jpg') }}" alt="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Sub Images</label>
                                        <input type="file" name="service_image[]" class="form-control" multiple>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('service_image') ? $errors->first('service_image') : '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Seo Keyword</label>
                                        <textarea class="form-control" name="seo_keyword">{{ old('seo_keyword') }}</textarea>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('seo_keyword') ? $errors->first('seo_keyword') : '' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Seo Description</label>
                                        <textarea class="form-control" name="seo_description">{{ old('seo_description') }}</textarea>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('seo_description') ? $errors->first('seo_description') : '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0"> Inactive</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('status') ? $errors->first('status') : '' }}</div>
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
    <script src="https://cdn.jsdelivr.net/npm/html-duration-picker@latest/dist/html-duration-picker.min.js"></script>

    <script>
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    type: "Get",
                    url: "{{ url('/get/subcategory/') }}/" + category_id,
                    dataType: "json",
                    success: function(data) {
                        var html = '<option value="">Select Subcategory</option>';
                        $.each(data, function(key, val) {
                            html += '<option value="' + val.id + '">' + val
                                .subcategory_name + '</option>';
                        });
                        $('#subcategory_id').html(html);
                    },

                });
            });
        });
    </script>

    <script>
        $(function() {
            $(document).on('change', '#subcategory_id', function() {
                var subcategory_id = $(this).val();
                $.ajax({
                    type: "Get",
                    url: "{{ url('/get/childcategory/') }}/" + subcategory_id,
                    dataType: "json",
                    success: function(data) {
                        var html = '<option value="">Select Childcategory</option>';
                        $.each(data, function(key, val) {
                            html += '<option value="' + val.id + '">' + val
                                .childcategory_name + '</option>';
                        });
                        $('#childcategory_id').html(html);
                    },

                });
            });
        });
    </script>



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
