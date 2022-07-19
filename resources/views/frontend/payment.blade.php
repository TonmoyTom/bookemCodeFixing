@extends('frontend.layouts.master')
@section('title', 'Payment information')
@section('content')

    @if ($payment_type == 'Heartland')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.css">

        <style>
            #payment-form input {
                border: 1px solid #a2a2a2;
                border-radius: 0;
                background: #f5f5f5;
            }

            .ui.icon.input>i.icon:not(.link) {
                pointer-events: none;
                border: 1px solid #a2a2a2;
            }

        </style>
    @endif

    @if ($payment_type == 'Stripe')
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

    @endif


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

        {{-- @if ($payment_type == 'Heartland')
            <form class="ui payment form attached payment-form" id="payment-form">
                @csrf

                <input type="hidden" name="date" value="{{ $date }}">
                <input type="hidden" name="time" value="{{ $time }}">
                <input type="hidden" name="ic_id" value="{{ $ic_id }}">

                <div class="subs-body mt-3">
                    <div class="subs-payment">
                        <div class="subs-step">
                            <p class="mb-2">PAYMENT DETAILS</p>
                            <small style="font-weight: 600;">Enter card information</small>
                        </div>

                        <div class="subs-payment-form">
                            <input style="display:none" />
                            <div class="field">
                                <label>Card Number</label>
                                <div class="ui icon input">
                                    <i class="credit card alternative icon"></i>
                                    <input class="form-control" name="cardNumber" type="tel" id="cc-number"
                                        placeholder="•••• •••• •••• ••••" data-payment='cc-number'>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Card Expiry (MM/YYYY)</label>
                                        <input name="cardExpiration" type="tel" id="cc-exp" placeholder="•• / ••••"
                                            data-payment='cc-exp'>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>CVC</label>
                                        <input name="cardCvv" type="password" id="cc-cvc" placeholder="•••"
                                            data-payment='cc-cvc'>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="ui error message"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <hr>

                    <div class="subs-button text-center mt-5 mb-3">
                        <button type="submit" tabindex="0">Confirm</button>
                    </div>
                </div>
            </form>
        @endif --}}
        @if ($payment_type == 'Stripe')
            <form action="{{ route('user.payment.stripe') }}" method="post" id="payment-form">
                @csrf

                <input type="hidden" name="date" value="{{ $date }}">
                <input type="hidden" name="time" value="{{ $time }}">
                <input type="hidden" name="address" value="{{ $address }}">
                <input type="hidden" name="latitude" value="{{ $latitude }}">
                <input type="hidden" name="longitude" value="{{ $longitude }}">
                <input type="hidden" name="travel_fee" value="{{ $travel_fee }}">
                <input type="hidden" name="current_location" value="{{ $current_location }}">
                <input type="hidden" name="current_lat" value="{{ $current_lat }}">
                <input type="hidden" name="current_lon" value="{{ $current_lon }}">

                <div class="subs-body mt-3">
                    <div class="subs-payment">
                        <div class="subs-step">
                            <p class="mb-2">PAYMENT DETAILS</p>
                            <small style="font-weight: 600;">Enter card information</small>
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
                    <hr>
                    <div class="subs-button text-center mt-5 mb-3">
                        <button type="submit" tabindex="0">Pay Now</button>
                    </div>
                </div>
            </form>
        @endif

        @if ($payment_type == 'Hand Cash')
            <form action="{{ route('user.payment.handcash') }}" method="post" id="payment-form">
                @csrf

                <input type="hidden" name="date" value="{{ $date }}">
                <input type="hidden" name="time" value="{{ $time }}">
                <input type="hidden" name="ic_id" value="{{ $ic_id }}">
                <input type="hidden" name="address" value="{{ $address }}">
                <input type="hidden" name="latitude" value="{{ $latitude }}">
                <input type="hidden" name="longitude" value="{{ $longitude }}">
                <input type="hidden" name="travel_fee" value="{{ $travel_fee }}">


                <div class="subs-body mt-3">
                    <div class="subs-button text-center mt-5 mb-3">
                        <button type="submit" tabindex="0">Click here & Confirm Your Appointment</button>
                    </div>
                </div>
            </form>
        @endif



    </div>


@section('customjs')

    {{-- @if ($payment_type == 'Heartland')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.js"></script>


        <script type="text/javascript">
            /**
             * paymentForm
             *
             * A plugin that validates a group of payment fields.  See jquery.payment.js
             * Adapted from https://gist.github.com/Air-Craft/1300890
             */

            // if (!window.L) { window.L = function () { console.log(arguments);} } // optional EZ quick logging for debugging

            (function($) {

                /**
                 * The plugin namespace, ie for $('.selector').paymentForm(options)
                 *
                 * Also the id for storing the object state via $('.selector').data()
                 */
                var PLUGIN_NS = 'paymentForm';

                var Plugin = function(target, options) {
                    this.$T = $(target);
                    this._init(target, options);

                    /** #### OPTIONS #### */
                    this.options = $.extend(
                        true, // deep extend
                        {
                            DEBUG: false
                        },
                        options
                    );

                    this._cardIcons = {
                        "visa": "visa icon",
                        "mastercard": "mastercard icon",
                        "amex": "american express icon",
                        "dinersclub": "diners club icon",
                        "discover": "discover icon",
                        "jcb": "japan credit bureau icon",
                        "default": "credit card alternative icon"
                    };

                    return this;
                }

                /** #### INITIALISER #### */
                Plugin.prototype._init = function(target, options) {
                    var base = this;

                    base.number = this.$T.find("[data-payment='cc-number']");
                    base.exp = this.$T.find("[data-payment='cc-exp']");
                    base.cvc = this.$T.find("[data-payment='cc-cvc']");
                    base.brand = this.$T.find("[data-payment='cc-brand']");
                    base.onlyNum = this.$T.find("[data-numeric]");

                    // Set up all payment fields inside the payment form
                    base.number.payment('formatCardNumber').data('payment-error-message',
                        'Please enter a valid credit card number.');
                    base.exp.payment('formatCardExpiry').data('payment-error-message',
                        'Please enter a valid expiration date.');
                    base.cvc.payment('formatCardCVC').data('payment-error-message', 'Please enter a valid CVC.');
                    base.onlyNum.payment('restrictNumeric');

                    // Update card type on input
                    base.number.on('input', function() {
                        base.cardType = $.payment.cardType(base.number.val());
                        var fg = base.number.closest('.ui.icon.input');
                        if (base.cardType) {
                            base.brand.text(base.cardType);
                            // Also set an icon
                            var icon = base._cardIcons[base.cardType] ? base._cardIcons[base.cardType] : base
                                ._cardIcons["default"];
                            fg.children('i').attr("class", icon);
                            //("<i class='" + icon + "'></i>");
                        } else {
                            $("[data-payment='cc-brand']").text("");
                        }
                    });

                    // Validate card number on change
                    base.number.on('change', function() {
                        base._setValidationState($(this), !$.payment.validateCardNumber($(this).val()));
                    });

                    // Validate card expiry on change
                    base.exp.on('change', function() {
                        base._setValidationState($(this), !$.payment.validateCardExpiry($(this).payment(
                            'cardExpiryVal')));
                    });

                    // Validate card cvc on change
                    base.cvc.on('change', function() {
                        base._setValidationState($(this), !$.payment.validateCardCVC($(this).val(), base
                            .cardType));
                    });
                };

                /** #### PUBLIC API (see notes) #### */
                Plugin.prototype.valid = function() {
                    var base = this;

                    var num_valid = $.payment.validateCardNumber(base.number.val());
                    var exp_valid = $.payment.validateCardExpiry(base.exp.payment('cardExpiryVal'));
                    var cvc_valid = $.payment.validateCardCVC(base.cvc.val(), base.cardType);

                    base._setValidationState(base.number, !num_valid);
                    base._setValidationState(base.exp, !exp_valid);
                    base._setValidationState(base.cvc, !cvc_valid);

                    return num_valid && exp_valid && cvc_valid;
                }

                /** #### PRIVATE METHODS #### */
                Plugin.prototype._setValidationState = function(el, erred) {
                    var fg = el.closest('.field');
                    fg.toggleClass('error', erred).toggleClass('', !erred);
                    fg.find('.payment-error-message').remove();
                    if (erred) {
                        fg.append("<span class='ui pointing red basic label payment-error-message'>" + el.data(
                            'payment-error-message') + "</span>");
                    }
                    return this;
                }

                /**
                 * EZ Logging/Warning (technically private but saving an '_' is worth it imo)
                 */
                Plugin.prototype.DLOG = function() {
                    if (!this.DEBUG) return;
                    for (var i in arguments) {
                        console.log(PLUGIN_NS + ': ', arguments[i]);
                    }
                }
                Plugin.prototype.DWARN = function() {
                    this.DEBUG && console.warn(arguments);
                }


                /*###################################################################################
                 * JQUERY HOOK
                 ###################################################################################*/

                /**
                 * Generic jQuery plugin instantiation method call logic
                 *
                 * Method options are stored via jQuery's data() method in the relevant element(s)
                 * Notice, myActionMethod mustn't start with an underscore (_) as this is used to
                 * indicate private methods on the PLUGIN class.
                 */
                $.fn[PLUGIN_NS] = function(methodOrOptions) {
                    if (!$(this).length) {
                        return $(this);
                    }
                    var instance = $(this).data(PLUGIN_NS);

                    // CASE: action method (public method on PLUGIN class)
                    if (instance &&
                        methodOrOptions.indexOf('_') != 0 &&
                        instance[methodOrOptions] &&
                        typeof(instance[methodOrOptions]) == 'function') {

                        return instance[methodOrOptions](Array.prototype.slice.call(arguments, 1));


                        // CASE: argument is options object or empty = initialise
                    } else if (typeof methodOrOptions === 'object' || !methodOrOptions) {

                        instance = new Plugin($(this), methodOrOptions); // ok to overwrite if this is a re-init
                        $(this).data(PLUGIN_NS, instance);
                        return $(this);

                        // CASE: method called before init
                    } else if (!instance) {
                        $.error('Plugin must be initialised before using method: ' + methodOrOptions);

                        // CASE: invalid method
                    } else if (methodOrOptions.indexOf('_') == 0) {
                        $.error('Method ' + methodOrOptions + ' is private!');
                    } else {
                        $.error('Method ' + methodOrOptions + ' does not exist.');
                    }
                };
            })(jQuery);

            /* Initialize validation */
            var payment_form = $('.payment-form').paymentForm();

            $('.payment-form').on('submit', function(event) {
                event.preventDefault();
                var valid = $(this).paymentForm('valid');
                if (valid) {

                    $.ajax({
                        url: "{{ url('/payment/method/heartland') }}",
                        data: new FormData(this),
                        type: "POST",
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "JSON",

                        beforeSend: function() {
                            $(".ajaxloading").fadeIn();
                        },
                        success: function(data) {
                            toastr.success('Payment successfully!', 'Success', {
                                timeOut: 3000
                            });
                            window.location = '/user/dashboard';
                        },
                        error: function(xhr) {
                            toastr.error('', 'Invalid card information!', {
                                timeOut: 3000
                            });

                        },
                        complete: function() {
                            $(".ajaxloading").fadeOut();
                        },

                    });

                } else {
                    toastr.error('', 'Invalid card information!', {
                        timeOut: 3000
                    });
                }
            });
        </script>
    @endif --}}

    @if ($payment_type == 'Stripe')
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
    @endif
@endsection
@endsection
