@extends('frontend.layouts.master')
@section('title', 'About Us')
@section('content')

    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                <div class="">

               <div class="card-body">
           <div class="row">
               <div class="col-12">
                   <div class="about-title o_aboutTitle">
                       <h3>Scheduling Appointments <b>Just Got Easier</b></h3>
                   </div>
               </div>
           </div>
           @foreach ($abouts as $about)

           <div class="row mb-5">
               <div class="col-md-5 align-self-center {{$loop->even ? "order-first" : "order-last"}}">
                   <div class="about-img text-center">
                       <img src="{{ $about->image }}" alt="about" class="img-fluid rounded">
                   </div>
                </div>
                <div class="col-md-7 align-self-center {{$loop->odd ? "order-first" : "order-last"}}">
                   <div class="about-txt o_abText">
                       <h4>{{ $about->title }}</h4>
                       <p>{!! $about->description !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
           </div>
           </div>
                </div>
            </div>


        </div>
    </section>

@endsection
