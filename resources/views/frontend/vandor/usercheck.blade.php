@extends('frontend.layouts.master')
@section('content')
    {{-- new Design  --}}
    <section class="coupon">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 p-0 mb-4">
                    <div class="coupon__title subs-middle  pt-4">
                        <h1>Select Employee</h1>
                    </div>
                </div>
                <div class="col-xl-8 p-0">
                    <div class="row">
                        @forelse ($users as $user)
                            <div class="col-xl-4 mb-4">

                                @php
                                    $starSum = App\Models\CustomerReview::where('provider_id', $user->id)->sum('rating');

                                    $ratingCount = App\Models\CustomerReview::where('provider_id', $user->id)->count();

                                    if ($ratingCount != 0) {
                                        $ratingAvg = round($starSum / $ratingCount, 1);
                                    } else {
                                        $ratingAvg = 0;
                                    }

                                    $allServiceCupon = App\AllServiceCupon::where(['user_id' => $vendorId])->first();
                                    $coupon = App\Models\Promocode::where(['user_id' => $vendorId, 'created_by' => $id, 'status' => 1])->first();
                                @endphp
                                <div class="coupon__card" id="active_class{{ $user->id }}" style="">

                                        <input type="hidden" id="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="vendorId" id="vendorId" value="{{ $vendorId }}">

                                        <input type="hidden" name="service_id" id="seviceId" value="{{ $id }}">
                                    <div class="coupon__user">
                                        <div class="coupon__icon">
                                            <img src="@if(!empty($user->business_logo)) {{ asset($user->business_logo) }} @else {{ asset('defaults/avatar/avatar.png') }} @endif" alt="">
                                        </div>
                                        <div class="coupon__name">
                                            <p>{{ ucfirst($user->name) }}</p>
                                            <span>{{ $ratingAvg }} Rating</span>
                                        </div>
                                    </div>
                                    <div class="coupon__code">
                                        <input type="text" id="couponInput{{ $user->id }}" class="form-control"
                                        placeholder="Coupon Code" style="display: none" value="">

                                        <div class="couponSubmit__btn">
                                            @if ( $coupon != null || $allServiceCupon != null)
                                                <a href="#" class="cupon" id="coupn{{ $user->id }}"
                                                    onclick="clickFunc({{ $user->id }})">Coupon</a>
                                                <a href="#" class="submit" id="saveC{{ $user->id }}" style="display: none"
                                                    onclick="clickSave({{ $user->id }})">Submit</a>
                                            @endif
                                            <a class="book"href="javascript:;" id="cartStore" data-id="{{ $user->id }}">Book</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h5 class="card-title">No User Found</h5>
                        @endforelse
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="coupon__card " style="height: 254px">
                        <div class="coupon__user">
                            <div class="coupon__name">
                                <p>Total Payment</p>
                            </div>
                        </div>
                        <div class="coupon__code" style="height: 78%;">
                            <ul>
                                {{-- Cupon --}}
                                <li><span>Coupon:</span> <span>$<span id="coupn">0</span></span></li>
                                <input type="hidden"  id="coupnInput" value="0">
                                {{-- Cupon --}}
                                {{-- Price --}}
                                <li><span>Price:</span> <span>$<span id="price">{{ $servicePrice->selling_price }}</span></span></li>
                                <input type="hidden"  id="priceInput" value="{{ $servicePrice->selling_price }}">
                                {{-- Price --}}
                            </ul>
                            <p><span>Total Price:</span> <span >$<span id="totalPrice">{{ $servicePrice->selling_price }}</span></span></p>
                            <input type="hidden"  id="totalPriceInput" value="{{ $servicePrice->selling_price }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Vandor profile -->





    @section('customjs')
        <!-- Go to www.addthis.com/dashboard to customize your tools -->


        <script>
            function clickFunc(id) {
                let inputV = document.getElementById(`couponInput${id}`);
                let couponBtn = document.getElementById(`coupn${id}`);
                let saveBtn = document.getElementById(`saveC${id}`);
                let activeCard = document.getElementById(`active_class${id}`);
                saveBtn.style.display = "block"
                couponBtn.style.display = "none"

                if (inputV.style.display === "block") inputV.style.display = "none"
                else inputV.style.display = "block"

                if(inputV.value != null){
                    activeCard.style.border ="1px solid #333333 ";
                }

            }


            function clickSave(id) {
                let inputV = document.getElementById(`couponInput${id}`);
                let couponBtn = document.getElementById(`coupn${id}`);
                let saveBtn = document.getElementById(`saveC${id}`);


                if (saveBtn.style.display === "block") {
                saveData(inputV.value)
                saveBtn.style.display = "none"
                couponBtn.style.display = "block"
                inputV.style.display = "none"
                inputV.style.display = "none"




                }

            }

            function saveData(data) {
                let vendorId = document.getElementById('vendorId');
                let serviceId = document.getElementById('seviceId');
                $.ajax({
                    url: '{{ url('all_service_user/') }}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'data': data,
                        'vendorId': vendorId.value,
                        'serviceId': serviceId.value,

                    },
                    success: function(response) {
                        // console.log(response);
                        $("#totalPrice").html(response.price);
                        $("#totalPriceInput").val(response.price);
                        $("#coupn").html(response.coupon_price);
                        $("#coupnInput").val(response.coupon_price);

                    },error:function(){
                        alert("coupon not found");
                    }
                })
            }

            // function cuponSet(id) {
            //     let inputV = document.getElementById(`couponInput${id}`);
            //     let vendorId = document.getElementById('vendorId');
            //     console.log('id', id)


            //     inputV.onkeyup = function() {


            //         $.ajax({
            //             type: 'post',
            //             url: '{{ url('all_service_user/') }}',
            //             data: {
            //                 coupon: inputV.value,
            //                 vendorId: vendorId,
            //             },
            //             success: function(resp) {
            //                 console.log('hello');
            //                 // if (resp == "false") {
            //                 //     $("#chkoldpwd").html("<font  > Current Password is InCorrect </font>").css({
            //                 //         "color": "red"
            //                 //     });
            //                 // } else if (resp == "true") {
            //                 //     $("#chkoldpwd").html("<font  > Current Password is Correct</font>").css({
            //                 //         "color": "green"
            //                 //     });
            //                 // }
            //             },
            //             // error: function() {
            //             //     alert("eroor");
            //             // }
            //         })
            //     }


            // }
        </script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62566a78876d5c3b"></script>
    @endsection
@endsection
