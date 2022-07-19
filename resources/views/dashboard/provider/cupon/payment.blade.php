@extends('frontend.layouts.master')
@section('title', 'Coupon Payment')
@section('content')

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




<div class="subscribe-box pb-5 my-5">
    <div class="subs-header">
        <div class="subs-month-area">
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <div class="subs-middle text-center pt-4">
                        <h5>PAYMENT INFORMATION</h5>
                        <p class="subs-md-title">Take your card & payment information</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('provider.cupon.payment.confirm') }}" method="post" id="payment-form">
        @csrf

        {{-- <input type="hidden" name="name" value="{{ $name }}">
        <input type="hidden" name="promocode" value="{{ $promocode }}">
        <input type="hidden" name="price" value="{{ $price }}">
        <input type="hidden" name="percetange" value="{{ $percetange }}">
        <input type="hidden" name="percetange_price" value="{{ $percetange_price }}">
        <input type="hidden" name="total_price" value="{{ $total_price }}">
        <input type="hidden" name="start_date" value="{{ $start_date }}">
        <input type="hidden" name="end_date" value="{{ $end_date }}">
        <input type="hidden" name="service_id" value="{{ $service_id }}">
        <input type="hidden" name="payment_type" value="{{ $payment_type }}"> --}}

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
            <div class="subs-button text-center mt-5 mb-3">
                <button class="" type="submit" tabindex="0">Pay Now (${{ $total_price }})</button>
            </div>
        </div>
    </form>
</div>


@section('customjs')

<script src="https://js.stripe.com/v3/"></script>

<script type="text/javascript">
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51KWd2wJCIneuWHgBazlKAJXhYhvJCIaVQYewXGdvA9vhcgePcINLVGtl6TMiwHBC4sVAELmdjzCiu2hQBmoSFriT00ppOQpEbC');
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
@endsection
@endsection
