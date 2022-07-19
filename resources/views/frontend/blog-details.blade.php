@extends('frontend.layouts.master')
@section('title', ''.$blogsdtls->title.'')
@section('content')
<section class="blogbo">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="blogdetails-image mt-5">
                        <img src="{{asset($blogsdtls->image)}}" alt="">

                        <div class="blogdetails-titleBox">
                            <h1>{{$blogsdtls->title}}</h1>
                            <span class="blogcat">{{@$blogsdtls->category->category_name}}</span><br>
                            <span class="blogdate">{{\carbon\carbon::parse($blogsdtls->create_at)->format('M d Y')}}</span>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row my-4">
                <div class="col-md-10 mx-auto">
                    <div class="blogdetails-text">
                    <p>{!! $blogsdtls->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
