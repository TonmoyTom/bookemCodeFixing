<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Appointment;
use App\Models\AppointmentItem;
use App\Models\Promocode;
use App\Models\Service;
use Illuminate\Http\Request;
use PDF;
use Mail;

/**
 * Class BookingApiController
 * @package App\Http\Controllers\Api
 */

class BookingApiController extends ApiBaseController
{
    /**
     * Check applied promocode.
     * POST /booking/apply-promocode
     *
     * @param $request
     *
     * @return Response
     */
    public function applyPromocode(Request $request)
    {
        if ($this->isValidPromocode($request->promocode)) {
            $notification = array(
                'message' => 'Promocode Applied Success!'
            );
        } else {
            $notification = array(
                'message' => 'Invalid Promocode!!'
            );
        }
        return $this->sendResponse($notification);
    }


    private function isValidPromocode($promocode)
    {
        $promocode = Promocode::where('promocode', $promocode)->where('status', 1)
            ->where('start_date', '<', today()->format('Y-d-m'))
            ->where('end_date', '<', today()->format('Y-d-m'))->first();
        return $promocode ? $promocode : abort(404, 'Not valid promocode applied!');
    }

    /**
     * Add in cart a newly created service in storage.
     * POST /clients
     *
     * @param $request
     *
     * @return Response
     */
    public function addToCart(Request $request)
    {
        // if (auth()->check() && auth()->user()->role == 2 && auth()->user()->usertype == 2) {
        if (auth()->check()) {
            $data = array(
                'payment_type' => $request->payment_type,
                'date'         => $request->date,
                'time'         => $request->time,
            );
            $data['service'] = new ServiceResource(Service::where('slug', $request->service)->first());
            $data['route'] = url('/booking/payment');
            return $this->sendResponse($data);
        }
    }

    /**
     * Display Services & details to user for confirmation.
     * POST /booking/checkout
     *
     * @param $request
     *
     * @return Response
     */
    public function checkout(Request $request)
    {
        if (auth()->check() && auth()->user()->role == 2 && auth()->user()->usertype == 2) {
            $data = array(
                'payment_type' => $request->payment_type,
                'date'         => $request->date,
                'time'         => $request->time,
            );
            $data['service'] = new ServiceResource(Service::where('slug', $request->service)->first());
            $data['route'] = url('/booking/payment');
            return $this->sendResponse($data);
        }
    }

    /**
     * Store a newly created Appointment in storage & send email notification.
     * POST /booking/payment
     *
     * @param $request
     *
     * @return Response
     */
    public function payment(AppointmentRequest $request)
    {
        // return $request->all();

        $service = Service::where('slug', $request->service_slug)->first();
        $travel_fee =  $service->provider->service_location == 2 ? $service->provider->travel_fee : 0;

        $promocode_name = $request->filled('promocode') && $this->isValidPromocode($request->promocode)
            ? $this->isValidPromocode($request->promocode)->promocode : 0;
        $promocode_discount = $request->filled('promocode') && $this->isValidPromocode($request->promocode)
            ? $this->isValidPromocode($request->promocode)->discount : 0;

        $payment = $this->saveAppointment($request, $service, $travel_fee, $promocode_discount, $promocode_name);

        $request->filled('promocode') && $this->isValidPromocode($request->promocode)
            ? $this->changePromocodeStatus($this->isValidPromocode($request->promocode)->id) : '';

        $this->sendNotification($payment, $request->payment_type, $service, $promocode_discount, $travel_fee, $request->trasiction_id);

        return $this->sendSuccess('Appointment Successfull!');
    }

    /**
     * Store a newly created Appointment in storage & send email notification.
     * POST /booking/payment
     *
     * @param $request
     *
     * @return Response
     */
    private function saveAppointment($request, $service, $travel_fee, $promocode_discount, $promocode_name)
    {
        if ($service->provider->service_location == 2) {
            if ($service->price_active == 1) {
                $total_amount =  ($service->selling_price + $travel_fee) - $promocode_discount;
            } else {
                $total_amount =  ($service->discount_price + $travel_fee) - $promocode_discount;
            }
        } else {
            if ($service->price_active == 1) {
                $total_amount = $service->selling_price - $promocode_discount;
            } else {
                $total_amount = $service->discount_price - $promocode_discount;
            }
        }
        $id_date  = date('ymd');
        $id_number = Appointment::latest()->first();
        if ($id_number) {
            $removed1char = substr($id_number->appointment_no, 6);
            $generate_id = $stpad = $id_date . str_pad($removed1char + 1, 2, "0", STR_PAD_LEFT);
        } else {
            $generate_id = $id_date . str_pad(1, 2, "0", STR_PAD_LEFT);
        }
        $appoinment = new Appointment;
        $appoinment->appointment_no       = $generate_id;
        $appoinment->user_id              = auth()->user()->id;
        $appoinment->provider_id          = $service->provider->id;
        $appoinment->service_id           = $service->id;
        $appoinment->service_location     = $service->provider->service_location;
        $appoinment->address              = $request->location;
        $appoinment->latitude             = $request->latitude;
        $appoinment->longitude            = $request->longitude;
        if ($service->price_active == 1) {
            $appoinment->service_amount       = $service->selling_price;
        } elseif ($service->price_active == 2) {
            $appoinment->service_amount       = $service->discount_price;
        }
        $appoinment->qty                  = 1;
        $appoinment->travel_fee           = $travel_fee;
        $appoinment->promocode            = $promocode_name;
        $appoinment->promocode_discount   = $promocode_discount;
        $appoinment->date                 = $request->date;
        $appoinment->time                 = $request->time;
        $appoinment->payment_type         = $request->payment_type;
        $appoinment->payment_method       = $request->payment_method;
        $appoinment->balance_transaction  = $request->balance_transaction;
        $appoinment->currency             = $request->currency;
        $appoinment->amount               = $request->payment_type == 'handcash' ? $total_amount : $request->amount;
        $appoinment->payment_status       = $request->payment_type == 'handcash' ? 0 : 1;
        $appoinment->service_status       = 0;
        $appoinment->save();

        //Appointment Item
        if ($appoinment) {
            foreach ($request->items as $key => $item) {
                $appItem = new AppointmentItem();
                $appItem->appointment_id = $appoinment->id;
                $appItem->service_id     = $item['service_id'];
                $appItem->qty            = $item['qty'];
                $appItem->save();
            }
        }
        return $appoinment;
    }

    private function changePromocodeStatus($id)
    {
        Promocode::findOrFail($id)->update(['status' => 0]);
    }

    private function sendNotification($payment, $payment_type, $service, $promocode_discount, $travel_fee, $trasiction_id)
    {


        $data = array(
            'invoice_no' => $payment->appointment_no,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'address' => auth()->user()->address,
            'payment_method' => $payment_type,
            'booking_date' => \Carbon\Carbon::parse($payment->created_at)->format('d M Y'),
            'service' => $service->name,
            'location' => $service->provider->address,
            'date' => $payment->date,
            'time' => $payment->time,
            'service_fee' => $service->selling_price,
            'travel_fee' => $travel_fee,
            'coupon_discount' => $promocode_discount,
            'transaction_id' => $trasiction_id ?? Null,
            'total' => $payment->amount,
        );


        $pdf = PDF::loadView('frontend.email.payment-invoice', $data)->setOptions(['defaultFont' => 'sans-serif',]);
        $pdfname = 'justbook3m_' . uniqid() . '.pdf';

        Mail::send('frontend.email.blank', $data, function ($message) use ($data, $pdf, $pdfname) {
            $message->to($data['email']);
            $message->subject('Thanks for payment!');
            $message->attachData($pdf->output(), $pdfname);
        });
    }


    public function serviceDelete($id)
    {
        $service = AppointmentItem::find($id);
        if ($service) {
            $service->delete();
            return $this->sendSuccess("Service Deleted Successfull");
        }
        return $this->sendError("Service Not Fond");
    
    }


    public function appoinmentDelete($id)
    {
        $appoinment = Appointment::find($id);
        if ($appoinment) {
            $appoinment->delete();
            return $this->sendSuccess("Appoinment Deleted Successfull");
        }
        return $this->sendError("Appoinment Not Fond");
    }
}
