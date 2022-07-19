@extends('frontend.layouts.master')
@section('title', 'Privacy Policy')
@section('content')

    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="privacey-pol">

                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="about-title">
                                        <h4 class="pb-4">{{ $privacy->title }} - {{ $setting->site_name }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mx-auto">
                                    <p class="text-justify">{!! @$privacy->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

@endsection
