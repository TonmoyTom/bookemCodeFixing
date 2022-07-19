@extends('frontend.layouts.master')
@section('title','Login')
@section('content')

<style>
    .user-login form input{
        border: 1px solid #ddd;
    background: #fff;
    border-radius: 8px;
    }
</style>

<!--start user login section-->
<section style="padding:60px 0px;" class="user-login my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="user-login-box ajker-shadow" style="transform: translateY(0);">
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
                                <input id="signin-email" name="email" type="email" class="form-control" placeholder="Enter email">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="signin-password">Password</label>
                                <input id="signin-password" name="password" type="password" class="form-control" placeholder="Enter password">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>
                                <small class="form-text mt-3 text-center"><a href="{{ route('password.request') }}"><strong>Forgot password?</strong></a></small>
                            </div>
                            <div class="form-group mb-4"><button  style="background: #333333;"  type="submit" class="btn mt-3 btn-block font-weight-bold">LOGIN</button></div>
                        </form>
                    </div>
                    <div class="ulb-newto text-center">
                        <p>New to {{ $setting->site_name }}? <a href="{{route('user.register')}}">Create an account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end user login section-->

@endsection
