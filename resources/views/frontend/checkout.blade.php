@extends('frontend.layouts.master')
@section('title', 'Checkout')
@section('content')

    <input type="hidden" id="cartCheck" value="{{ Cart::count() }}">


@section('customcss')
    {{-- full calender --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

@endsection


<form action="{{ route('user.payment.method') }}" method="post" id="my-forms">
    @csrf
    <input type="hidden" name="toDate" id="toDate" value="">
    <input type="hidden" name="travel_fee" id="trvls" value="0">
    <input type="hidden" name="current_lat" id="current_lat" value="0">
    <input type="hidden" name="current_lon" id="current_lon" value="0">
    <div class="subscribe-box pb-5 my-5">
        <div class="subs-header">
            <div class="subs-month-area">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="subs-middle text-center pt-4">
                            <h5>CONFIRM DETAILS</h5>
                            <p class="subs-md-title">Select date, time, payment method & confirm details</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .radio-toolbar-picktime label {
                display: inline-block;
                background-color: #e6e6e6;
                padding: 10px 10px;
                font-size: 14px;
                font-weight: 600;
                border-radius: 8px;
                margin: 0 5px;
                color: #000;
                margin-bottom: 10px;
                width: 100%;
                cursor: pointer;
            }

            .radio-toolbar-picktime input[type="checkbox"]:checked+label {
                background-color: #333 !important;
                border: none !important;
                color: #fff !important;
            }

            .booked-time {
                border-color: #dc3545 !important;
            }

        </style>
        <div class="subs-body mt-3">
            <div class="subs-payment">
                <div class="subs-step">
                    <p class="mb-2">STEP 1. PICK DATE</p>
                    <small style="font-weight: 600;">Select Date</small>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="calendar"></div>
                    </div>
                </div>

                <div class="subs-payment">
                    <div class="subs-step">
                        <p class="mb-2">STEP 2. PICK TIME</p>
                        <small style="font-weight: 600;">Select Time</small>
                    </div>
                    <div class="radio-toolbar-size radio-toolbar-picktime mt-3 mb-4 text-center checkoutCart">

                    </div>

                </div>

            </div>
            <hr>
            <div class="subs-payment">
                <div class="subs-step">
                    <p class="mb-2">STEP 3. PAYMENT METHOD</p>
                    <small style="font-weight: 600;">Select Payment Method</small>
                </div>
                <div class="radio-toolbar-size mt-3 mb-4 text-center">

                    <input type="radio" id="size" name="payment_type" value="Stripe" checked>
                    <label for="size">CARD PAYMENT</label>

                    {{-- <input type="radio" id="size2" name="payment_type" data-id value="Heartland">
                    <label for="size2">HEARTLAND</label> --}}

                    {{-- <input type="radio" id="size3" name="payment_type" data-id value="Hand Cash">
                    <label for="size3">HAND CASH</label> --}}


                </div>

            </div>
            <hr>

            <div class="subs-shipping">
                <div class="subs-step">
                    <p class="mb-2">YOUR ADDRESS</p><small>Enter your
                        address</small>
                </div>
                <div class="subs-shipping-form">
                    <div class="row">
                        @if ($provider->service_location == 1)
                            <div class="col">
                                <p class="text-center">You can't pick an address. Because this vendor works in its
                                    own place</p>
                            </div>
                        @else
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input
                                        class="form-control map-input mb-2 {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                        type="text" name="address" id="address" value="{{ old('address') }}"
                                        placeholder="Enter your address">

                                    <input type="hidden" name="latitude" id="address-latitude"
                                        value="{{ old('latitude') ?? '0' }}" />
                                    <input type="hidden" name="longitude" id="address-longitude"
                                        value="{{ old('longitude') ?? '0' }}" />

                                    <div id="address-map-container" class="mb-2"
                                        style="width:100%;height:200px;">
                                        <div style="width: 100%; height: 100%" id="address-map"></div>
                                    </div>
                                    <div class="form-control">
                                        <input value="1" id="current_loc" type="checkbox" class="" name="current_location"> <label
                                            for="current_loc">Use Current Location</label>
                                    </div>

                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('address') ? $errors->first('address') : '' }}</div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="subs-review">
                <div class="subs-step">
                    <p class="mb-3">STEP 4. REVIEW AND SUBMIT</p>
                    <small style="font-weight: 600; width: 70%; margin: 0  auto; display: block">Review your
                        service and submit your order</small>
                </div>

                <div class="subs-review-table">
                    @php
                        if (Session::has('promocode')) {
                            $promocode_name = Session::get('promocode')['name'];
                            $promocode_discount = Session::get('promocode')['discount'];
                        } else {
                            $promocode_name = '';
                            $promocode_discount = 0;
                        }
                    @endphp
                </div>
                <div class="loadReview">
                </div>
            </div>

            <div class="subs-button text-center mt-5 mb-3">
                <button type="submit" id="#paysub">Proceed to Payment </button>
            </div>
        </div>

    </div>
</form>



<div class="modal fade" id="couponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Appy Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <input type="text" id="couponCode" class="form-control" placeholder="Enter code">
                    <div class="input-group-append">
                        <button type="button" id="applyCoupon" class="btn btn-dark">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- full calender --}}
@section('customjs')

    <script>
        let count;

        function newfunc() {
            count = setInterval(function() {

                var lat = $('#address-latitude').val();
                var long = $('#address-longitude').val();

                $.ajax({
                    url: "{{ url('/get/distance') }}",
                    method: "GET",
                    dataType: "JSON",
                    data: {
                        lat: lat,
                        long: long,
                    },
                    // beforeSend: function() {
                    //     $(".ajaxloading").fadeIn();
                    // },
                    success: function(data) {
                        $("#trvl").html(data);
                        $("#trvls").val(data);
                    },
                    // complete: function() {
                    //     $(".ajaxloading").fadeOut();
                    // },
                });

            }, 1500);
        }
        newfunc();
    </script>






    {{-- maps --}}
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key')}}&libraries=places&callback=initialize&language=en&region=GB"
        async defer></script>
    <script src="/js/mapInput.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>




    <script>
        //Load checkout cart
        function loadCheckoutCart() {
            $.ajax({
                url: "{{ url('/load/checkout/cart') }}",
                success: function(data) {
                    $('.checkoutCart').html(data);
                }
            })
        }
        loadCheckoutCart();
    </script>

    <script>
        //Cart check
        function cartCheck() {
            var count = $('#cartCheck').val();
            if (count == 0) {
                window.location.href = "/";
            }
        }
        cartCheck();
    </script>

    <!--Cart Delete-->
    <script>
        $(document).on('click', '.cartdelete', function(e) {

            e.preventDefault();
            var id = $(this).attr('id');

            $.ajax({
                url: "{{ url('cart/delete') }}/" + id,
                method: "GET",
                dataType: "JSON",
                type: "DELETE",

                success: function(data) {
                    if (data == 0) {
                        window.location.href = "/";
                    }
                    cartCheck();
                    loadFixCart();
                    loadCheckRev();
                    if ($.isEmptyObject(data.error)) {
                        toastr.success(data.success, 'Success', {
                            timeOut: 3000
                        });
                    } else {
                        toastr.error(data.error, {
                            timeOut: 3000
                        });
                    }
                },
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            var SITEURL = "{{ url('/') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: SITEURL + "/fullcalender",
                displayEventTime: false,
                selectable: true,
                selectHelper: true,
                defaultView: 'month',
                selectConstraint: {
                    start: $.fullCalendar.moment().subtract(1, 'days'),
                    end: $.fullCalendar.moment().startOf('days').add(30, 'days')
                },
                header: {
                    left: 'title',
                    right: 'prev,next today'
                },
                dayClick: function(date, jsEvent, view) {
                    var day = date.day(); // number 0-6 with Sunday as 0 and Saturday as 6

                },
                select: function(start, end, allDay) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD");

                    // var d = new Date(start);
                    // var day = d.getDay();
                    // alert(day);

                    $('#toDate').val(start);
                    $.ajax({
                        url: "{{ url('/checkout/ajax') }}/",
                        method: "GET",
                        dataType: "JSON",
                        data: {
                            start: start
                        },
                        beforeSend: function() {
                            $(".ajaxloading").fadeIn();
                        },
                        success: function(data) {
                            $('.checkoutCart').html(data);

                        },
                        complete: function() {
                            $(".ajaxloading").fadeOut();
                        },
                    });

                },
                selectAllow: function(event) {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1,
                        'second').utcOffset(false), 'day');
                }

            });

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }

    </script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
    <script type="text/javascript">
        $('#my-forms').submit(function(event) {
            event.preventDefault();

            if ($('#toDate').val() == '') {
                toastr.error('', 'Please select date!', {
                    timeOut: 3000
                });
                return false;
            }

            if (!$("input[name='date_time']:checked").val()) {
                toastr.error('', 'Please select time!', {
                    timeOut: 3000
                });
                return false;
            }
            $(this).unbind('submit').submit();
        })
    </script>

    <script>
        $(document).ready(function() {

            $("#current_loc").click(function() {
                if ($(this).is(":checked")) {
                    clearInterval(count);

                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        alert('Not Found!');
                    }

                    function showPosition(position) {

                        var lat = position.coords.latitude;
                        var lon = position.coords.longitude;

                        $('#current_lat').val(lat);
                        $('#current_lon').val(lon);

                        $.ajax({
                        url: "{{ url('/get/current/location') }}",
                        method: "GET",
                        dataType: "JSON",
                        data: {
                            lat:lat,
                            lon:lon
                        },
                        // beforeSend: function() {
                        //     $(".ajaxloading").fadeIn();
                        // },
                        success: function(data) {
                            $("#address").html(data);
                            $("#trvl").html(data);
                            $("#trvls").val(data);
                        },
                        // complete: function() {
                        //     $(".ajaxloading").fadeOut();
                        // },
                    });
                    }
                } else {
                    newfunc();
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $("#date_time").click(function() {

                console.log('hello');
            });

        });

    </script>



@endsection
@endsection
