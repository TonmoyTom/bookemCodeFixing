@extends('frontend.layouts.master')
@section('title', 'Independent Contractor')
@section('content')


    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>You are 30 seconds away from earning your own money!</p>
                <a class="vendor-regi-log mb-3" href="{{ route('user.login') }}">Login</a>
            </div>
            <div class="col-md-9 register-right">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Apply as an Independent Contractor </h3>
                        <form action="{{ route('icregister.store') }}" method="post">
                            @csrf
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Independent Contractor Nick Name</label>
                                        <input type="text" class="form-control" name="business_name"
                                            placeholder="Business name" />
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('business_name') ? $errors->first('business_name') : '' }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text" class="form-control" placeholder="Your name" name="name" />
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
                                    </div>


                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Your email " name="email" />
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('email') ? $errors->first('email') : '' }}</div>

                                    </div>
                                    <div class="form-group">
                                        <label for="" class="d-block">Phone Number</label>
                                        <input id="phone" name="mobile" type="tel" placeholder="Enter phone number"  class="form-control">

                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Work Address</label>
                                        <input
                                            class="form-control map-input mb-2 {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                            type="text" name="address" id="address" value="{{ old('address') }}"
                                            placeholder="Enter your address">

                                        <input type="hidden" name="latitude" id="address-latitude"
                                            value="{{ old('latitude') ?? '0' }}" />
                                        <input type="hidden" name="longitude" id="address-longitude"
                                            value="{{ old('longitude') ?? '0' }}" />
                                        <div id="address-map-container" class="mb-2" style="width:100%;height:200px;">
                                            <div style="width: 100%; height: 100%; display:none" id="address-map"></div>
                                        </div>

                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('address') ? $errors->first('address') : '' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Service  Category</label>
                                        <select class="form-control myselect2" multiple name="business_category[]" style="width:100% !important;">
                                            @foreach ($data as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password" />
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('password') ? $errors->first('password') : '' }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm password"
                                            name="password_confirmation" />
                                        <div style='color:red; padding: 0 5px;'>
                                            {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}
                                        </div>
                                    </div>

                                    <button type="submit" class="btnRegister">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>


@section('customjs')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key')}}&libraries=places&callback=initialize&language=en&region=GB"
        async defer></script>
    <script src="/js/mapInput.js"></script>

@endsection
@endsection
