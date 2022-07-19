@extends('frontend.layouts.master')
@section('title', 'Blog')
@section('content')

<section class="blogboxtop">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="big-top-blogBox o__blogBnner">
                    <img src="{{asset(@$blog->image)}}" alt="">
                    <div class="top-blog-titleBox">
                        <h1>{{ @$blog->title }}</h1>
                        <span style="color:#2db5b0;" class="blogcat">{{@$blog->category->category_name}}</span>
                        <span class="blogdate">{{\carbon\carbon::parse(@$blog->create_at)->format('M D Y')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!------------------>
<section class="my-4 py-4">
    <div class="container">
        <div class="row mt-lg-5">
            @foreach($blogs as $blog)
            <div class="col-xl-4 col-md-6 ancore mb-3">
                <a href="{{ route('blog.details',$blog->slug)}}">
                    <div class="blogBox">
                        <div class="imageBox">
                            <img src="{{ asset(@$blog->image)}}" alt="">
                            <div class="catbox">
                                <span class="blogcat">{{@$blog->category->category_name}}</span>
                                <span
                                    class="blogdate">{{\carbon\carbon::parse(@$blog->create_at)->format('M D Y')}}</span>
                            </div>
                        </div>
                        <div class="blogDtls">
                            <h3>{{@$blog->title}}</h3>
                            <p>{!! substr(strip_tags(@$blog->description), 0, 200) !!}</p>
                            <span style="color:#989a9c;">
                                @if(@$blog->author==1)
                                <strong>Created by :</strong> Admin
                                @else
                                <strong>Created by :</strong> {{ @$blog->user->name }} (Vendor)
                                @endif
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach


        </div>
    </div>
</section>

@endsection