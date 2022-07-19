@if (Cart::count())
    <style>
        .fixCart-on {
            right: 5px !important;
            left: inherit !important;
            transition: 1s !important;
        }

    </style>
@endif


<div class="fc-box">
    <a href="{{ route('checkout') }}">
        <span class="fcb-qty">{{ Cart::count() }}</span>
        <span class="fcb-total">${{ Cart::total() }}</span>
        <span class="fcb-con">Continue</span>
    </a>
</div>
