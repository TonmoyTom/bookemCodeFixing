<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CouponPayment;
use App\Models\Promocode;
use Auth;
use Illuminate\Http\Request;

class CouponPaymentController extends Controller
{
    public function paymentMethod($id){

        if (Auth::check() && Auth::user()->usertype == 2) {
            $data['coupon'] = Promocode::find($id);
            return view('frontend.coupon-payment',$data);
        }else{
            $notification = array(
                'message' => 'Please at first login as a general user!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


    }

    public function payment (Request $request)
    {
        $coupon = Promocode::find($request->coupon_id);

        \Stripe\Stripe::setApiKey('sk_test_51KWd2wJCIneuWHgB6h7TW2DrL4J3fj1HdFbvlClz8hJzQUd40eGfNrNIG3Cwt3MKqSO5A1qSq8oKTfuTVu9BOJFr00scNXIAGF');

        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $coupon->price * 100,
            'currency' => 'USD',
            'description' => 'Coupon purchase payment',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        $id_date  = date('ymd');
        $id_number = CouponPayment::latest()->first();
        if ($id_number) {
            $removed1char = substr($id_number->order_no, 6);
            $generate_id = $stpad = $id_date . str_pad($removed1char + 1, 2, "0", STR_PAD_LEFT);
        } else {
            $generate_id = $id_date . str_pad(1, 2, "0", STR_PAD_LEFT);
        }


        $payment = new CouponPayment();
        $payment->order_no             = $generate_id;
        $payment->user_id              = auth()->user()->id;
        $payment->coupon_id            = $request->coupon_id;

        $payment->payment_id           = $charge->id;
        $payment->payment_type         = "Stripe";
        $payment->payment_method       = $charge->payment_method;
        $payment->balance_transaction  = $charge->balance_transaction;
        $payment->currency             = $charge->currency;
        $payment->amount               = $coupon->price;

        $payment->payment_status       = 1;
        $paymentSave = $payment->save();


        if($paymentSave){
            $coupon->purchase_by = auth()->user()->id;
            $coupon->payment_id = $payment->id;
            $coupon->status = 1;
            $coupon->save();
        }


        //Send mail
        // $invo_service = AppointmentItem::where('appointment_id', $payment->id)->get();
        // $data = array(
        //     'invoice_no' => $payment->appointment_no,
        //     'name' => Auth::user()->name,
        //     'email' => Auth::user()->email,
        //     'address' => Auth::user()->address,
        //     'payment_method' => $charge->payment_method,
        //     'booking_date' => \Carbon\Carbon::parse($payment->created_at)->format('d M Y'),
        //     'date' => $payment->date,
        //     'invo_service' => $invo_service,
        //     'start_time' => $payment->start_time,
        //     'end_time' => $payment->end_time,
        //     'service_address_at' => $payment->service_location,
        //     'service_address' => $payment->address,
        //     'booking_to' => $provider->business_name,
        //     'ic' => $payment->ic->business_name,
        //     'subtotal' => $payment->subtotal,
        //     'booking_fee' => $payment->booking_fee,
        //     'travel_fee' => $payment->travel_fee,
        //     'coupon_discount' => $promocode_discount,
        //     'total_amount' => $payment->amount,
        //     'transaction_id' => $charge->balance_transaction,

        // );

        // $pdf = PDF::loadView('frontend.email.payment-invoice', $data)->setOptions(['defaultFont' => 'sans-serif',]);
        // $pdfname = 'book3m_' . uniqid() . '.pdf';

        // Mail::send('frontend.email.blank', $data, function ($message) use ($data, $pdf, $pdfname) {
        //     $message->to($data['email']);
        //     $message->subject('Thanks for payment!');
        //     $message->attachData($pdf->output(), $pdfname);
        // });

        $notification = array(
            'message' => 'Payment successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('my.cupon.index')->with($notification);
    }

}
