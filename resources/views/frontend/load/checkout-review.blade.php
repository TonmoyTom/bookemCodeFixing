<div class="subs-review-table">
    @php

    if (Session::has('promocode')) {
    $promocode_name = Session::get('promocode')['name'];
    $promocode_discount = Session::get('promocode')['discount'];
    } else {
    $promocode_name = '';
    $promocode_discount = 0;
    }
    $total_mins = 0;

    $ic = App\User::where('ic_provider_id',$provider->id)->get();
    $employee = App\User::where('providertype',3)->where('ic_provider_id',$provider->id)->get();

    @endphp
    <table>

        <style>
            .check-item-tr td {
                font-weight: bold !important;
            }

            .ic_and_employee a {
                text-decoration: none;
                color: #333;
                cursor: pointer;
            }

            .ic-img {
                width: 40px;
                height: 40px;
                padding: 3px;
                border-radius: 50%;
            }

            .ic-name {
                font-size: 15px;
                margin-top: 5px;
            }

            .select-ic-box {
                /* border: 1px solid #ddd; */
                border-radius: 7px;
                padding-left: 30px;
                width: 400px;
                background: #e6e6e6;
            }
        </style>

        @foreach (Cart::content() as $service)
        @php
        $service_minutes = $service->options->service_total_min;

        $hours = floor($service_minutes / 60);
        $min = $service_minutes - $hours * 60;

        $tmm = $service->options->service_total_min;
        $total_mins = $total_mins + $tmm;

        $total_hours = floor($total_mins / 60);
        $total_min = $total_mins - $total_hours * 60;
        $user =  App\User::findOrFail($service->options->vendorId);
        @endphp
        <tr class="check-item-tr">
            <td>{{ $service->name }} ({{$user->name}}) <span>(x{{$service->qty}})</span></td>
            <td class="text-right">
                ${{ $service->options->priceInput }} <span style="font-weight: normal">(@if ($hours != 0)
                    {{ $hours }}h
                    @endif{{ $min }}min)</span>
            </td>
            <td class="text-center"><span type="button" class="cartdelete" id="{{ $service->rowId }}" style="cursor: pointer; padding: 3px 6px; background: #f5f5f5; border-radius:4px;">X</span></td>
        </tr>
        @endforeach

        {{-- <tr>
            <td>Travel fee</td>
            <td class="text-right">
                @if (@$provider->service_location == 2)
                    $<span id="trvl_fee"></span>
                @else
                    $0
                @endif
            </td>
            <td></td>
        </tr> --}}
        <tr>
            <td>Booking fee</td>
            <td class="text-right">
                ${{ $setting->booking_fee }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Cupon Discount @if (Session::has('promocode'))
                - <b>( {{ @$promocode_name }} ) <a href="javascript:;" id="removeCoupon" title="Remove">X</a></b>
                @endif
            </td>
            <td class="text-right">
                @php
                    $ertrt = 0;
                @endphp
                @foreach (Cart::content() as $cupon_price)
               @php
                    $ertrt += $cupon_price->options->cupon_price;
               @endphp

                @endforeach
                ${{$ertrt}}
            </td>
            <td></td>
        </tr>
        <tr class="sr-border">
            <td>
                <h6>Total Billed (@if ($total_hours != 0)
                    {{ $total_hours }}h
                    @endif{{ $total_min }}min)
                </h6>
            </td>
            <td class="text-right">
                <h6>
                    ${{ ( Cart::total() + $setting->booking_fee ) }}

                    <span style="font-weight: normal"> + Travel fee @if (@$provider->service_location == 2) <b>$<span id="trvl"></span></b> @else <b>$0</b> @endif</span>

                </h6>
            </td>
            <td></td>
        </tr>
    </table>
    <hr class="mt-0">
</div>
