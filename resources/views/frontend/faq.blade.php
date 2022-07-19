@extends('frontend.layouts.master')
@section('title', 'FAQ')
@section('content')
<style>

.step-heading {
    cursor: pointer;
    background: #fff;
    padding: 10px 0;
    border-radius: 8px;
    border-bottom: 8px solid #f8faff;
    padding-left: 10px;
}

/* .step:last-child .step-heading {
    padding-bottom: 0;
} */
.step-heading > a:hover {
    text-decoration: none;
}
.step-heading .num {
    width: 32px;
    height: 32px;
}
.steps .step .line {
    border-left: 1px solid #333;
    left: 25px;
    bottom: 0px;
    top: 32px;
}
.step-body{
    padding-bottom: 15px;
    background: #fff;
    margin-bottom: 7px;
    border-radius: 5px;
    box-shadow:  0px 10px 20px -10px #ddd;
}
.step-body p{
    padding: 15px;
}
.faq-title{
    color: #333;
    font-size: 18px;
}
.faqbb{
    height: 2px;
    width: 250px;
    background: #333;
    margin: 0 auto;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="title-faq text-center mt-4">
                <h2 class="">Frequently Asked Question</h2>
                <div class="faqbb"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 mx-auto">
        <div class="my-5">
		<div class="steps" id="stepWizard">
        @foreach($faqs as $faq)
			<div class="step position-relative">
				<div class="step-heading position-static" id="step1">
					<a class="" role="button" data-toggle="collapse" href="#collapse__{{$faq->id}}" aria-expanded="true" aria-controls="collapse1">
						<div class="num d-inline-flex text-white align-items-center justify-content-center position-relative rounded-circle bg-dark">{{$loop->iteration}}</div>
						<div class="d-inline-flex title text-drak">
                            <h4 class="faq-title">{{$faq->title}}</h4>
                        </div>
					</a>
				</div>

				<div class="line position-absolute"></div>

				<div id="collapse__{{$faq->id}}" class="pl-5 collapse @if($loop->first) show @endif" aria-labelledby="step1" data-parent="#stepWizard">
					<div class="step-body">
                        <p> {!! @$faq->description !!}</p>
                    </div>
				</div>
			</div>
            @endforeach



		</div>
	</div>
        </div>
    </div>

</div>
@endsection
