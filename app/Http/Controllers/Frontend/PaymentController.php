<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentItem;
use App\Models\Promocode;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Str;
use Validator;
use Carbon\Carbon;
use Auth;
use Mail;
use App\User;
use GlobalPayments\Api\PaymentMethods\CreditCardData;
use GlobalPayments\Api\ServicesContainer;
use GlobalPayments\Api\Entities\Address;
use GlobalPayments\Api\ServiceConfigs\Gateways\PorticoConfig;
use Session;
use PDF;
use Cart;
use DateTime;
use Exception;

class PaymentController extends Controller
{

    public function paymentMethod(Request $request)
    {


        if (Auth::check() && Auth::user()->role == 2 && Auth::user()->usertype == 2) {
            $provider = '';
            foreach (Cart::content() as $cont) {
                $prov = User::where('id', $cont->options->vendorId)
                    ->latest()
                    ->first();
                $provider = $prov;
            }

             $data = array(
                'payment_type'       => $request->payment_type,
                'date'               => $request->toDate,
                'time'               => $request->date_time,
                'provider'           => $provider,
                'address'            => $request->address,
                'latitude'           => $request->latitude,
                'longitude'          => $request->longitude,
                'travel_fee'         => $request->travel_fee,
                'current_location'   => $request->current_location,
                'current_lat'        => $request->current_lat,
                'current_lon'        => $request->current_lon,
            );

            return view('frontend.payment', $data);
        } else {

            $notification = array(
                'message' => 'Please at first login as a user!',
                'alert-type' => 'info'
            );
            return redirect()->route('user.login')->with($notification);
        }
    }

    public function paymentMethodStripe(Request $request)
    {


        $setting = Setting::latest()->first();

        $time = $request->time;
        $start_time = (substr($time, 0, 20));
        $end_time = (substr($time, 20, 20));


            $cuponDiscount = 0;
            $price = 0;
            $subTotal = 0;
        $provider = '';
        foreach (Cart::content() as $cont) {
            $prov = User::where('id', $cont->options->vendorId)
                ->latest()
                ->first();
            $provider = $prov;
            $cuponDiscount += $cont->options->cupon_price;
            $price += $cont->price;
            $subTotal = $cuponDiscount +   $price;
        }

        if ($provider->service_location == 2) {
            $travel_fee = (float) str_replace(',', '', $request->travel_fee);
        } else {
            $travel_fee = 0;
        }

        if (Session::has('promocode')) {
            $promocode_name = Session::get('promocode')['name'];
            $promocode_discount = Session::get('promocode')['discount'];
        } else {
            $promocode_name = 'N/A';
            $promocode_discount = 0;
        }

        if ($provider->service_location == 2) {
            $total_amount =  (Cart::total() + $travel_fee + $setting->booking_fee);
        } else {
            $total_amount = (Cart::total() + $setting->booking_fee);
        }

        \Stripe\Stripe::setApiKey('sk_test_51KWd2wJCIneuWHgB6h7TW2DrL4J3fj1HdFbvlClz8hJzQUd40eGfNrNIG3Cwt3MKqSO5A1qSq8oKTfuTVu9BOJFr00scNXIAGF');
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100,
            'currency' => 'usd',
            'description' => 'Appointment payment',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        $id_date  = date('ymd');
        $id_number = Appointment::latest()->first();
        if ($id_number) {
            $removed1char = substr($id_number->appointment_no, 6);
            $generate_id = $stpad = $id_date . str_pad($removed1char + 1, 2, "0", STR_PAD_LEFT);
        } else {
            $generate_id = $id_date . str_pad(1, 2, "0", STR_PAD_LEFT);
        }




        $payment = new Appointment;
        $payment->appointment_no       = $generate_id;

        $payment->user_id              = Auth::user()->id;
        if($provider->ic_provider_id != null){
            $payment->provider_id          = $provider->ic_provider_id;
            $payment->ic_id                = $provider->id;
        }else{
            $payment->ic_id                = $provider->id;
        }

        $payment->service_location     = $provider->service_location;

        if ($provider->service_location == 1) {

            $payment->address              = $provider->address;
            $payment->latitude             = $provider->latitude;
            $payment->longitude            = $provider->longitude;
        } else {
            if ($request->current_location == 1) {

                $geocoder = new \OpenCage\Geocoder\Geocoder('ccca77a9827e42a7a4559d0aa80e88ef');
                $result = $geocoder->geocode("$request->current_lat,$request->current_lon"); # latitude,longitude (y,x)
                $mainLoc = $result['results'][0]['formatted'];

                $payment->address              = $mainLoc;
                $payment->latitude             = $request->current_lat;
                $payment->longitude            = $request->current_lon;
            } else {

                $payment->address              = $request->address;
                $payment->latitude             = $request->latitude;
                $payment->longitude            = $request->longitude;
            }
        }


        $payment->subtotal             = $subTotal;
        $payment->booking_fee          = $setting->booking_fee;
        $payment->travel_fee           = $travel_fee;

        $payment->promocode            = $promocode_name;
        $payment->promocode_discount   = $cuponDiscount;

        $payment->date                 = $request->date;
        $payment->start_time           = $start_time;
        $payment->end_time             = $end_time;

        $payment->payment_id           = $charge->id;
        $payment->payment_type         = "Stripe";
        $payment->payment_method       = $charge->payment_method;
        $payment->balance_transaction  = $charge->balance_transaction;
        $payment->currency             = $charge->currency;

        $payment->payable_amount       = $total_amount;
        $payment->amount               = $total_amount;

        $payment->payment_status       = 1;
        $payment->service_status       = 0;
        $payment->save();

        //Appointment Item
        foreach (Cart::content() as $row) {
            $appItem = new AppointmentItem();
            $appItem->employee_id = $row->id;
            $appItem->appointment_id = $payment->id;
            $appItem->service_id     = $row->options->serviceId;
            $appItem->price     = $row->price;
            $appItem->qty            = 1;
            $appItem->discount_price  = $row->options->cupon_price;
            $appItem->save();
        }

        Cart::destroy();
        // if (Session::has('promocode')) {
        //     Session::forget('promocode');
        // }

        //Send sms to phone

        // try {

        //     $basic  = new \Nexmo\Client\Credentials\Basic('ca4251e4', 'oFFH666dg7zATqzZ');
        //     $client = new \Nexmo\Client($basic);

        //     $receiverNumber = Auth::user()->mobile;
        //     $message = "Thanks for appointment";

        //     $message = $client->message()->send([
        //         'to' => $receiverNumber,
        //         'from' => 'Book3m',
        //         'text' => $message
        //     ]);
        // } catch (Exception $e) {
        //     dd("Error: " . $e->getMessage());
        // }


        //Send mail
        $invo_service = AppointmentItem::where('appointment_id', $payment->id)->get();
        $data = array(
            'invoice_no' => $payment->appointment_no,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'address' => Auth::user()->address,
            'payment_method' => $payment->payment_method,
            'booking_date' => \Carbon\Carbon::parse($payment->created_at)->format('d M Y'),
            'date' => $payment->date,
            'invo_service' => $invo_service,
            'start_time' => $payment->start_time,
            'end_time' => $payment->end_time,
            'service_address_at' => $payment->service_location,
            'service_address' => $payment->address,
            'booking_to' => $provider->business_name,
            'ic' => @$payment->ic->business_name,
            'subtotal' => $payment->subtotal,
            'booking_fee' => $payment->booking_fee,
            'travel_fee' => $payment->travel_fee,
            'coupon_discount' => $cuponDiscount,
            'total_amount' => $payment->amount,
            'transaction_id' => $payment->balance_transaction,

        );

//        $pdf = PDF::loadView('frontend.email.payment-invoice', $data)->setOptions(['defaultFont' => 'sans-serif',]);
//        $pdfname = 'book3m_' . uniqid() . '.pdf';
//
//        Mail::send('frontend.email.blank', $data, function ($message) use ($data, $pdf, $pdfname) {
//            $message->to($data['email']);
//            $message->subject('Thanks for payment!');
//            $message->attachData($pdf->output(), $pdfname);
//        });

        $notification = array(
            'message' => 'Successfully Appointment Created!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.dashboard')->with($notification);
    }



    // public function paymentMethodHeartland(Request $request)
    // {

    //     $service = Service::where('slug', $request->service_slug)->first();
    //     $provider = User::where('id', $service->provider_id)->first();

    //     if ($provider->service_location == 2) {
    //         $travel_fee = $provider->travel_fee;
    //     } else {
    //         $travel_fee = 0;
    //     }

    //     if (Session::has('promocode')) {
    //         $promocode_name = Session::get('promocode')['name'];
    //         $promocode_discount = Session::get('promocode')['discount'];
    //     } else {
    //         $promocode_name = 'N/A';
    //         $promocode_discount = 0;
    //     }

    //     if ($provider->service_location == 2) {
    //         if ($service->price_active == 1) {
    //             $total_amount =  ($service->selling_price + $travel_fee) - $promocode_discount;
    //         } else {
    //             $total_amount =  ($service->discount_price + $travel_fee) - $promocode_discount;
    //         }
    //     } else {
    //         if ($service->price_active == 1) {
    //             $total_amount = $service->selling_price - $promocode_discount;
    //         } else {
    //             $total_amount = $service->discount_price - $promocode_discount;
    //         }
    //     }


    //     /*get exp month and year*/
    //     $cardExp = $request->cardExpiration;
    //     $cardExpMonth = floatvalue(substr($cardExp, 0, 2));
    //     $cardExpYear = floatvalue(substr($cardExp, 5));

    //     $cardNumber = floatvalue($request->cardNumber);
    //     $insCardNumber = floatvalue(substr($request->cardNumber, -4));

    //     $cardCvn = floatvalue($request->cardCvv);

    //     /*return gettype($request->cardNumber);*/

    //     $config = new PorticoConfig();
    //     $config->secretApiKey = 'skapi_cert_McAiAgD-AQAAgWMUY83hKIQMM-WxHGae6DI6kVnigg';
    //     $config->serviceUrl = 'https://cert.api2.heartlandportico.com';
    //     ServicesContainer::configureService($config);
    //     $card = new CreditCardData();
    //     $card->number = $cardNumber;
    //     $card->expMonth = $cardExpMonth;
    //     $card->expYear = $cardExpYear;
    //     $card->cvn = $cardCvn;
    //     try {
    //         // create the delayed capture authorization
    //         $response = $card->charge($total_amount)
    //             ->withCurrency("USD")
    //             ->execute();
    //     } catch (ApiException $e) {
    //         // TODO: Add your error handling here
    //     }
    //     if (isset($response)) {



    //         $id_date  = date('ymd');
    //         $id_number = Appointment::latest()->first();
    //         if ($id_number) {
    //             $removed1char = substr($id_number->appointment_no, 6);
    //             $generate_id = $stpad = $id_date . str_pad($removed1char + 1, 2, "0", STR_PAD_LEFT);
    //         } else {
    //             $generate_id = $id_date . str_pad(1, 2, "0", STR_PAD_LEFT);
    //         }

    //         $payment = new Appointment;
    //         $payment->appointment_no       = $generate_id;

    //         $payment->user_id              = Auth::user()->id;
    //         $payment->provider_id          = $provider->id;
    //         $payment->service_id           = $service->id;

    //         $payment->service_location     = $provider->service_location;
    //         $payment->address              = $request->location;
    //         $payment->latitude             = $request->latitude;
    //         $payment->longitude            = $request->longitude;

    //         if ($service->price_active == 1) {
    //             $payment->service_amount       = $service->selling_price;
    //         } elseif ($service->price_active == 2) {
    //             $payment->service_amount       = $service->discount_price;
    //         }

    //         $payment->qty                  = 1;
    //         $payment->travel_fee           = $travel_fee;

    //         $payment->promocode            = $promocode_name;
    //         $payment->promocode_discount   = $promocode_discount;

    //         $payment->date                 = $request->date;
    //         $payment->time                 = $request->time;

    //         $payment->payment_type         = "Heartland";
    //         $payment->payment_method       = $response->cardType;
    //         $payment->balance_transaction  = $response->transactionId;
    //         $payment->currency             = "usd";
    //         $payment->amount               = $total_amount;

    //         $payment->payment_status       = 1;
    //         $payment->service_status       = 0;


    //         $payment->save();


    //         /*$info = array(
    //                 'email' => Auth::user()->email,
    //                 'name' => Auth::user()->name,
    //                 'address' => Auth::user()->address,
    //                 'mobile' => Auth::user()->mobile,
    //                 'invoice_date' => \Carbon\Carbon::parse($payment->created_at)->format('d M Y'),
    //                 'item' => $advertisement->size->name,
    //                 'height' => $advertisement->size->height,
    //                 'width' => $advertisement->size->width,
    //                 'rate' => $advertisement->amount,
    //                 'qty' => 1,
    //                 'total_price' => $advertisement->amount,
    //                 'paid_amount' => $payment->amount,
    //                 'appointment_no' => $payment->appointment_no,
    //             );

    //             Mail::send('frontend.email.payment-invoice',$info, function($message) use($info) {
    //                 $message->from('ajkalnews21@gmail.com', 'Ajkal News');
    //                 $message->to($info['email']);
    //                 $message->subject('Thanks for payment!');
    //             });*/

    //         return response()->json([
    //             'message' => 'Payment successfully!',
    //         ]);
    //     }
    // }

    public function paymentMethodHandcash(Request $request)
    {

        $setting = Setting::latest()->first();

        $time = $request->time;
        $start_time = (substr($time, 0, 20));
        $end_time = (substr($time, 20, 20));
        $cuponDiscount = 0;
        $provider = '';
        foreach (Cart::content() as $cont) {
            $prov = User::where('id', $cont->options->provider_id)
                ->latest()
                ->first();
            $provider = $prov;
            $cuponDiscount += $cont->ptions->cupon_price;
        }

        if ($provider->service_location == 2) {
            $travel_fee = floatvalue($request->travel_fee);
        } else {
            $travel_fee = 0;
        }

        if (Session::has('promocode')) {
            $promocode_name = Session::get('promocode')['name'];
            $promocode_discount = Session::get('promocode')['discount'];
        } else {
            $promocode_name = 'N/A';
            $promocode_discount = 0;
        }

        if ($provider->service_location == 2) {
            $total_amount =  (Cart::total() + $travel_fee + $setting->booking_fee) - $promocode_discount;
        } else {
            $total_amount = (Cart::total() + $setting->booking_fee) - $promocode_discount;
        }


        $id_date  = date('ymd');
        $id_number = Appointment::latest()->first();
        if ($id_number) {
            $removed1char = substr($id_number->appointment_no, 6);
            $generate_id = $stpad = $id_date . str_pad($removed1char + 1, 2, "0", STR_PAD_LEFT);
        } else {
            $generate_id = $id_date . str_pad(1, 2, "0", STR_PAD_LEFT);
        }


        $payment = new Appointment;
        $payment->appointment_no       = $generate_id;

        $payment->user_id              = Auth::user()->id;
        $payment->provider_id          = $provider->id;
        $payment->ic_id                = $request->ic_id;

        $payment->service_location     = $provider->service_location;
        if ($provider->service_location == 1) {
            $payment->address              = $provider->address;
            $payment->latitude             = $provider->latitude;
            $payment->longitude            = $provider->longitude;
        } else {
            $payment->address              = $request->address;
            $payment->latitude             = $request->latitude;
            $payment->longitude            = $request->longitude;
        }


        $payment->subtotal             = Cart::total();
        $payment->booking_fee          = $setting->booking_fee;
        $payment->travel_fee           = $travel_fee;

        $payment->promocode            = $promocode_name;
        $payment->promocode_discount   = $promocode_discount;

        $payment->date                 = $request->date;
        $payment->start_time           = $start_time;
        $payment->end_time             = $end_time;

        $payment->payment_id           = 'N/A';
        $payment->payment_type         = "Hand Cash";
        $payment->payment_method       = 'N/A';
        $payment->balance_transaction  = 'N/A';
        $payment->currency             = 'N/A';

        $payment->payable_amount       =  $total_amount;
        $payment->amount               =  0;

        $payment->payment_status       = 0;
        $payment->service_status       = 0;
        $payment->save();

        //Appointment Item
        foreach (Cart::content() as $row) {
            $appItem = new AppointmentItem();
            $appItem->employee_id = $row->id;
            $appItem->appointment_id = $payment->id;
            $appItem->service_id     = $row->options->serviceId;
            $appItem->price     = $row->price;
            $appItem->qty            = 1;
            $appItem->save();
        }

        Cart::destroy();
        if (Session::has('promocode')) {
            Session::forget('promocode');
        }

        //Send sms to phone
        try {

            $basic  = new \Nexmo\Client\Credentials\Basic('ca4251e4', 'oFFH666dg7zATqzZ');
            $client = new \Nexmo\Client($basic);

            $receiverNumber = Auth::user()->mobile;
            $message = "Thanks for appointment";

            $message = $client->message()->send([
                'to' => $receiverNumber,
                'from' => 'Book3m',
                'text' => $message
            ]);
        } catch (Exception $e) {
            dd("Error: " . $e->getMessage());
        }


        //Send mail
        $invo_service = AppointmentItem::where('appointment_id', $payment->id)->get();
        $data = array(
            'invoice_no' => $payment->appointment_no,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'address' => Auth::user()->address,
            'payment_method' => $payment->payment_method,
            'booking_date' => \Carbon\Carbon::parse($payment->created_at)->format('d M Y'),
            'date' => $payment->date,
            'invo_service' => $invo_service,
            'start_time' => $payment->start_time,
            'end_time' => $payment->end_time,
            'service_address_at' => $payment->service_location,
            'service_address' => $payment->address,
            'booking_to' => $provider->business_name,
            'ic' => $payment->ic->business_name,
            'subtotal' => $payment->subtotal,
            'booking_fee' => $payment->booking_fee,
            'travel_fee' => $payment->travel_fee,
            'coupon_discount' => $promocode_discount,
            'total_amount' => $payment->amount,
            'transaction_id' => $payment->balance_transaction,

        );

        $pdf = PDF::loadView('frontend.email.payment-invoice', $data)->setOptions(['defaultFont' => 'sans-serif',]);
        $pdfname = 'book3m_' . uniqid() . '.pdf';

        Mail::send('frontend.email.blank', $data, function ($message) use ($data, $pdf, $pdfname) {
            $message->to($data['email']);
            $message->subject('Thanks for payment!');
            $message->attachData($pdf->output(), $pdfname);
        });

        $notification = array(
            'message' => 'Successfully Appointment Created!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.dashboard')->with($notification);
    }


    public function refundMoney($id)
    {

        $appoint = Appointment::find($id);

        $main_amountt = $appoint->amount;
        $refund_amount = $main_amountt - 20;

        $charge = $appoint->payment_id;

        \Stripe\Stripe::setApiKey('sk_test_51KWd2wJCIneuWHgB6h7TW2DrL4J3fj1HdFbvlClz8hJzQUd40eGfNrNIG3Cwt3MKqSO5A1qSq8oKTfuTVu9BOJFr00scNXIAGF');

        $refund = \Stripe\Refund::create([
            'charge' => $charge,
            'amount' => $refund_amount * 100,
            'reason' => 'requested_by_customer'
        ]);

        if ($refund) {
            $appoint->payment_status = 2;
            $appoint->save();
        }

        $notification = array(
            'message' => 'Money refund successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
