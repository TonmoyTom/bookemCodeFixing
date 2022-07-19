@extends('frontend.layouts.master')
@section('title', 'Plans')
@section('content')

    <style>
        .price-sec-wrap {
            width: 100%;
            float: left;
            padding: 60px 0;
            font-family: 'Lato', sans-serif;
        }

        .main-heading {
            text-align: center;
            font-weight: 600;
            padding-bottom: 15px;
            position: relative;
            text-transform: capitalize;
            font-size: 24px;
            margin-bottom: 25px;
        }

        .price-box {
            box-shadow: var(--shadow);
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            transition: .4s;
            border:solid 1px #dddddd54;
        }

        .price-box:hover {
            box-shadow: var(--shadow-hover);
            transform: var(--animate);
        }

        .price-box ul {
            padding: 10px 0px 30px;
            /* margin: 17px 0 0 0; */
            list-style: none;
            /* border-top: solid 1px #e9e9e9; */
        }

        .price-box ul li {
            padding: 7px 0;
            font-size: 14px;
            color: #808080;
        }

        .price-box ul li .fa {
            color: #68AE4A;
            margin-right: 7px;
            font-size: 12px;
        }

        .price-label {
            font-size: 16px;
            font-weight: 600;
            line-height: 1.34;
            margin-bottom: 0;
            padding: 6px 15px;
            display: inline-block;
            border-radius: 3px;
        }

        .price-label.basic {
            color: #169bb9;
            padding: 0;
            font-size: 25px;
            font-weight: 700;
        }

        .price-label.value {
            background: #E8F5E9;
            color: #4CAF50;
        }

        .price-label.premium {
            background: #FBE9E7;
            color: #FF5722;
        }

        .price {
            font-size: 44px;
            line-height: 44px;
            margin: 15px 0 6px;
            font-weight: 900;
        }

        .price-info {
            font-size: 15px;
            font-weight: 400;
            line-height: 1.67;
            color: inherit;
            width: 100%;
            margin: 0;
            color: #989898;
            font-weight: 600;
        }

        .plan-btn {
            text-transform: uppercase;
            font-weight: 600;
            display: block;
            padding: 11px 30px;
            border: 2px solid #b3b3b3;
            color: #000;
            margin-top: 5px;
            overflow: hidden;
            position: relative;
            z-index: 1;
            margin: 0;
            border-radius: 5px;
            text-decoration: none;
            width: 100%;
            text-align: center;
            font-size: 14px;
        }

        .plan-btn::after {
            position: absolute;
            left: -100%;
            top: 0;
            content: "";
            height: 100%;
            width: 100%;
            background: #000;
            z-index: -1;
            transition: all 0.35s ease-in-out;
        }

        .plan-btn:hover::after {
            left: 0;
        }

        .plan-btn:hover,
        .plan-btn:focus {
            text-decoration: none;
            color: #fff;
            border: 2px solid #000;
        }

        @media (max-width: 991px) {
            .price-box {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 575px) {
            .main-heading {
                font-size: 21px;
            }

            .price-box {
                margin-bottom: 20px;
            }
        }

        .current-plans {
            background: #fff !important;
        }

    </style>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="main-heading">
                        <h2>Get Started!</h2>
                        <p style="font-size:16px; color:gray">Upgrade for advanced features</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($plans as $plan)

                @php
                     $features = App\Models\FeaturePlan::where('plan_id',$plan->id)->get();
                @endphp

                    <div class="col-lg-4">
                        <div class="price-box @if (@$plan->stripe_plan_id == @$currentPlan->stripe_plan) current-plans @endif">
                            <div class="p-content">
                                <div class="price-label basic mb-3">{{ $plan->name }}</div>
                                <p style="font-size: 15px; color:gray;">{{ $plan->about }}</p>
                                <div class="price">${{ $plan->price }}</div>
                                <div class="price-info">Monthly</div>
                            </div>
                            <div class="info">
                                <ul>
                                    @foreach ($features as $list)
                                        <li style="text-transform: capitalize"><i class="fa fa-check"></i>{{ @$list->feature->name }}</li>
                                    @endforeach
                                </ul>
                                @if (@$plan->stripe_plan_id == @$currentPlan->stripe_plan)
                                    <strong class="d-block">Your current plan.
                                        {{ auth()->user()->subscription('default')->ends_at }}</strong>
                                    <br />
                                    {{-- @if (!$currentPlan->onGracePeriod())
                                        <a href="{{ route('plan.cancel') }}" class="plan-btn"
                                            onclick="return confirm('Are you sure?')">Cancel plan</a>
                                    @else
                                        Your subscription will end on {{ $currentPlan->ends_at->toDateString() }}
                                        <br /><br />
                                            <a href="{{ route('plan.resume') }}" class="plan-btn"
                                            onclick="return confirm('Are you sure?')">Resume
                                                Subscription</a>
                                    @endif --}}
                                @else
                                    <a href="{{ route('plan.checkout', $plan->id) }}" class="plan-btn">Subscribe to
                                        {{ $plan->name }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
