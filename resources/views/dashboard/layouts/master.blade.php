<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>@yield('title') | {{ $setting->site_slogan }}</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />
    <!--end::Fonts-->

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">




    {{-- Phone number --}}
    <link rel="stylesheet" href="{{ asset('intphone/intlTelInput.css') }}">

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

        .permits-area .btn.btn-light {
            color: #000 !important;
            background-color: #d4e9ff;
            min-height: 159px;
        }

    </style>


    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('frontend/dashboard') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css"
        rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('frontend/dashboard') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('frontend/dashboard') }}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('frontend/dashboard') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('defaults/dataTable') }}//datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('defaults/dataTable') }}//datatables-responsive/css/responsive.bootstrap4.min.css">

    <link rel="shortcut icon" href="{{ asset('frontend/dashboard') }}/assets/media/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/asset/css/styleDash.css">


    <style>
        .permits-area .btn.btn-light {
            color: #000 !important;
            background-color: #d4e9ff;
        }

        .permits {
            opacity: 0.5;
            background-color: #ddd !important;
        }

    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">
    <!--begin::Main-->

    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile header-mobile-fixed">
        <!--begin::Logo-->
        <a href="{{ route('user.dashboard') }}" class="hello">
            <img alt="Logo" src="{{ asset($setting->logo) }}" class="logo-default max-h-30px" />
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <button class="btn btn-hover-text-primary p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->

    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="flex-row flex-column-fluid page">
            <!--begin::Aside-->

            <!--REMOVED-->

            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                @include('dashboard.layouts.header')
                <!--end::Header-->
                {{-- header box --}}
                @include('dashboard.dashboard-box')
                {{-- header box --}}
                <!--begin::Content-->
                @yield('udcontent')
                <!--end::Content-->
                <!--begin::Footer-->
                @include('dashboard.layouts.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- begin::Notifications Panel-->
    <div id="kt_quick_notifications" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between mb-10">
            <h3 class="font-weight-bold m-0 text-uppercase">Notifications
                <small class="text-muted font-size-sm ml-2">24 New</small>
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_notifications_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Nav-->
            <div class="navi navi-icon-circle navi-spacer-x-0">
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon-bell text-success icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">5 new user generated report</div>
                            <div class="text-muted">Reports based on sales</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon2-box text-danger icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">2 new items submited</div>
                            <div class="text-muted">by Grog John</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon-psd text-primary icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">79 PSD files generated</div>
                            <div class="text-muted">Reports based on sales</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon2-supermarket text-warning icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">$2900 worth producucts sold</div>
                            <div class="text-muted">Total 234 items</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon-paper-plane-1 text-success icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">4.5h-avarage response time</div>
                            <div class="text-muted">Fostest is Barry</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon-safe-shield-protection text-danger icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">3 Defence alerts</div>
                            <div class="text-muted">40% less alerts thar last week</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon-notepad text-primary icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">Avarage 4 blog posts per author</div>
                            <div class="text-muted">Most posted 12 time</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon-users-1 text-warning icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">16 authors joined last week</div>
                            <div class="text-muted">9 photodrapehrs, 7 designer</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon2-box text-info icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">2 new items have been submited</div>
                            <div class="text-muted">by Grog John</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon2-download text-success icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">2.8 GB-total downloads size</div>
                            <div class="text-muted">Mostly PSD end AL concepts</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon2-supermarket text-danger icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">$2900 worth producucts sold</div>
                            <div class="text-muted">Total 234 items</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon-bell text-primary icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">7 new user generated report</div>
                            <div class="text-muted">Reports based on sales</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
                <!--begin::Item-->
                <a href="#" class="navi-item">
                    <div class="navi-link rounded">
                        <div class="symbol symbol-50 symbol-circle mr-3">
                            <div class="symbol-label">
                                <i class="flaticon-paper-plane-1 text-success icon-lg"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold font-size-lg">4.5h-avarage response time</div>
                            <div class="text-muted">Fostest is Barry</div>
                        </div>
                    </div>
                </a>
                <!--end::Item-->
            </div>
            <!--end::Nav-->
        </div>
        <!--end::Content-->
    </div>
    <!-- end::Notifications Panel-->
    <!--begin::Quick Actions Panel-->
    <div id="kt_quick_actions" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-10">
            <h3 class="font-weight-bold m-0 text-uppercase">Quick Actions
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_actions_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5 permits-area">
            <div class="row">
                <!--begin::Item-->
                <div class="col-6 gutter-b">
                    <a href="{{ route('user.dashboard') }}"
                        class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                        <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Layout\Layout-4-blocks.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                    <path
                                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="d-block font-weight-bold font-size-h6 mt-4">Dashboard</span>
                    </a>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="col-6 gutter-b">
                    <a href="{{ route('user.profile') }}"
                        class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                        <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path
                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path
                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="d-block font-weight-bold font-size-h6 mt-4">Profile</span>
                    </a>
                </div>
                <!--end::Item-->

            </div>
            <div class="row">

                @if (Auth::user()->usertype == 2)
                    <!--begin::Item-->
                    <div class="col-6 gutter-b">
                        <a href="{{ route('user.favourite.index') }}"
                            class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                            <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Shopping\Bag2.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5.94290508,4 L18.0570949,4 C18.5865712,4 19.0242774,4.41271535 19.0553693,4.94127798 L19.8754445,18.882556 C19.940307,19.9852194 19.0990032,20.9316862 17.9963398,20.9965487 C17.957234,20.9988491 17.9180691,21 17.8788957,21 L6.12110428,21 C5.01653478,21 4.12110428,20.1045695 4.12110428,19 C4.12110428,18.9608266 4.12225519,18.9216617 4.12455553,18.882556 L4.94463071,4.94127798 C4.97572263,4.41271535 5.41342877,4 5.94290508,4 Z"
                                            fill="#000000" opacity="0.3" />
                                        <path
                                            d="M7,7 L9,7 C9,8.65685425 10.3431458,10 12,10 C13.6568542,10 15,8.65685425 15,7 L17,7 C17,9.76142375 14.7614237,12 12,12 C9.23857625,12 7,9.76142375 7,7 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="d-block font-weight-bold font-size-h6 mt-4">My Favourite</span>
                        </a>
                    </div>
                    <!--end::Item-->
                @endif

                @if (Auth::user()->usertype == 1 && Auth::user()->providertype == 2)
                    <div class="col-6 gutter-b">
                        <a href="{{ route('ic.wallet.view') }}"
                            class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                            <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Shopping\Dollar.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1" />
                                        <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5"
                                            rx="1" />
                                        <path
                                            d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="d-block font-weight-bold font-size-h6 mt-4">Wallet</span>
                        </a>
                    </div>

                    <div class="col-6 gutter-b">
                        <a href="{{ route('ic.payment.method.create') }}"
                            class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                            <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Layout\Layout-4-blocks.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                        <path
                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="d-block font-weight-bold font-size-h6 mt-4">Payment Method</span>
                        </a>
                    </div>

                @endif
            </div>


            <div class="row gutter-b">
                <!--IC Provider payment method-->

                <!--end::Item-->
                <!--begin::Item  review section all user here-->
                @if (Auth::user()->providertype != 3 && Auth::user()->usertype != 2)
                    <div class="col-6 gutter-b">
                        <a href="@if (Auth::user()->usertype == 1 && Auth::user()->providertype == 1) {{ route('provider.review.index') }} @elseif(Auth::user()->usertype == 1 && Auth::user()->providertype == 2) {{ route('ic.provider.review.index') }} @endif"
                            class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                            <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Layout\Layout-4-blocks.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                        <path
                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="d-block font-weight-bold font-size-h6 mt-4">My Reviews</span>
                        </a>
                    </div>
                @endif

                @if ( Auth::user()->providertype == 2)
                <div class="col-6 gutter-b">
                    <a href="{{ route('provider.cupon.index') }}"
                        class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                        <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Layout\Layout-4-blocks.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                    <path
                                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="d-block font-weight-bold font-size-h6 mt-4">Cupon</span>
                    </a>
                </div>
                @endif

                <!--end::Item  payment method-->
                @if (Auth::user()->usertype == 1 && Auth::user()->providertype == 1)
                    <div class="col-6 gutter-b">
                        <a href="{{ route('provider.payment.method.create') }}"
                            class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                            <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Layout\Layout-4-blocks.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                        <path
                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="d-block font-weight-bold font-size-h6 mt-4">Payment Method</span>
                        </a>

                    </div>
                    <div class="col-6">
                        <a href="{{ route('provider.wallet.view') }}"
                            class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                            <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Shopping\Dollar.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1" />
                                        <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5"
                                            rx="1" />
                                        <path
                                            d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="d-block font-weight-bold font-size-h6 mt-4">Wallet</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href=" {{ route('plan') }}"
                            class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                            <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Layout\Layout-4-blocks.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                        <path
                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                            </span>
                            <span class="d-block font-weight-bold font-size-h6 mt-4"> Plan</span>
                        </a>


                    </div>
                @endif

            </div>
            @if (Auth::user()->usertype == 1 && Auth::user()->providertype == 1)
                <div class="row">
                    <!--begin:: Provider Plan-->

                    <!--begin:: Provider Blogs -->
                    <div class="col-6 gutter-b">
                        <a href=" {{ route('provider.blog.index') }}"
                            class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                            <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Layout\Layout-4-blocks.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                        <path
                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                            </span>
                            <span class="d-block font-weight-bold font-size-h6 mt-4">Blogs</span>
                        </a>

                    </div>

                    <!--end::Item-->

                    <div class="col-6 gutter-b">
                        <a href="{{ route('provider.subscribtion.index') }}"
                            class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5 h-100">
                            <span class="svg-icon svg-icon-3x svg-icon-primary m-0">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo5\dist/../src/media/svg/icons\Layout\Layout-4-blocks.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                        <path
                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="d-block font-weight-bold font-size-h6 mt-4"> Subscribtions</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
        <!--end::Content-->
    </div>
    <!--end::Quick Actions Panel-->

    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0 text-uppercase">User Profile
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
                <div class="symbol symbol-100 mr-5">
                    @if (Auth::user()->usertype == 1)
                        <div class="symbol-label"
                            style="background-image:url(@if (!empty(Auth::user()->business_logo)) {{ asset(Auth::user()->business_logo) }} @else {{ asset('defaults/avatar/avatar.png') }} @endif)">
                        </div>
                    @else
                        <div class="symbol-label"
                            style="background-image:url(@if (!empty(Auth::user()->image)) {{ asset(Auth::user()->image) }} @else {{ asset('defaults/avatar/avatar.png') }} @endif)">
                        </div>
                    @endif
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div class="d-flex flex-column">
                    @if (Auth::user()->usertype == 1 && Auth::user()->providertype == 1)
                        <a href="#"
                            class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->business_name }}</a>
                    @elseif(Auth::user()->usertype == 1 && Auth::user()->providertype == 2)
                        <a href="#"
                            class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->name }}</a>
                    @else
                        <a href="#"
                            class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->name }}</a>
                    @endif

                    <div class="text-muted mt-1">
                        @if (Auth::user()->usertype == 1 && Auth::user()->providertype == 1)
                            Vendor
                        @elseif(Auth::user()->usertype == 1 && Auth::user()->providertype == 2)
                            IC Provider
                        @else
                            Customer
                        @endif
                    </div>
                    <div class="navi navi2 mt-2">
                        <a href="#" class="navi-item">
                            <span class="navi-link p-0 pb-2">
                                <span class="navi-icon mr-1">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                    fill="#000000" />
                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span
                                    class="navi-text text-muted text-hover-primary">{{ Auth::user()->email }}</span>
                            </span>
                        </a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();  document.getElementById('logout-form').submit();"
                            class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <!--end::Separator-->
            <!--begin::Nav-->
            <div class="navi navi-spacer-x-0 p-0">
                <!--begin::Item-->
                <a href="{{ route('user.profile') }}" class="navi-item">
                    <div class="navi-link">
                        <div class="symbol symbol-40 bg-light mr-3">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-md svg-icon-success">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                                fill="#000000" />
                                            <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">Personal Information</div>
                            <div class="text-muted">Account settings and more
                                <span class="label label-inline font-weight-bold">update</span>
                            </div>
                        </div>
                    </div>
                </a>
                <!--end:Item-->
                <!--begin::Item-->
                <a href="{{ route('user.change.password') }}" class="navi-item">
                    <div class="navi-link">
                        <div class="symbol symbol-40 bg-light mr-3">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-md svg-icon-warning">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-bar1.svg-->
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Tools\Tools.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z"
                                                fill="#000000" />
                                            <path
                                                d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">Password</div>
                            <div class="text-muted">Change Password</div>
                        </div>
                    </div>
                </a>
                <!--end:Item-->
            </div>
            <!--end::Nav-->
        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Scrolltop-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#6993FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1E9FF",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#212121",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('frontend/dashboard') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('frontend/dashboard') }}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="{{ asset('frontend/dashboard') }}/assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('frontend/dashboard') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('frontend/dashboard') }}/assets/js/pages/widgets.js"></script>
    <!--end::Page Scripts-->

    <script src="{{ asset('frontend/dashboard') }}/assets/js/pages/custom/profile/profile.js"></script>
    <script src="{{ asset('frontend/dashboard') }}/assets/js/pages/crud/forms/editors/summernote.js"></script>
    <script src="{{ asset('frontend/dashboard') }}/assets/js/pages/crud/forms/widgets/select2.js"></script>




    <!-- Sweetalert -->
    <script src="{{ asset('defaults/sweetalert/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('defaults/sweetalert/sweetalertjs.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('defaults/toastr/toastr.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('defaults/dataTable') }}//datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('defaults/dataTable') }}//datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('defaults/dataTable') }}//datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('defaults/dataTable') }}//datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
   <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script>
        $(function() {
            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>

    <script>
        @if (Session::has('message'))
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".myselect2").select2({

        });
    </script>

    @yield('customjs')



    {{-- Phone number --}}
    <script src="{{ asset('intphone/intlTelInput.js') }}"></script>

    <script>
        // Vanilla Javascript
        var input = document.querySelector("#phone");
        window.intlTelInput(input, ({
            autoHideDialCode: true,

        }));

        $(document).ready(function() {
            $('.iti__flag-container').click(function() {
                var countryCode = $('.iti__selected-flag').attr('title');
                var countryCode = countryCode.replace(/[^0-9]/g, '');
                $('#phone').val("");
                $('#phone').val("+" + countryCode + " " + $('#phone').val());
            });
        });
    </script>

    @if (Auth::user()->mobile == '')
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
    @endif




</body>
<!--end::Body-->



</html>
