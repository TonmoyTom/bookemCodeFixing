@extends('frontend.layouts.master')
@section('title', 'Terms of service')
@section('content')



    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="terms-con">

                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="about-title">
                                        <h3 class="pb-4">{{ @$terms->title }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mx-auto">
                                    <p class="text-justify">{!! @$terms->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

@endsection
