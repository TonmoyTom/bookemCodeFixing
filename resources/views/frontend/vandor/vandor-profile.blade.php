@extends('frontend.layouts.master')
@section('title', '' . $vendorName . '')
@section('content')

<!-- Statrt Vandor profile -->


<section class="service-detls py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col">
                        <div class="vendor-pBox ">
                            <div class="row pt-3">
                                <div class="col-xl-5 col-12 mb-3 mb-xl-0">
                                    <div class="vendor-imgBox">

                                        <img class="rounded"
                                            src=" @if (!empty($vendor->thumbnail_img)) {{ asset($vendor->thumbnail_img) }} @else {{ asset('defaults/avatar/provider-default-thumbnil.jpeg') }} @endif"
                                            alt="{{ $vendor->business_name }}">

                                    </div>
                                </div>
                                <div class="col-xl-7 col-12">
                                    <div class="vendor-nameBox mb-3">
                                        <h1 class="mb-1">{{ $vendor->business_name }}</h1>
                                        @if($nameIc && $nameIc->providertype != 3)
                                        <p> Artist at {{$nameIc->name}}</p>
                                        @elseif($nameIc == null)
                                        @if($vendor && $vendor->providertype == 1)
                                        @else
                                        <p>Traveller</p>

                                        @endif
                                        @else
                                        <p> Stationed at {{$vendor->business_name}}</p>
                                        @endif

                                        <span><i class="fa fa-map-marker"></i>
                                            @if ($vendor->service_location == 1)
                                            {{ $vendor->address }}
                                            @else
                                            {{ $vendor->address }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="vendor-ratingBox mb-2">
                                        <div class="row text-center">
                                            <div class="col-4">
                                                <div class="rating-sec">
                                                    <h4>Service</h4>
                                                    <span>{{ $serviceCount }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="rating-sec">
                                                    <h4>Rating</h4>
                                                    <span>{{ $ratingCount }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="rating-sec">
                                                    <h4>Reviews</h4>
                                                    <span>{{ $ratingAvg }}</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="heart d-flex my-3">
                                        <span class="mr-2 mt-1"><strong>Share Now </strong></span>

                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                        <div class="addthis_inline_share_toolbox"></div>


                                        <a href="{{ route('favourite.store', $vendor->id) }}" class="mx-4 mt-1"><i
                                                class="fa fa-heart-o @if (Auth::check() && $favCount == 1) text-danger @else text-dark @endif"
                                                style="font-size: 25px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="vendor-serviceBox">
                            <div class="vandor-name mb-3">
                                <div class="title-name">
                                    <h2>Services</h2>

                                </div>
                            </div>

                            @if ($services->count() == 0)
                            No service available!
                            @endif
                            @foreach ($services as $service)
                            <div class="vandor-name mb-3 pb-3 border-btm">
                                <div class="vandor__img">
                                    <img src="{{ asset('frontend/asset/image/heroBanner/hairCut.jpg') }}" alt="">
                                </div>
                                <div class="title-service">
                                    <h4>{{ $service->name }}</h4>
                                    <p> {!! substr(strip_tags($service->description), 0, 80) !!} <a href="#"
                                            data-toggle="modal" data-target="#service_text_{{ $service->id }}">more</a>
                                    </p>


                                </div>
                                <div class="right-btn d-flex align-items-center">
                                    <div class="mr-2">
                                        @if ($service->price_active == 1)
                                        <p class="mb-0">${{ $service->selling_price }}</p>
                                        @else
                                        <p class="mb-0">${{ $service->discount_price }}</p>
                                        <span
                                            class="float-right text-gray"><del>${{ $service->selling_price }}</del></span>
                                        @endif
                                    </div>
                                    <div>

                                        <a href="{{url('user_checkout/' . $service->id . '/' . $user )}}"
                                            data-id="{{ $service->id }}" class="btn btn-primary2 btn-sm">Book</a>
                                        {{--                                                <a href="javascript:;" id="cartStore" data-id="{{ $service->id }}"--}}
                                        {{--                                                    class="btn btn-primary2 btn-sm">Book</a>--}}
                                    </div>
                                </div>
                            </div>

                            {{--                                    <div class="modal fade" id="service_text_{{ $service->id }}"
                            tabindex="-1"--}}
                            {{--                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                            {{--                                        <div class="modal-dialog" role="document">--}}
                            {{--                                            <div class="modal-content">--}}
                            {{--                                                <div class="modal-header">--}}
                            {{--                                                    <h5 class="modal-title" id="exampleModalLabel">--}}
                            {{--                                                        {{ $service->name }}</h5>--}}
                            {{--                                                    <button type="button" class="close" data-dismiss="modal"--}}
                            {{--                                                        aria-label="Close">--}}
                            {{--                                                        <span aria-hidden="true">&times;</span>--}}
                            {{--                                                    </button>--}}
                            {{--                                                </div>--}}

                            {{--                                                <div class="modal-body">--}}
                            {{--                                                    <div class="form-group mservice-text">--}}
                            {{--                                                        <p>{!! $service->description !!}</p>--}}
                            {{--                                                    </div>--}}
                            {{--                                                    <div class="row"></div>--}}
                            {{--                                                </div>--}}

                            {{--                                                <div class="modal-footer">--}}
                            {{--                                                    <div class="mPrice-text">--}}
                            {{--                                                        @if ($service->price_active == 1)--}}
                            {{--                                                            <p class="mb-0">${{ $service->selling_price }}
                            </p>--}}
                            {{--                                                        @else--}}
                            {{--                                                            <p class="mb-0">${{ $service->discount_price }}
                            </p>--}}
                            {{--                                                            <span--}}
                            {{--                                                                class="float-right text-gray"><del>${{ $service->selling_price }}</del></span>--}}
                            {{--                                                        @endif--}}
                            {{--                                                    </div>--}}

                            {{--                                                    <a href="javascript:;" id="cartStore" data-id="{{ $service->id }}"
                            class="btn btn-primary2 btn-sm">Book</a>--}}
                            {{--                                                </div>--}}

                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="vendor-serviceBox">
                            <div class="vandor-name mb-3">
                                <div class="title-name">
                                    <h2>Amenities</h2>
                                </div>
                            </div>

                            <div class="row">
                                @if(@$amenities->parking_space !=null)
                                <div class="col-md-6">
                                    <div class="ameni-box">
                                        <div mode="default" class="ameni-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M17.778 1.65a2.35 2.35 0 0 1 2.325 1.898l.025.16.51 4.093 2.4-.533a.75.75 0 0 1 .423 1.435l-.098.03-2.184.484.907 1.365c.142.21.229.45.255.704l.009.154v9.36a1.55 1.55 0 0 1-1.409 1.544l-.141.006h-1.6a1.55 1.55 0 0 1-1.544-1.409l-.006-.141v-1.65H6.35v1.65a1.55 1.55 0 0 1-1.409 1.544l-.141.006H3.2a1.55 1.55 0 0 1-1.544-1.409L1.65 20.8v-9.366a1.55 1.55 0 0 1 .184-.721l.078-.128.908-1.368-2.183-.485a.75.75 0 0 1 .225-1.48l.1.016 2.406.535.504-4.097A2.35 2.35 0 0 1 6.06 1.654l.16-.004h11.557zM4.85 19.15h-1.7v1.65c0 .018.01.034.025.043l.025.007h1.6a.05.05 0 0 0 .043-.025l.007-.025v-1.65zm16 0h-1.7v1.65c0 .018.01.034.025.043l.025.007h1.6a.05.05 0 0 0 .043-.025l.007-.025v-1.65zm-1.282-9.6H4.428l-.024.006-.02.02-1.226 1.842-.008.022v6.21h17.7v-6.211l-.01-.024-1.226-1.843a.052.052 0 0 0-.046-.022zM7.217 12a2.217 2.217 0 1 1 0 4.433 2.217 2.217 0 0 1 0-4.433zm9.333 0a2.217 2.217 0 1 1 0 4.433 2.217 2.217 0 0 1 0-4.433zm-9.333 1.5a.717.717 0 1 0 0 1.433.717.717 0 0 0 0-1.433zm9.333 0a.717.717 0 1 0 0 1.433.717.717 0 0 0 0-1.433zm1.234-10.35H6.21a.85.85 0 0 0-.83.637l-.02.104-.503 4.103a.05.05 0 0 0 .012.04l.016.012.019.004h14.197a.05.05 0 0 0 .038-.017l.01-.018.003-.018-.512-4.103a.852.852 0 0 0-.856-.744z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span>Parking space</span>
                                    </div>
                                </div>
                                @endif
                                @if(@$amenities->wifi !=null)
                                <div class="col-md-6">
                                    <div class="ameni-box">
                                        <div mode="default" class="ameni-icon">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path transform="translate(-1 1) translate(0 .15) translate(.8 .8)"
                                                    d="M12.2 14.25c1.298 0 2.35 1.052 2.35 2.35s-1.052 2.35-2.35 2.35-2.35-1.052-2.35-2.35 1.052-2.35 2.35-2.35zm0 1.5c-.47 0-.85.38-.85.85s.38.85.85.85.85-.38.85-.85-.38-.85-.85-.85zm0-6.597c2.472 0 4.84.996 6.568 2.762.29.296.285.771-.011 1.061-.296.29-.771.285-1.061-.011-1.447-1.479-3.428-2.312-5.496-2.312-2.068 0-4.05.833-5.496 2.312-.29.296-.765.3-1.06.011-.297-.29-.302-.765-.012-1.06 1.729-1.767 4.096-2.763 6.568-2.763zm0-4.533c3.446 0 6.746 1.39 9.153 3.856.289.297.283.771-.013 1.06-.297.29-.771.284-1.06-.012-2.125-2.177-5.038-3.404-8.08-3.404S6.245 7.347 4.12 9.524c-.289.296-.763.302-1.06.013-.296-.29-.302-.764-.013-1.06C5.454 6.01 8.754 4.62 12.2 4.62zm11.723.395c.297.289.303.764.014 1.06-.289.297-.764.303-1.06.014C16.936.3 7.464.3 1.523 6.09c-.296.29-.771.283-1.06-.014-.29-.296-.283-.771.014-1.06C7-1.342 17.4-1.342 23.923 5.015z">
                                                </path>
                                            </svg></div>
                                        <span>Wi-Fi</span>
                                    </div>
                                </div>
                                @endif
                                @if(@$amenities->credit_card_accept !=null)
                                <div class="col-md-6">
                                    <div class="ameni-box">
                                        <div mode="default" class="ameni-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="m10.628 7.504.229-.004h5.91a.75.75 0 0 1 .103 1.493L16.768 9h-5.144l.001 5.375h4.75a.75.75 0 0 1 .545.235l.065.08 3.438 4.812a.75.75 0 0 1-1.15.957l-.07-.086-3.214-4.498h-5.114a.75.75 0 0 1-.743-.648l-.007-.102v-6.08A6.126 6.126 0 1 0 13.9 20.453a.75.75 0 1 1 .742 1.303 7.625 7.625 0 1 1-4.015-14.252zM11 1.25a2.75 2.75 0 1 1 0 5.5 2.75 2.75 0 0 1 0-5.5zm0 1.5a1.25 1.25 0 1 0 0 2.5 1.25 1.25 0 0 0 0-2.5z">
                                                </path>
                                            </svg></div>
                                        <span>Accessible for people with disabilities</span>
                                    </div>
                                </div>
                                @endif
                                @if(@$amenities->disability !=null)
                                <div class="col-md-6">
                                    <div class="ameni-box">
                                        <div mode="default" class="ameni-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 10.976c2.091 0 4.133 1.074 5.747 3.024 1.452 1.752 2.318 3.96 2.318 5.908 0 .932-.29 1.647-.864 2.124-1.207 1.003-3.296.615-5.139.273-.789-.146-1.534-.285-2.062-.285-.612 0-1.406.146-2.247.3-.963.177-1.942.356-2.824.356-.829 0-1.572-.158-2.135-.627-.57-.475-.86-1.196-.86-2.141 0-1.947.867-4.156 2.319-5.908 1.614-1.95 3.656-3.024 5.747-3.024zm0 1.407c-1.665 0-3.322.892-4.664 2.514-1.23 1.485-1.995 3.405-1.995 5.01 0 .767.266.989.353 1.061.656.547 2.402.226 3.805-.031.906-.166 1.76-.323 2.501-.323.658 0 1.464.15 2.319.308 1.462.272 3.283.61 3.983.028.088-.073.357-.297.357-1.042 0-1.606-.765-3.526-1.995-5.011-1.343-1.622-3-2.514-4.664-2.514zM20.66 8.65c.582-.272 1.208-.307 1.762-.1.689.26 1.2.848 1.437 1.658.216.733.181 1.576-.097 2.373l-.085.222c-.358.87-.973 1.557-1.713 1.904a2.4 2.4 0 0 1-1.017.233c-.255 0-.507-.044-.745-.134-.689-.258-1.2-.847-1.438-1.657-.215-.733-.18-1.576.098-2.373.341-.976.996-1.75 1.798-2.126zm-19.084-.1c.554-.207 1.18-.172 1.762.1.802.375 1.457 1.15 1.798 2.126.278.797.313 1.64.098 2.373-.238.81-.749 1.398-1.438 1.657-.238.09-.49.134-.745.134a2.4 2.4 0 0 1-1.017-.233c-.801-.375-1.457-1.15-1.798-2.126l-.076-.24c-.206-.724-.215-1.473-.021-2.133.238-.81.748-1.399 1.437-1.657zm20.1 1.272c-.161 0-.31.05-.42.102-.454.212-.853.704-1.066 1.315-.34.97-.102 2.022.506 2.25.253.096.505.022.672-.056.454-.212.852-.704 1.066-1.315.339-.97.102-2.022-.507-2.25a.712.712 0 0 0-.251-.046zm-18.934.102c-.167-.078-.42-.152-.671-.057-.61.229-.846 1.28-.507 2.25l.07.18c.224.527.588.945.996 1.136.167.078.42.152.672.057.608-.229.845-1.28.506-2.25-.213-.612-.612-1.104-1.066-1.316zm12.848-7.882c.885 0 1.73.499 2.321 1.37.543.8.842 1.851.842 2.96 0 1.107-.299 2.158-.842 2.958-.59.871-1.436 1.37-2.32 1.37-.885 0-1.731-.499-2.322-1.37-.543-.8-.842-1.851-.842-2.959s.3-2.159.842-2.959c.59-.87 1.437-1.37 2.321-1.37zm-7.182 0c.884 0 1.73.499 2.32 1.37.544.8.843 1.851.843 2.959s-.3 2.159-.842 2.959c-.59.871-1.437 1.37-2.321 1.37-.885 0-1.73-.499-2.321-1.37-.543-.8-.842-1.851-.842-2.959s.299-2.159.842-2.959c.59-.871 1.436-1.37 2.32-1.37zm7.182 1.406c-.562 0-.966.472-1.157.753-.38.562-.6 1.353-.6 2.17s.22 1.608.6 2.17c.19.281.595.753 1.157.753s.967-.472 1.158-.753c.38-.562.599-1.353.599-2.17s-.219-1.608-.6-2.17c-.19-.281-.595-.753-1.157-.753zm-7.182 0c-.562 0-.967.472-1.158.753-.38.562-.599 1.353-.599 2.17s.219 1.608.6 2.17c.19.281.595.753 1.157.753s.966-.472 1.157-.753c.38-.562.6-1.353.6-2.17s-.22-1.608-.6-2.17c-.19-.281-.595-.753-1.157-.753z">
                                                </path>
                                            </svg></div>
                                        <span>Pets allowed</span>
                                    </div>
                                </div>
                                @endif
                                @if(@$amenities->child_friendly !=null)
                                <div class="col-md-6">
                                    <div class="ameni-box">
                                        <div mode="default" class="ameni-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M7.695 1.102A3.952 3.952 0 0 0 6.54 4.82l.007.03H2.4A2.35 2.35 0 0 0 .05 7.2v3.64c0 .58.63.94 1.13.647a2.45 2.45 0 1 1 0 4.226.75.75 0 0 0-1.13.647v5.24a2.35 2.35 0 0 0 2.35 2.35h5.24c.58 0 .94-.63.647-1.13a2.45 2.45 0 1 1 4.226 0 .75.75 0 0 0 .647 1.13h3.64l.16-.005a2.35 2.35 0 0 0 2.19-2.345l-.001-4.149.057.015a3.95 3.95 0 1 0 .79-7.816l-.26.01a3.95 3.95 0 0 0-.513.071l-.074.018.001-2.549-.005-.16A2.35 2.35 0 0 0 16.8 4.85h-2.548l.008-.03A3.95 3.95 0 0 0 7.854.96l-.159.142zm4.284 1.005a2.45 2.45 0 0 1 .534 3.113.75.75 0 0 0 .647 1.13h3.64c.47 0 .85.38.85.85v3.64c0 .58.63.94 1.13.647a2.45 2.45 0 1 1 .17 4.317l-.17-.09a.75.75 0 0 0-1.13.646v5.24l-.007.107a.85.85 0 0 1-.843.743h-2.548l.008-.03a3.95 3.95 0 0 0-6.406-3.86l-.159.142A3.952 3.952 0 0 0 6.54 22.42l.007.03H2.4l-.107-.007a.85.85 0 0 1-.743-.843l-.001-4.148.031.008a3.95 3.95 0 0 0 3.86-6.406l-.142-.159A3.952 3.952 0 0 0 1.58 9.74l-.031.007L1.55 7.2c0-.47.38-.85.85-.85h5.24c.58 0 .94-.63.647-1.13a2.45 2.45 0 0 1 3.692-3.113z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span>Child-friendly</span>
                                    </div>
                                </div>
                                @endif
                                @if(@$amenities->pets_allowed !=null)
                                <div class="col-md-6">
                                    <div class="ameni-box">
                                        <div mode="default" class="ameni-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-credit-card-2-back" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z">
                                                </path>
                                                <path
                                                    d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span>Credit Card Accept</span>
                                    </div>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="vendor-serviceBox">
                            <div class="vandor-name mb-3">
                                <div class="title-name">
                                    <h2>Venue Health and Safety Rules</h2>
                                </div>
                            </div>

                            <div class="row">
                                @foreach($safetyRuls as $safetyRul)
                                <div class="col-md-6">
                                    <div class="ameni-box">
                                        <div mode="default" class="ameni-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M1.649 3.553a17.414 17.414 0 0 1 20.95 0 .75.75 0 0 1 .283.443c.262 1.235.386 2.496.368 3.747a17.414 17.414 0 0 1-10.868 16.152.75.75 0 0 1-.563 0A17.398 17.398 0 0 1 .949 7.747c-.005-1.266.136-2.53.42-3.763a.75.75 0 0 1 .28-.431zm19.748.977a15.914 15.914 0 0 0-18.241-.212l-.383.27-.045.214a14.95 14.95 0 0 0-.25 1.955l-.022.493-.006.495a15.899 15.899 0 0 0 8.984 14.34l.311.146.354.156.355-.156a15.918 15.918 0 0 0 9.281-13.798l.012-.352.003-.348a15.402 15.402 0 0 0-.24-2.941l-.042-.209-.071-.053zm-9.08-1.28a.75.75 0 0 1 .744.648l.006.102v1.74a5.106 5.106 0 0 1 2.31.956l1.23-1.23a.75.75 0 0 1 1.134.977l-.072.084-1.23 1.23c.494.665.831 1.453.957 2.31h1.739a.75.75 0 0 1 .102 1.494l-.102.006h-1.74a5.106 5.106 0 0 1-.956 2.31l1.23 1.23a.75.75 0 0 1-.977 1.134l-.084-.072-1.23-1.23a5.106 5.106 0 0 1-2.31.957v1.739a.75.75 0 0 1-1.494.102l-.007-.102v-1.74a5.106 5.106 0 0 1-2.31-.956l-1.23 1.23a.75.75 0 0 1-1.133-.977l.072-.084 1.23-1.23a5.106 5.106 0 0 1-.957-2.31H5.5a.75.75 0 0 1-.102-1.494l.102-.007h1.74a5.106 5.106 0 0 1 .957-2.31l-1.23-1.23a.75.75 0 0 1 .976-1.133l.084.072 1.23 1.23a5.106 5.106 0 0 1 2.31-.957V4a.75.75 0 0 1 .75-.75zm0 3.935a3.62 3.62 0 0 0-2.545 1.041l-.021.025-.017.013a3.621 3.621 0 0 0-1.05 2.553c0 .997.402 1.9 1.051 2.555l.016.012.008.013a3.621 3.621 0 0 0 2.558 1.053c.996 0 1.898-.4 2.554-1.05l.013-.016.016-.012a3.621 3.621 0 0 0 1.05-2.555c0-.995-.4-1.897-1.05-2.553l-.016-.013-.015-.02a3.621 3.621 0 0 0-2.552-1.046zM12 11.5a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm1-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span>{{$safetyRul->name}}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="vendor-serviceBox">
                            <div class="row">
                                <div class="col">
                                    <div class="title-name mb-3">
                                        <h2>See our work</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3 parent-container">
                                    @foreach ($portfolio1 as $portfolio)
                                    <div class="seeimg">
                                        <a href="{{ asset($portfolio->portfolio_image) }}"><img class="img-thoumbnil"
                                                src="{{ asset($portfolio->portfolio_image) }}" alt=""></a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="row parent-container">
                                        @foreach ($portfolioMulti as $portfolio)
                                        <div class="col-md-6">
                                            <div class="seeimg mb-4">
                                                <a href="{{ asset($portfolio->portfolio_image) }}">
                                                    <img class="img-thoumbnil"
                                                        src="{{ asset($portfolio->portfolio_image) }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>



                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('vendor.portfolio', $vendor->business_url) }}"
                                        class="btn see-work border w-100 pb-2 pt-2">SEE ALL WORKS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-section vendor-serviceBox">
                    <div class="row">
                        <div class="col-md-8">

                            <div class="title-name">
                                <h2>Reviews</h2>
                            </div>

                            <div class="review-head-text">
                                <p class="text-gray">Reviews are no joke! {{ $setting->site_name }} values
                                    authentic reviews and only
                                    verifies them if we know the reviewer has visited this business.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="review-rating border rounded text-center py-4">
                                <h2 class="m-0">{{ $ratingAvg }}<sub>/5</sub></h2>
                                <div class="custom-rating">

                                    @if ($ratingAvg >= 1 && $ratingAvg <= 1.4) <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        @elseif($ratingAvg >= 1.5 && $ratingAvg <= 1.9) <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            @elseif($ratingAvg >= 2 && $ratingAvg <= 2.4) <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                @elseif($ratingAvg >= 2.5 && $ratingAvg <= 2.9) <i class="fa fa-star">
                                                    </i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    @elseif($ratingAvg >= 3 && $ratingAvg <= 3.4) <i class="fa fa-star">
                                                        </i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        @elseif($ratingAvg >= 3.5 && $ratingAvg <= 3.9) <i
                                                            class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            @elseif($ratingAvg >= 4 && $ratingAvg <= 4.4) <i
                                                                class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                @elseif($ratingAvg >= 4.5 && $ratingAvg <= 4.9) <i
                                                                    class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    @elseif($ratingAvg >= 5)
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    @else
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    @endif
                                </div>
                                <p class="text-gray mb-0">{{ $ratingCount }} reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @foreach ($ratings as $rating)
                            <div class="review-box border-btm py-3">
                                <div class="r-top">
                                    <div class="top-left">
                                        @if ($rating->rating == 1)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        @elseif($rating->rating == 2)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        @elseif($rating->rating == 3)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        @elseif($rating->rating == 4)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        @elseif($rating->rating == 5)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        @endif
                                        <div class="reviewer-name">
                                            <p> {{ @$rating->service->name }}</p>
                                            <span>by {{ @$rating->users->name }}</span>
                                        </div>
                                    </div>
                                    <div class="top-right">
                                        <span>{{ \Carbon\Carbon::parse($rating->created_at)->format('M d Y') }}</span><i
                                            class="fa fa-check"></i>
                                    </div>
                                </div>
                                <div class="review-msg">
                                    <p> {{ $rating->description }}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="vendor-serviceBox">
                            @if ($faqtoClient->count() != 0)
                            <div class="row">
                                <div class="col-12">
                                    <div class="title-faq">
                                        <h3 class="p-2 border-rounded">Frequently Asked Question</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12">
                                    <div class="my-5">
                                        <div class="steps" id="stepWizard">
                                            @foreach ($faqtoClient as $faq)
                                            <div class="step position-relative">
                                                <div class="step-heading position-static" id="step1">
                                                    <a class="" role="button" data-toggle="collapse"
                                                        href="#collapse__{{ $faq->id }}" aria-expanded="true"
                                                        aria-controls="collapse1">
                                                        <div
                                                            class="num d-inline-flex text-white align-items-center justify-content-center position-relative rounded-circle bg-dark">
                                                            {{ $loop->iteration }}</div>
                                                        <div class="d-inline-flex title text-drak">
                                                            <h4 class="faq-title">{{ $faq->title }}
                                                            </h4>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="line position-absolute"></div>

                                                <div id="collapse__{{ $faq->id }}"
                                                    class="pl-5 collapse @if ($loop->first) show @endif"
                                                    aria-labelledby="step1" data-parent="#stepWizard">
                                                    <div class="step-body">
                                                        <p> {!! @$faq->description !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-5">
                <div class="vp-right">
                    <div class="googleMap">
                        <div class="form-group">
                            <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                type="hidden" name="address" id="address" value="{{ $vendor->address }}">
                            <input type="hidden" name="latitude" id="address-latitude"
                                value="{{ $vendor->latitude ?? '0' }}" />
                            <input type="hidden" name="longitude" id="address-longitude"
                                value="{{ $vendor->longitude ?? '0' }}" />
                        </div>
                        <div id="address-map-container" class="mb-2" style="width:100%;height:400px; ">
                            <div style="width: 100%; height: 100%" id="address-map"></div>
                        </div>
                    </div>
                    <div class="title-name mt-4">
                        <h2 class="mb-2">About</h2>
                        <p class="">{{ $vendor->business_about }}</p>
                    </div>
                    <div class="vendor-phones">
                        <div class="row">
                            <div class="col-6 align-self-center">
                                <div class="phn-icon d-flex">
                                    <i class="fa fa-phone-alt mr-2"></i>
                                    <p class="m-0"><i class="fa fa-phone"></i> {{ $vendor->mobile }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="al-btn float-right">

                                    <a href="tel:{{ $vendor->mobile }}" class="btn border bg-white">Call</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">

                        <div class="col-12">
                            <div class="shiddul">
                                <h4>Saturday</h4>
                                <h4> @if ($businessHour == null)
                                    <p>No Service</p>
                                    @else
                                    {{ ( $businessHour->sat_s == null &&  $businessHour->sat_e == null ) ? 'close' : (\Carbon\Carbon::createFromFormat('H:i:s',$businessHour->sat_s)->format('g:i A') . "-". \Carbon\Carbon::createFromFormat('H:i:s',$businessHour->sat_e)->format('g:i A'))}}
                                    @endif
                                </h4>
                            </div>
                            <div class="shiddul">
                                <h4>Sunday</h4>
                                @if ($businessHour == null)
                                <p>No Service</p>
                                @else
                                <h4> {{( $businessHour->san_s == null &&  $businessHour->san_e == null ) ? 'close' : (\Carbon\Carbon::createFromFormat('H:i:s',$businessHour->san_s)->format('g:i A') . "-". \Carbon\Carbon::createFromFormat('H:i:s',$businessHour->san_e)->format('g:i A'))}}
                                </h4>
                                @endif

                            </div>
                            <div class="shiddul">
                                <h4>Monday</h4>
                                @if ($businessHour == null)
                                <p>No Service</p>
                                @else
                                <h4>{{(  $businessHour->mon_s == null &&  $businessHour->mon_e == null ) ? 'close' : (\Carbon\Carbon::createFromFormat('H:i:s',$businessHour->mon_s)->format('g:i A') . "-". \Carbon\Carbon::createFromFormat('H:i:s',$businessHour->mon_e)->format('g:i A'))}}
                                </h4>
                                @endif


                            </div>
                            <div class="shiddul">
                                <h4>Tuesday</h4>
                                @if ($businessHour == null)
                                <p>No Service</p>
                                @else
                                <h4>{{(  $businessHour->tus_s == null &&  $businessHour->tus_e == null ) ? 'close' : (\Carbon\Carbon::createFromFormat('H:i:s',$businessHour->tus_s)->format('g:i A') . "-". \Carbon\Carbon::createFromFormat('H:i:s',$businessHour->tus_e)->format('g:i A'))}}
                                </h4>
                                @endif


                            </div>
                            <div class="shiddul">
                                <h4>Wednesday</h4>
                                @if ($businessHour == null)
                                <p>No Service</p>
                                @else
                                <h4>{{( $businessHour->wen_s == null &&  $businessHour->wen_e == null ) ? 'close' : (\Carbon\Carbon::createFromFormat('H:i:s',$businessHour->wen_s)->format('g:i A') . "-". \Carbon\Carbon::createFromFormat('H:i:s',$businessHour->wen_e)->format('g:i A'))}}
                                </h4>
                                @endif

                            </div>
                            <div class="shiddul">
                                <h4>Thursday</h4>
                                @if ($businessHour == null)
                                <p>No Service</p>
                                @else
                                <h4>{{( $businessHour && $businessHour->thus_s == null &&  $businessHour->thus_e == null ) ? 'close' : (\Carbon\Carbon::createFromFormat('H:i:s',$businessHour->thus_s)->format('g:i A') . "-". \Carbon\Carbon::createFromFormat('H:i:s',$businessHour->thus_e)->format('g:i A'))}}
                                </h4>
                                @endif

                            </div>
                            <div class="shiddul">
                                <h4>Friday</h4>
                                @if ($businessHour == null)
                                <p>No Service</p>
                                @else
                                <h4>{{( $businessHour->fri_s == null &&  $businessHour->fri_e == null ) ? 'close' : (\Carbon\Carbon::createFromFormat('H:i:s',$businessHour->fri_s)->format('g:i A') . "-". \Carbon\Carbon::createFromFormat('H:i:s',$businessHour->fri_e)->format('g:i A'))}}
                                </h4>
                                @endif


                            </div>
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-name mt-4 mb-4">
                                <h2 class="mb-2">Social Media</h2>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="vendor-social text-center pb-4">
                                @if (@$socialMedias->facebook)
                                <a href="{{ @$socialMedias->facebook }}" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                @endif
                                @if (@$socialMedias->twitter)
                                <a href="{{ @$socialMedias->twitter }}" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                @endif
                                @if (@$socialMedias->instagram)
                                <a href="{{ @$socialMedias->instagram }}" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                @endif

                                @if (@$socialMedias->linkedin)
                                <a href="{{ @$socialMedias->linkedin }}" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                @endif

                                @if (@$socialMedias->youtube)
                                <a href="{{ @$socialMedias->youtube }}" target="_blank">
                                    <i class="fa fa-youtube"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="title-name mt-4
                             mb-4">
                                <h2 class="mb-2">Employee</h2>
                            </div>
                        </div>
                        <style>
                            .pic img {
                                width: 70px;
                                height: 70px;
                                border-radius: 50%;
                            }

                            .pic>div>p {
                                margin: 0;
                            }

                            .justify-content {
                                display: flex;
                                align-items: center;
                                justify-content: space-between
                            }

                            .text-center {
                                text-align: center;
                            }
                        </style>
                        @if ($vendoric->count() == 0)
                        <div class="col">
                            <span class="text-center d-block">Not added yet...</span>
                        </div>
                        @endif
                        @foreach ($vendoricall as $ic)


                        <div class="col-12 justify-content mb-3">
                            <div class="pic d-flex align-items-center">
                                <img src=" @if (@$ic->image) {{ asset($ic->image) }} @else{{ asset('defaults') }}/avatar/avatar.png @endif"
                                    alt="IC Image" class="mr-3">
                                <div>
                                    <p class="align-self-center">{{ @$ic->name }}</p>
                                    <div class="custom-rating">
                                    </div>
                                </div>
                            </div>
                            <div class="view-por">
                                @if ($ic->business_url)
                                <a target="_blanck" href="{{ route('vendor.details', $ic->business_url) }}"
                                    class="btn btn-info">View Profile</a>
                                @endif
                            </div>

                        </div>
                        @endforeach

                    </div>
                </div>
                <hr class="my-1">
                {{-- Start Provider IC section --}}
                <div class="row">
                    <div class="col-12">
                        <div class="title-name mt-4 mb-4">
                            <h2 class="mb-2">Independent Contractor</h2>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <style>
                        .pic img {
                            width: 70px;
                            height: 70px;
                            border-radius: 50%;
                        }

                        .pic>div>p {
                            margin: 0;
                        }

                        .justify-content {
                            display: flex;
                            align-items: center;
                            justify-content: space-between
                        }

                        .text-center {
                            text-align: center;
                        }
                    </style>
                    @if ($vendoric->count() == 0)
                    <div class="col">
                        <span class="text-center d-block">Not added yet...</span>
                    </div>
                    @endif
                    @foreach ($vendoric as $ic)
                    <div class="col-12 justify-content mb-3">
                        <div class="pic d-flex align-items-center">
                            <img src=" @if (@$ic->image) {{ asset($ic->image) }} @else{{ asset('defaults') }}/avatar/avatar.png @endif"
                                alt="IC Image" class="mr-3">
                            <div>
                                <p class="align-self-center">{{ @$ic->name }}</p>
                                <div class="custom-rating">

                                    @if ($ratingAvg >= 1 && $ratingAvg <= 1.4) <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        @elseif($ratingAvg >= 1.5 && $ratingAvg <= 1.9) <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            @elseif($ratingAvg >= 2 && $ratingAvg <= 2.4) <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                @elseif($ratingAvg >= 2.5 && $ratingAvg <= 2.9) <i class="fa fa-star">
                                                    </i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    @elseif($ratingAvg >= 3 && $ratingAvg <= 3.4) <i class="fa fa-star">
                                                        </i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        @elseif($ratingAvg >= 3.5 && $ratingAvg <= 3.9) <i
                                                            class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            @elseif($ratingAvg >= 4 && $ratingAvg <= 4.4) <i
                                                                class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                @elseif($ratingAvg >= 4.5 && $ratingAvg <= 4.9) <i
                                                                    class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    @elseif($ratingAvg >= 5)
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    @else
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="view-por">
                            @if ($ic->business_url)
                            <a target="_blanck" href="{{ route('ic.details', $ic->business_url) }}"
                                class="btn btn-info">View Profile</a>
                            @endif
                        </div>

                    </div>
                    @endforeach
                </div>
                {{-- end Provider IC section --}}
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select User</h5>
                    <button type="button" id="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select id="user" class="form-control">
                        <option>Select User</option>

                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary2" data-dismiss="modal" id="closebtn"
                        onclick="close()">Closes</button>
                    <button type="button" class="btn btn-primary2 btn-sm">Book</button>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- end Vandor profile -->




@section('customjs')
<script
    src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key')}}&libraries=places&callback=initialize&language=en&region=GB"
    async defer></script>
<script src="/js/mapInput.js"></script>


<script>
    function service(id) {
        $.ajax({
            url: '{{ url('
            all_service_user / ') }}' + '/' + id,
            type: 'get',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                $.each(response, function (key, value) {

                    $("#user").append('<option value="' + value.id + '">' + value.name +
                        '</option>');
                });

            }
        })
    }
    window.onload = () => {
        let closeBtn = document.getElementById("close")
        let closeCroxx = document.getElementById("closebtn")
        closeBtn.addEventListener('click', () => {
            location.reload();
        })
        closeCroxx.addEventListener('click', () => {
            location.reload();
        })

    }
</script>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62566a78876d5c3b"></script>



@endsection
@endsection