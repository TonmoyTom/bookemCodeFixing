@extends('dashboard.layouts.master')
@section('title','Coupon')
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
                        <h3 class="card-label" id="singleServiceText" style="display: block">Single Coupon List
                        </h3>
                        <h3 class="card-label" id="multipleServiceText" style="display: none">Multiple Coupon List
                        </h3>
                    </div>
                    <div class="checkBoxStyle" style="display: flex;">
                        <div class="custom-control custom-radio radioBox" style="margin-right:10px">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input"
                                onclick="show1()" checked>
                            <label class="custom-control-label" for="customRadio1">Single Service Coupon</label>
                        </div>
                        <div class="custom-control custom-radio radioBox">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input"
                                onclick="show2()">
                            <label class="custom-control-label" for="customRadio2"> Coupon for All Services</label>
                        </div>
                    </div>
                    <div class="card-toolbar">

                        <a href="{{ route('provider.cupon.create') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>New Coupon</a>
                        <!--end::Button-->
                    </div>

                </div>
                <div class="card-body table-responsive" id="singleService" style="display: block">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Serive Name</th>
                                <th>Cupon Name</th>
                                <th>Cupon Code</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Total Price</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->service->name}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->promocode}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{$row->percetange_price}}</td>
                                <td>{{$row->total_price}}</td>
                                <td>{{$row->start_date}}</td>
                                <td>{{$row->end_date}}</td>


                                <td>
                                    @if($row->status == 1)
                                    <button href="#" class="btn label label-lg label-light-success label-inline"> Active</button>
                                    @elseif($row->status == 0)
                                    <button  class="btn label label-lg label-light-danger label-inline"> Inactive</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editmodal_{{$row->id}}" class="btn btn-icon btn-clean"><i class="la la-edit"></i></a>

                                    @php
                                    $check1 = 0;

                                    $check2 = 0;
                                    @endphp

                                    @if( $check1 > 0 || $check2 > 0)
                                    <button type="button" class="btn btn-icon btn-clean delcheck"><i class="la la-trash"></i></button>
                                    @else
                                    <a id="delete" href="{{route('provider.cupon.destroy',$row->id)}}" class="btn btn-icon btn-clean"><i class="la la-trash"></i></a>
                                    @endif

                                </td>
                            </tr>

                            <!--Row Status -->
                            <div class="modal fade" id="row_status_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('provider.cupon.status', $row->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="1" @if( $row->status == 1 ) selected @endif >Active</option>
                                                        <option value="2" @if( $row->status == 0 ) selected @endif >Inactive</option>
                                                    </select>

                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('status'))?($errors->first('status')):''}}</div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editmodal_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Cupon</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('provider.cupon.update',$row->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Cupon Name</label>
                                                    <input type="text" name="name" value="{{$row->name}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Cupon Code</label>
                                                    <input type="text" name="promocode" value="{{$row->promocode}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('promocode'))?($errors->first('promocode')):''}}</div>
                                                </div>


                                                    <div class="form-group">
                                                        <label for="">Price</label>
                                                        <input type="number" name="price" id="price" readonly
                                                            placeholder="Enter Discount on Cupon" class="form-control" value="{{$row->price}}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('price') ? $errors->first('price') : '' }}</div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="">Percetange</label>
                                                        <input type="text" name="percetange" id="pecentange"
                                                            placeholder="Enter Discount on Cupon" class="form-control" value="{{$row->percetange}}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('discount') ? $errors->first('discount') : '' }}</div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="">Percetange Price</label>
                                                        <input type="text" name="percetange_price" id="pecentangePrice"
                                                            placeholder="Enter Discount on Cupon" class="form-control" value="{{$row->percetange_price}}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('discount') ? $errors->first('discount') : '' }}</div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="">Total Price</label>
                                                        <input type="text" name="total_price" id="totalPrice"
                                                            placeholder="Enter Discount on Cupon" class="form-control" value="{{$row->total_price}}">
                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('price') ? $errors->first('discount') : '' }}</div>
                                                    </div>
                                                <div class="form-group">
                                                    <label for="">start Date</label>
                                                    <input type="date" name="start_date" class="form-control" value="{{$row->start_date}}">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('start_date'))?($errors->first('start_date')):''}}</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">End Date</label>
                                                    <input type="date" name="end_date" value="{{$row->end_date}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('end_date'))?($errors->first('end_date')):''}}</div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
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
                <div class="card-body table-responsive"  id="multipleService" style="display: none">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Cupon Description</th>
                                <th>Cupon Name</th>
                                <th>Cupon Code</th>
                                <th>Percentage</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($multiples as $multiple)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>ALl Service Apply For Cupon Code </td>
                                <td>{{$multiple->name}}</td>

                                <td>{{$multiple->promocode}}</td>
                                <td>{{$multiple->percentage}}</td>
                                <td>
                                    @if($multiple->status == 1)
                                    <button href="#" class="btn label label-lg label-light-success label-inline"> Active</button>
                                    @elseif($multiple->status == 0)
                                    <button href="#" class="btn label label-lg label-light-danger label-inline" > Inactive</button>
                                    @endif
                                </td>
                                <td>{{$multiple->start_date}}</td>
                                <td>{{$multiple->end_date}}</td>
                                <td>
                                    <a href="{{route('cuppon.multiple.edit' , $multiple->id)}}"  class="btn btn-icon btn-clean"><i class="la la-edit"></i></a>
                                    <a  href="{{route('cuppon.multiple.delete',$multiple->id)}}" class="btn btn-icon btn-clean"><i class="la la-trash"></i></a>
                                </td>
                            </tr>
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
@section('customjs')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->


    <script>
        function show1() {
            $('#singleService').css("display","block")
            $('#multipleService').css("display","none")
            $('#singleServiceText').css("display","block")
            $('#multipleServiceText').css("display","none")
        }

        function show2() {
            $('#singleService').css("display","none")
            $('#multipleService').css("display","block")
            $('#singleServiceText').css("display","none")
            $('#multipleServiceText').css("display","block")
        }

    </script>
     <script>
        $('#serviceId').click(function() {
            let serviceId = this.value;
            console.log(serviceId);
            $.ajax({
                url: '{{ url('serviceid_coupon/') }}' + '/' + serviceId,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $("#price").val(response.selling_price);

                }
            })
        })

        var inputBox = document.getElementById('pecentange');
        var inputBoxPecentange = document.getElementById('pecentangePrice');
        var price = document.getElementById('price');
        var totalPriceBalnace = document.getElementById('totalPrice');

        inputBox.onkeyup = function() {
            percentage = inputBox.value / 100;
            totalAmount = price.value * percentage;
            totalPrice = totalAmount;
            $("#pecentangePrice").val(totalPrice);
            mainBalance = price.value - totalPrice;
            $("#totalPrice").val(mainBalance);
        }

        inputBoxPecentange.onkeyup = function() {

            if (inputBoxPecentange.value > price.value) {
                console.log(inputBox);
                inputBox.value = 0;
                $("#totalPrice").val(0)
            } else {
                calculatePercentange = (inputBoxPecentange.value / price.value) * 100
                percentageWithoutPrice = price.value - inputBoxPecentange.value
                $("#totalPrice").val(percentageWithoutPrice);
                $("#pecentange").val(Math.round(calculatePercentange));
            }
        }

        function show1() {
            $('#singleService').css("display","block")
            $('#multipleService').css("display","none")
        }

        function show2() {
            $('#singleService').css("display","none")
            $('#multipleService').css("display","block")
        }

    </script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62566a78876d5c3b"></script>
@endsection
@endsection
