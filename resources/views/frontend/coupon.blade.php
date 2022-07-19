@extends('frontend.layouts.master')
@section('title', 'Coupon')
@section('content')


    <style>
        .para-box {
            background: #fff;
            border-radius: 8px;
            box-shadow: var(--shadow);
            transition: .4s;

        }

        .para-box:hover {
            box-shadow: var(--shadow-hover);
            transform: var(--animate);
        }

        .box-top {
    border-radius: 7px;
    background: linear-gradient(45deg, #000000, #94e3f5);
}

        .box-top h1 {
            color: #fff;
            text-align: center;
            font-size: 23px;
            text-transform: uppercase;
            font-weight: 400;
            padding: 33px 10px;
        }
        .shopbtn a{
            text-decoration: none;
            color: #fff;
        }

        .box-bottom {
            margin: 8px 0;
            height: 150px;
        }

        .box-bottom h1 {
            color: #000;
            font-size: 40px;
            font-weight: 700;
        }

        .upto {
            font-size: 24px;
            color: #333;
            margin-right: 11px;
            font-weight: 500;
        }

        .shop-btn {
            background: #333;
            color: #fff;
            text-transform: uppercase;
            padding: 7px 27px;
            border-radius: 20px;
            font-weight: 400;
            font-size: 15px;
        }

        .shop-btn:hover {
            text-decoration: none;

        }

    </style>

    <section style="padding:50px 0px 140px;" class="coupon-section my-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="main-heading">
                        <h3 class="mb-4">Coupons</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($coupons as $coupon)
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="para-box">
                            <div class="box-top">
                                <h1>{{ $coupon->name }}</h1>
                            </div>
                            <div class="box-bottom">
                                <div class="text-center">
                                    <h1><span class="upto">{{ $coupon->discount }}$ Discount</h1>
                                    <div class="shopbtn my-3 mt-5">
                                        <a href="{{ route('coupon.payment.method', $coupon->id) }}"
                                            class="shop-btn">Purchase Now ${{ $coupon->price }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
