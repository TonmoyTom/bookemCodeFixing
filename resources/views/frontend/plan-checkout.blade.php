@extends('frontend.layouts.master')
@section('title', 'Plan Checkout')
@section('content')

    <section class="plan-checkout py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            Subscribe to {{ $plan->name }}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('plan.checkout.process') }}" method="POST" id="checkout-form">
                                @csrf
                                <input type="hidden" name="plan_id" value="{{ $plan->id }}" />
                                <input type="hidden" name="payment-method" id="payment-method" value="" />

                                <input id="card-holder-name" type="text" placeholder="Card holder name"
                                    class="form-control mb-3" required>

                                <!-- Stripe Elements Placeholder -->
                                <div id="card-element"></div>

                                <br />

                                <button id="card-button" class="btn mybtn">
                                    Pay ${{ $plan->price }}
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customjs')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function() {
            let stripe = Stripe('pk_test_51KWd2wJCIneuWHgBazlKAJXhYhvJCIaVQYewXGdvA9vhcgePcINLVGtl6TMiwHBC4sVAELmdjzCiu2hQBmoSFriT00ppOQpEbC');
            let elements = stripe.elements()
            let style = {
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
            }

            let card = elements.create('card', {
                style: style
            })
            card.mount('#card-element')

            let paymentMethod = null
            $('#checkout-form').on('submit', function(e) {
                if (paymentMethod) {
                    return true
                }
                stripe.confirmCardSetup(
                    "{{ $intent->client_secret }}", {
                        payment_method: {
                            card: card,
                            billing_details: {
                                name: $('#card-holder-name').val()
                            }
                        }
                    }
                ).then(function(result) {
                    if (result.error) {
                        console.log(result)
                        toastr.error('', 'Invalid Card Informations!', {
                            timeOut: 3000
                        });
                    } else {
                        paymentMethod = result.setupIntent.payment_method
                        $('#payment-method').val(paymentMethod)
                        $('#checkout-form').submit()
                    }
                })
                return false
            })
        });
    </script>
@endsection

@section('customcss')
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
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
@endsection
