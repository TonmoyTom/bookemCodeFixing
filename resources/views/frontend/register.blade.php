@extends('frontend.layouts.master')
@section('title', 'Register')
@section('content')

    <style>
        .user-register form input {
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 8px;
        }

    </style>


    <!--start user register section-->
    <section class="user-register py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="user-login-box" style="transform: translateY(0);">
                        <div class="ulb-logo mb-3  text-center">
                            <img src="{{ asset($setting->logo) }}" alt="logo">
                        </div>
                        <div class="ulb-header text-center">
                            <h4>Create an account</h4>
                            <h5>Comtinue to <a href="#"><strong>{{ $setting->site_name }}</strong></a></h5>
                        </div>

                        {{-- <div class="ulb-with my-3">
                            <div class="btn-login">
                                <a style="overflow: hidden; background: transparent; border: 2px solid rgb(215, 216, 219); color: rgb(109, 115, 120);"
                                    href="{{ url('login/google') }}" class="btn btn-google mt-2">

                                    <svg class="float-left" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M24 12.2724C24 11.4216 23.9216 10.6044 23.7771 9.81836H12.2449V14.46H18.8351C18.6987 15.1942 18.4118 15.8937 17.9917 16.5162C17.5716 17.1386 17.0271 17.6712 16.391 18.0816V21.0936H20.3486C22.6641 19.0032 24 15.9276 24 12.2736V12.2724Z"
                                            fill="#4285F4"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.2449 23.9999C15.551 23.9999 18.3233 22.9259 20.3486 21.0923L16.391 18.0815C15.2951 18.8015 13.8931 19.2275 12.2449 19.2275C9.0551 19.2275 6.3551 17.1155 5.39388 14.2799H1.30286V17.3879C2.32164 19.376 3.88454 21.0473 5.81685 22.2149C7.74917 23.3826 9.97477 24.0006 12.2449 23.9999Z"
                                            fill="#34A853"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.39388 14.2801C5.14898 13.5601 5.00939 12.7921 5.00939 12.0001C5.00939 11.2081 5.14898 10.4401 5.39388 9.72006V6.61206H1.30286C0.445732 8.28391 -0.000440122 10.1291 3.25781e-07 12.0001C3.25781e-07 13.9369 0.472653 15.7681 1.30286 17.3881L5.39265 14.2801H5.39388Z"
                                            fill="#FBBC05"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.2449 4.7724C14.0424 4.7724 15.6563 5.3784 16.9261 6.5676L20.438 3.126C18.3171 1.188 15.5449 0 12.2449 0C7.45714 0 3.31837 2.688 1.30286 6.612L5.39265 9.72C6.35755 6.8832 9.05632 4.7724 12.2449 4.7724Z"
                                            fill="#EA4335"></path>
                                    </svg>
                                    <span style="display: block; margin-top: 2px;">Login With Google</span>
                                </a>
                            </div>
                        </div>
                        <div class="ulb-or text-center">
                            <span>Or</span>
                        </div> --}}
                        <div class="ulb-form">
                            <form action="{{ route('register.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form-control" name="name" id=""
                                        placeholder="Enter full name" value="{{ old('name') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email"
                                        value="{{ old('email') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('email') ? $errors->first('email') : '' }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="d-block">Phone Number</label>
                                    <input id="phone" name="mobile" type="tel" placeholder="Enter phone number"  class="form-control" value="+1 ">

                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</div>
                                </div>
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
                                    <div id="address-map-container" class="mb-2" style="width:100%;height:200px;">
                                        <div style="width: 100%; height: 100%" id="address-map"></div>
                                    </div>

                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('address') ? $errors->first('address') : '' }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="#">Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="******"
                                        value="{{ old('password') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('password') ? $errors->first('password') : '' }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="#">Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                        placeholder="******" value="{{ old('password_confirmation') }}">
                                    <div style='color:red; padding: 0 5px;'>
                                        {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}
                                    </div>
                                </div>

                                <div class="form-group mb-4"><button style="background: #333333;" type="submit"
                                        class="btn mt-3 btn-block font-weight-bold">Register</button></div>
                            </form>
                        </div>
                        <div class="ulb-newto text-center">
                            <p>Already a member? <a href="{{ route('user.login') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end user register section-->

@section('customjs')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key')}}&libraries=places&callback=initialize&language=en&region=GB"
        async defer></script>
    <script src="/js/mapInput.js"></script>

@endsection
@endsection
