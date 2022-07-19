@extends('dashboard.layouts.master')
@section('title', 'Create Coupon')
@section('udcontent')
    <!--begin::Content-->

    <style type="text/css">
        /**
                     * The CSS shown here will not be introduced in the Quickstart guide, but shows
                     * how you can use CSS to style your Element's container.
                     */
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            width: 100%;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>

    <div class="modal fade" id="singleService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('provider.cupon.payment.confirm') }}" method="post" id="payment-form">
                    @csrf
                    <div class="modal-body">


                        <input type="hidden" name="name" id="payment_name" value="">
                        <input type="hidden" name="promocode" id="payment_promocode" value="">
                        <input type="hidden" name="price" id="payment_price" value="">
                        <input type="hidden" name="percetange" id="payment_percetange" value="">
                        <input type="hidden" name="percetange_price" id="payment_percetange_price" value="">
                        <input type="hidden" name="total_price" id="payment_total_price" value="">
                        <input type="hidden" name="start_date" id="payment_start_date" value="">
                        <input type="hidden" name="end_date" id="payment_end_date" value="">
                        <input type="hidden" name="service_id" id="payment_service_id" value="">
                        <input type="hidden" name="payment_type" id="payment_payment_type" value="">

                        <div class="subs-body mt-3">
                            <div class="subs-payment">
                                <div class="subs-step">
                                </div>

                                <div class="subs-payment-form">
                                    <div class="form-row">
                                        <label for="card-element">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Pay Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Create Coupon</h3>
                        </div>
                    </div>
                    <div class="checkBoxStyle d-flex align-items-center" style="padding: 12px 30px;">
                        <div class="custom-control custom-radio radioBox" style="margin-right:10px;">
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
                    <div class="card-body table-responsive" id="singleService" style="display: block">
                        <form action="{{ route('provider.cupon.payment') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-10">Single Service Coupon</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <select name="service_id" class="form-control" id="serviceId">
                                            <option value="">Select Service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Coupon Name</label>
                                        <input type="text" name="name" placeholder="Cupon name" id="coupon_name"
                                            class="form-control">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Cupon Code</label>
                                        <input type="text" name="promocode" placeholder="Cupon Code"
                                            class="form-control element" id="cuponCode" readonly>
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('promocode') ? $errors->first('promocode') : '' }}</div>
                                        <a id="generate" style="color: green ; cursor: pointer;">Generate
                                            <div class="lds-ellipsis" id="loading" style="display:none">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="number" name="price" id="price" readonly
                                            placeholder="Enter Discount on Cupon" class="form-control" value="">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('price') ? $errors->first('price') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Percetange</label>
                                        <input type="text" name="percetange" id="pecentange"
                                            placeholder="Enter Discount on Cupon" class="form-control">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('discount') ? $errors->first('discount') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Percetange Price</label>
                                        <input type="text" name="percetange_price" id="pecentangePrice"
                                            placeholder="Enter Discount on Cupon" class="form-control">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('discount') ? $errors->first('discount') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Total Price</label>
                                        <input type="text" name="total_price" id="totalPrice"
                                            placeholder="Enter Discount on Cupon" class="form-control">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('price') ? $errors->first('discount') : '' }}</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">start Date</label>
                                        <input type="date" name="start_date" placeholder="Start Date"
                                            class="form-control" id="start_date">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('start_date') ? $errors->first('start_date') : '' }}</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">End Date</label>
                                        <input type="date" name="end_date" id="end_date" placeholder="End Date"
                                            class="form-control">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('end_date') ? $errors->first('end_date') : '' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-10">Payment Information</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="radio" checked id="card_payment" name="payment_type"
                                            value="Card"><label for="card_payment"> Card Payment</label>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="radio" id="wallet_payment" name="payment_type"
                                            value="Wallet"><label for="wallet_payment"> Wallet Payment</label>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#singleService" onclick="singlePayment()">
                                            Next Step
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body table-responsive" id="multipleService" style="display: none">
                        <form action="{{ route('cuppon.multiple.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-10">Coupon for All Services</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Coupon Name</label>
                                        <input type="text" name="name" placeholder="Cupon name"
                                            class="form-control" id="coupon_name">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Cupon Code</label>
                                        <input type="text" name="promocode" readonly placeholder="Cupon Code"
                                            class="form-control" id="cuponCodeAll">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('promocode') ? $errors->first('promocode') : '' }}</div>
                                        <a id="generateAllCupon" style="color: green; cursor: pointer;">Generate
                                            <div class="lds-ellipsis" id="allloading" style="display:none">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Percetange</label>
                                        <input type="text" name="percentage" id="pecentange"
                                            placeholder="Enter Discount on Cupon" class="form-control">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('discount') ? $errors->first('discount') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Start Date</label>
                                        <input type="date" name="start_date" placeholder="Start Date"
                                            class="form-control">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('end_date') ? $errors->first('start_date') : '' }}</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">End Date</label>
                                        <input type="date" name="end_date" placeholder="End Date"
                                            class="form-control">
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('end_date') ? $errors->first('end_date') : '' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-10">Payment Information</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="radio" checked id="card_payment" name="payment_type"
                                            value="Card Payment"><label for="card_payment"> Card Payment</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="radio" id="wallet_payment" name="payment_type"
                                            value="Wallet Payment"><label for="wallet_payment"> Wallet Payment</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Next Step</button>
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
    <!-- Go to www.addthis.com/dashboard to customize your tools -->

    <script src="https://js.stripe.com/v3/"></script>

    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe(
            'pk_test_51KWd2wJCIneuWHgBazlKAJXhYhvJCIaVQYewXGdvA9vhcgePcINLVGtl6TMiwHBC4sVAELmdjzCiu2hQBmoSFriT00ppOQpEbC'
            );
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>

    <script>
        function singlePayment() {
            let coupopn_name = $('#coupon_name').val();
            let serviceId = $('#serviceId').val();
            let cuponCode = $('#cuponCode').val();
            let price = $('#price').val();
            let pecentange = $('#pecentange').val();
            let pecentangePrice = $('#pecentangePrice').val();
            let totalPrice = $('#totalPrice').val();
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();



            // Set Data
            $('#payment_name').val(coupopn_name);
            $('#payment_service_id').val(serviceId);
            $('#payment_promocode').val(cuponCode);
            $('#payment_price').val(price);
            $('#payment_percetange').val(pecentange);
            $('#payment_percetange_price').val(pecentangePrice);
            $('#payment_total_price').val(totalPrice);
            $('#payment_start_date').val(start_date);
            $('#payment_end_date').val(end_date);
        }
    </script>
    <script>
        let loading = false;
        let allloading = false;
        let timeout = false;

        $('#loading').css('display', 'none');
        $('#generate').click(function() {
            let hello = document.getElementById('cuponCode');
            console.log(hello)
            loading = true;
            loading = true ? $('#loading').css('display', 'inline-block') : $('#loading').css('display', 'none');
            $.ajax({
                url: '{{ url('generate_code/') }}',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    setTimeout(() => {
                        loading = false;
                        timeout = true
                        $('#loading').css('display', 'none');
                        $('#cuponCode').val(response);

                    }, 1000);

                }
            })
        })

        $('#generateAllCupon').click(function() {
            allloading = true;
            console.log(allloading);
            allloading = true ? $('#allloading').css('display', 'inline-block') : $('#allloading').css('display',
                'none');
            $.ajax({
                url: '{{ url('generate_code/') }}',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    setTimeout(() => {
                        loading = false;
                        $('#allloading').css('display', 'none');
                        $('#cuponCodeAll').val(response);
                    }, 1000);
                }
            })
        })


        $('#serviceId').click(function() {
            let serviceId = this.value;
            console.log(serviceId);
            $.ajax({
                url: '{{ url('serviceid_coupon/') }}' + '/' + serviceId,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $("#price").val(response.selling_price.toFixed(2));

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
            $("#totalPrice").val(mainBalance.toFixed(2));
        }

        inputBoxPecentange.onkeyup = function() {

            if (inputBoxPecentange.value > price.value) {
                console.log(inputBox);
                inputBox.value = 0;
                $("#totalPrice").val(0)
            } else {
                calculatePercentange = (inputBoxPecentange.value / price.value) * 100
                percentageWithoutPrice = price.value - inputBoxPecentange.value
                $("#totalPrice").val(percentageWithoutPrice.toFixed(2));
                $("#pecentange").val(Math.round(calculatePercentange));
            }
        }

        function show1() {
            $('#singleService').css("display", "block")
            $('#multipleService').css("display", "none")
        }

        function show2() {
            $('#singleService').css("display", "none")
            $('#multipleService').css("display", "block")
        }
    </script>


    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62566a78876d5c3b"></script>
@endsection
@endsection
