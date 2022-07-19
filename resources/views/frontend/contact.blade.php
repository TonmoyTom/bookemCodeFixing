@extends('frontend.layouts.master')
@section('title', 'Contact')
@section('content')

    <style>
        .contact-form {
            background: #fff;
            margin-top: 10%;
            margin-bottom: 5%;
            width: 70%;
            box-shadow: var(--shadow-hover);
            margin: 0 auto;
            border-radius: 8px;
        }

        .contact-form .form-control {
            border-radius: 1rem;
        }

        .contact-image {
            text-align: center;
        }

        .contact-image .fa {
            border-radius: 50%;
            margin-top: -3%;
            color: #333;
            font-size: 50px;
            background: #fff;
            width: 11%;
            padding: 5px;
        }

        @media all and (max-width: 992px) {
            .contact-image .fa {
                margin-top: -5%;
                width: 16%;
            }
        }

        @media all and (max-width: 768px) {
            .contact-image .fa {
                margin-top: -7%;
                width: 20%;
            }
        }

        .contact-form form {
            padding: 90px 50px;
        }

        .contact-form h3 {
            margin-bottom: 8%;
            margin-top: -10%;
            text-align: center;
            color: #000000;
        }

        .contact-form .btnContact {
            border: none;
            border-radius: 29px;
            padding: 6px 20px;
            background: #000000;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
        }

        .contact-tel {
            color: #333;
        }

        .contact-tel:hover {
            text-decoration: none;
            color: #000000;

        }

        .book3m-map-address {
            padding: 20px;
        }

    </style>
    <section style="padding:60px 0px;" class="my-5">

        <!------ Include the above in your HEAD tag ---------->


        <div class="container">


            <div class="row">
                <div class="contact-form">
                    <div class="contact-image">
                        <i class="fa fa-rocket" aria-hidden="true"></i>
                    </div>
                    <form action="{{ route('contact.store') }}" method="post" class="pb-4">
                        @csrf
                        <h3>Drop Us a Message</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *"
                                        value="" />
                                    <div style="padding: 5px 0; color:red;">
                                        {{ $errors->has('name') ? $errors->first('name') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Your Email *"
                                        value="" />
                                    <div style="padding: 5px 0; color:red;">
                                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject *"
                                        value="" />
                                    <div style="padding: 5px 0; color:red;">
                                        {{ $errors->has('subject') ? $errors->first('subject') : '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="type your message here.. *"
                                        style="width: 100%; height: 150px;"></textarea>
                                    <div style="padding: 5px 0; color:red;">
                                        {{ $errors->has('message') ? $errors->first('message') : '' }}
                                    </div>
                                </div>
                                <div class="form-group">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />


                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="mr-4"><a class="contact-tel"
                                            href="mailto: {{ $setting->email }}"><i class="fa fa-envelope mr-2"></i>
                                            {{ $setting->email }}
                                        </a></span>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span><a class="contact-tel" href="tel:{{ $setting->phone }}"><i
                                                class="fa fa-phone mr-2"></i>{{ $setting->phone }}</a></span>
                                </div>
                            </div>
                        </div>
                    </form>


                    {{-- <div class="book3m-map-address">
                    <div class="form-group">
                        <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}"
                            type="hidden" name="address" id="address" value="{{ $setting->address }}">
                        <input type="hidden" name="latitude" id="address-latitude"
                            value="{{ $setting->latitude ?? '0' }}" />
                        <input type="hidden" name="longitude" id="address-longitude"
                            value="{{ $setting->longitude ?? '0' }}" />
                    </div>
                    <div id="address-map-container" class="mb-2" style="width:100%;height:400px; ">
                        <div style="width: 100%; height: 315px;border-radius:4px" id="address-map"></div>
                    </div>
                </div> --}}
                    <!-- <div id="dvMap" style="width: 500px; height: 500px"></div> -->
                </div>
            </div>
        </div>
    </section>

@section('customjs')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key')}}&libraries=places&callback=initialize&language=en&region=GB"
        async defer></script>
    {{-- <script src="/js/mapInput.js"></script> --}}

    <script type="text/javascript">
        function getReverseGeocodingData(lat, lng) {
            var latlng = new google.maps.LatLng(lat, lng);
            // This is making the Geocode request
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': latlng
            }, function(results, status) {
                if (status !== google.maps.GeocoderStatus.OK) {
                    alert(status);
                }
                // This is checking to see if the Geoeode Status is OK before proceeding
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(results);
                    var address = (results[0].formatted_address);
                }
            });
        }
    </script>


@endsection
@endsection   
