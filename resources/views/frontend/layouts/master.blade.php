@php
$route = Route::current()->getName();
$url = Request::path();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | @if ($url != '/')
        {{ $setting->site_name }} -
        @endif {{ $setting->site_slogan }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="{{ asset('frontend/dashboard') }}/assets/media/logos/favicon.png" />
    <!-- ====== Swiper Slider ====== -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">



    {{-- Phone number --}}
    <link rel="stylesheet" href="{{ asset('intphone/intlTelInput.css') }}">


    @yield('customcss')
    <link rel="stylesheet" href="{{ asset('frontend') }}/asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/slick.css" />
    <!-- Add the new slick-theme.css if you want the default styling -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/slick-theme.css" />

    <link rel="stylesheet" href="{{ asset('frontend') }}/asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/asset/css/magnific-popup.css">




    <!-- Toastr -->
    <link href="{{ asset('defaults/toastr/toastr.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/asset/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/asset/css/responsive.css">

    <style>
        .iti {
            width: 100%;
        }

        .iti__flag {
            height: 15px;
            box-shadow: 0px 0px 1px 0px #888;
            background-image: url('{{ asset('intphone/flags.png') }}');
            background-repeat: no-repeat;
            background-color: #DBDBDB;
            background-position: 20px 0;
        }

        .owl-carousel .owl-stage-outer {
            padding: 20px 0px;
        }

        .modal-backdrop.show {
            opacity: .3 !important;
        }
    </style>
</head>

<body>

    <header class="header-section">
        <nav class="navbar navbar-expand-lg navbar-light o__navigationBar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset($setting->logo) }}" class="website-logo" alt="{{ $setting->site_name }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" id="close"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto o__nav">
                        <li class="nav-item ">
                            <a class="nav-link @if ($route == 'frontend.home') active @endif"
                                href="{{ route('frontend.home') }}">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($route == 'blog') active @endif" href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($route == 'aboutUs') active @endif"
                                href="{{ route('aboutUs') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($route == 'contact') active @endif"
                                href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($route == 'allvandor') active @endif"
                                href="{{ route('allvandor') }}">Vendors</a>
                        </li>
                        @if (Auth::check())
                        @else
                        <li class="nav-item ddd">
                            <a class="nav-link" href="#">Become a vendor</a>
                            <ul class="dd">
                                <li><a class="nav-link @if ($route == 'vandorregister') active @endif"
                                        href="{{ route('vandorregister') }}">Facility</a></li>
                                <li><a class="nav-link @if ($route == 'icregister') active @endif"
                                        href="{{ route('icregister') }}">Independent Contractor</a></li>
                            </ul>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link @if ($route == 'coupon') active @endif"
                                href="{{ route('coupon') }}">Coupon</a>
                        </li>
                        @if (Auth::check() && Auth::user()->usertype == 1)
                        <li class="nav-item">
                            <a class="nav-link @if ($route == 'plan') active @endif"
                                href="{{ route('plan') }}">Plans</a>
                        </li>
                        @endif

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#"><svg width="22" height="22" viewBox="0 0 22 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.573 0C16.4028 0 21.1449 4.63746 21.1449 10.3387C21.1449 13.0286 20.0894 15.4818 18.362 17.323L21.7609 20.64C22.079 20.9511 22.0801 21.4543 21.762 21.7654C21.6035 21.9225 21.3939 22 21.1855 22C20.9781 22 20.7697 21.9225 20.6101 21.7675L17.1702 18.4129C15.3607 19.8301 13.0663 20.6785 10.573 20.6785C4.74314 20.6785 0 16.04 0 10.3387C0 4.63746 4.74314 0 10.573 0ZM10.573 1.59253C5.64096 1.59253 1.62845 5.51547 1.62845 10.3387C1.62845 15.162 5.64096 19.086 10.573 19.086C15.5039 19.086 19.5165 15.162 19.5165 10.3387C19.5165 5.51547 15.5039 1.59253 10.573 1.59253Z"
                                        fill="black" />
                                </svg></a>
                        </li> --}}


                        <li class="nav-item">
                            @if (Auth::check())
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();  document.getElementById('logout-form').submit();"
                                class="nav-link">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @else
                            <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                            @endif
                        </li>
                        {{-- <li class="nav-item dropdown border rounded mr-1">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('frontend')}}/asset/image/countrylogo.png" alt="">
                        <i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"> <img
                                    src="{{asset('frontend')}}/asset/image/countrylogo.png" alt=""></a>
                            <a class="dropdown-item" href="#"> <img
                                    src="{{asset('frontend')}}/asset/image/countrylogo.png" alt=""></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"> <img
                                    src="{{asset('frontend')}}/asset/image/countrylogo.png" alt=""></a>
                        </div>
                        </li> --}}

                    </ul>
                    <div class="sinBtn mt-3 mt-lg-0">
                        @if (Auth::check())
                        <a href="{{ route('user.dashboard') }}"><i class="fa fa-tachometer"></i> Dashboard</a>
                        @else
                        <a href="{{ route('user.register') }}">Sign up</a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="user-login-box ajker-shadow user_modal_login" style="transform: translateY(0);">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="ulb-logo mb-3  text-center">
                        <img src="{{ asset($setting->logo) }}" alt="logo">
                    </div>

                    <div class="ulb-header text-center">
                        <h4>Login</h4>
                        <h5>Comtinue to <a href="#"><strong>{{ $setting->site_name }}</strong></a></h5>
                    </div>
                    <div class="ulb-form">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="signin-email">Email</label>
                                <input id="signin-email" name="email" type="email" class="form-control"
                                    placeholder="Enter email">
                                <div style='color:red; padding: 0 5px;'>
                                    {{($errors->has('email'))?($errors->first('email')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="signin-password">Password</label>
                                <input id="signin-password" name="password" type="password" class="form-control"
                                    placeholder="Enter password">
                                <div style='color:red; padding: 0 5px;'>
                                    {{($errors->has('password'))?($errors->first('password')):''}}</div>
                                <small class="form-text mt-3 text-center"><a
                                        href="{{ route('password.request') }}"><strong>Forgot
                                            password?</strong></a></small>
                            </div>
                            <div class="form-group mb-4"><button style="background: #333333;" type="submit"
                                    class="btn mt-3 btn-block font-weight-bold">LOGIN</button></div>
                        </form>
                    </div>
                    <div class="ulb-newto text-center">
                        <p>New to {{ $setting->site_name }}? <a href="{{route('user.register')}}">Create an account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="footer-20192 mt-3">
        <div class="site-section">
            <div class="container ">
                <div class="row">
                    <div class="col">
                        <div class="footer-link">
                            <ul>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('aboutUs') }}">About</a></li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('terms.service') }}">Terms of Service</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-center footer-logo-box">
                            <img class="mx-auto footer-logo" src="{{ asset($setting->white_logo) }}">
                            <div class="text-center footer-icon">

                                @if ($setting->facebook_link)
                                <a href="{{ $setting->facebook_link }}" target="_blank"><i
                                        class="fa fa-facebook"></i></a>
                                @endif

                                @if ($setting->instagram_link)
                                <a href="{{ $setting->instagram_link }}" target="_blank"><i
                                        class="fa fa-instagram"></i></a>
                                @endif

                                @if ($setting->twitter_link)
                                <a href="{{ $setting->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                @endif

                                @if ($setting->linkedin_link)
                                <a href="{{ $setting->linkedin_link }}" target="_blank"><i
                                        class="fa fa-linkedin"></i></a>
                                @endif

                                @if ($setting->youtube_link)
                                <a href="{{ $setting->youtube_link }}" target="_blank"><i class="fa fa-youtube"></i></a>
                                @endif
                            </div>
                            <p class="text-center">{{ $setting->copyright }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <style>
        .fixCart {
            position: fixed;
            bottom: 5px;
            left: 100%;
            z-index: 9999999999;
            transition: 1s;
        }

        .fc-box {
            width: 300px;
            color: #fff;
            background: #333;
            border-radius: 5px;
        }

        .fc-box a {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .fc-box a .fcb-qty {
            background: #fff;
            color: #000;
            border-radius: 5px;
            height: 20px;
            width: 20px;
            display: inline-block;
            text-align: center;
            line-height: 20px;
            font-weight: bold;
        }

        .fc-box a .fcb-total {
            margin-left: 10px;
        }

        .fc-box a .fcb-con {
            float: right;
            margin-right: 19px;
            font-weight: bold;
        }
    </style>


    <div class="fixCart fixCart-on">

    </div>

    <style>
        .ajaxloading {
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            height: 100%;
            width: 100%;
            z-index: 99999999;
            display: none;
        }

        .ajaxloading img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            margin: 0 auto;
        }
    </style>

    <div class="ajaxloading">
        <img src="{{ asset('frontend/loading.gif') }}" alt="loading">
    </div>

    <!--============jQuery and Bootstrap js =======-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend') }}/asset/js/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/asset/js/bootstrap.min.js"></script>
    <!--==========Font awesome js==================-->
    {{-- <script src="{{ asset('frontend') }}/asset/js/all.min.js"></script> --}}
    <!--==========Toastr js==================-->

    <!--    <script src="asset/js/toastr.min.js"></script>-->
    <!-- =========== SWIPER SLIDER =========== -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!--==========owl carousel js==================-->
    <script src="{{ asset('frontend') }}/asset/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/asset/js/jquery.magnific-popup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('defaults/toastr/toastr.min.js') }}"></script>


    <script>
        var swiper = new Swiper(".header_slider", {
        spaceBetween: 30,
        effect: "fade",
        loop:true,
        speed: 2000,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    <script>
        $(".myselect2").select2({

        });
    </script>
    <!--=====Custom js======-->
    <script>
        (function () {
            var $gallery = new SimpleLightbox('.gallery a', {});
        })();
    </script>

    <script>
        $('.parent-container').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image'
            // other options
        });
    </script>

    <script src="{{ asset('frontend') }}/asset/js/custom.js"></script>
    <script>
        $(document).ready(function () {
            var owl = $('.reviews-owl');
            owl.owlCarousel({
                loop: false,
                margin: 20,
                dots: true,
                // autoplay: true,
                // autoplayTimeout: 2000,
                // autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 2,
                        nav: false,
                        loop: true,
                    }
                }
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            var owl = $('.bidimage-slider');
            owl.owlCarousel({
                loop: false,
                margin: 20,
                dots: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: false,
                        loop: true,
                    }
                }
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            var owl = $('.vandors-carousel');
            owl.owlCarousel({
                loop: false,
                margin: 20,
                dots: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: false

                    }
                }
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            var owl = $('.owl-header-category');
            owl.owlCarousel({
                loop: false,
                margin: 20,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        nav: true
                    },
                    600: {
                        items: 4,
                        nav: false
                    },
                    1000: {
                        items: 6,
                        nav: false,
                        loop: true,
                    }
                }
            });
        })
    </script>



    <!-- Add cart -->
    <script>
        $(document).on('click', '#cartStore', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            let vendorId = $('#vendorId').val();
            let userId = $('#user_id').val();
            let serviceId = $('#seviceId').val();
            let coupnInput = $('#coupnInput').val();
            let priceInput = $('#priceInput').val();
            let totalPriceInput = $('#totalPriceInput').val();

            $.ajax({
                url: "{{ url('/cart/store') }}/" + id,
                method: "POST",
                dataType: "JSON",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'vendorId': vendorId,
                    'userId': userId,
                    'serviceId': serviceId,
                    'coupnInput': coupnInput,
                    'priceInput': priceInput,
                    'totalPriceInput': totalPriceInput,
                },
                beforeSend: function () {
                    $(".ajaxloading").fadeIn();
                },
                success: function (data) {

                    if ($.isEmptyObject(data.error)) {
                        toastr.success(data.success, 'Success', {
                            timeOut: 3000
                        });
                        $(".ajaxloading").fadeOut();
                    } else {
                        toastr.error(data.error, {
                            timeOut: 3000
                        });
                        $(".ajaxloading").fadeOut();
                        $('#exampleModal').modal('show')
                        $('.close').modal('hide')

                    }

                    loadFixCart();
                    loadCheckoutCart();
                },
                complete: function () {
                    $(".ajaxloading").fadeOut();
                },
            });
        });
    </script>


    <!--Apply coupon-->
    <script>
        $(document).on("click", '#applyCoupon', function (e) {
            e.preventDefault();
            var coupon = $('#couponCode').val();
            $.ajax({
                url: "{{ url('/apply/coupon') }}",
                data: {
                    promocode: coupon,
                },
                type: "POST",
                dataType: "JSON",

                beforeSend: function () {
                    $(".ajaxloading").fadeIn();
                },

                success: function (data) {
                    loadCheckRev();
                    $('#couponModal').modal('hide');
                    $('#couponCode').val('');
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
                complete: function () {
                    $(".ajaxloading").fadeOut();
                },
            });
        });
    </script>

    <!--Remove coupon-->
    <script>
        $(document).on('click', '#removeCoupon', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ url('/coupon/remove') }}",
                method: "GET",
                dataType: "JSON",
                beforeSend: function () {
                    $(".ajaxloading").fadeIn();
                },
                success: function (data) {
                    loadCheckRev();
                    toastr.success('Coupon removed!', 'Removed', {
                        timeOut: 3000
                    });
                },
                complete: function () {
                    $(".ajaxloading").fadeOut();
                },
            });
        });
    </script>



    {{-- Load page --}}
    <script>
        //Load Fix cart
        function loadFixCart() {
            $.ajax({
                url: "{{ url('/load/fix/cart') }}",
                success: function (data) {
                    $('.fixCart').html(data);
                }
            })
        }
        loadFixCart();
    </script>

    <script>
        //Load checkout review
        function loadCheckRev() {
            $.ajax({
                url: "{{ url('/load/check/rev') }}",
                success: function (data) {
                    $('.loadReview').html(data);
                }
            })
        }
        loadCheckRev();
    </script>

    @yield('customjs')




    {{-- Phone number --}}
    <script src="{{ asset('intphone/intlTelInput.js') }}"></script>
    <script>
        // Vanilla Javascript
        var input = document.querySelector("#phone");
        window.intlTelInput(input, ({
            // options here
        }));

        $(document).ready(function () {
            $('.iti__flag-container').click(function () {
                var countryCode = $('.iti__selected-flag').attr('title');
                var countryCode = countryCode.replace(/[^0-9]/g, '')
                $('#phone').val("");
                $('#phone').val("+" + countryCode + " " + $('#phone').val());
            });
        });
    </script>

    <script>
        //Load
        function loadPhone() {
            var countryCode = $('.iti__selected-flag').attr('title');
            var countryCode = countryCode.replace(/[^0-9]/g, '');
            $('#phone').val("");
            $('#phone').val("+" + countryCode + " " + $('#phone').val());
        }
        loadPhone();
    </script>


</body>

</html>
</body>