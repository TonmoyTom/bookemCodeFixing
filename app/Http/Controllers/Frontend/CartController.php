<?php

namespace App\Http\Controllers\Frontend;

use App\BusinessHourUpdate;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Service;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DatePeriod;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Session;
use App\User;
use Facade\FlareClient\Http\Response;
use View;
use App\Models\Setting;

class CartController extends Controller
{

    public function store(Request $request, $id)
    {

        $serviceId = '';
        foreach(Cart::content() as $serviceId){
            $serviceId = $serviceId->options->serviceId;
        }


        $user = User::where('id' , $request->vendorId)->first();

        $service = Service::where('id', $request->serviceId)->first();

        if (Auth::check() && Auth::user()->usertype == 2) {
            if( $serviceId == $request->serviceId){
                return response()->json(['error' => 'You have already added this service!']);
            }
             else {
                $data['id'] = $id;
                $data['name'] = $service->name;
                $data['qty'] = 1;
                $data['price'] = $request->totalPriceInput;
                $data['weight'] = $request->serviceId;
                $data['options']['slug'] = $service->slug;
                $data['options']['serviceId'] = $request->serviceId;
                $data['options']['vendorId'] = $request->vendorId;
                $data['options']['provider_id'] = $service->provider_id;
                $data['options']['service_total_min'] = $service->service_total_min;
                $data['options']['cupon_price'] = $request->coupnInput;
                $data['options']['priceInput'] = $request->priceInput;
                $data['options']['userId'] = $request->userId;

                Cart::add($data);

                return response()->json(['success' => 'Added Successfully!']);
            }
        }
         else {
            return response()->json(['error' => 'Please at first login as a general user!']);
        }
    }



    public function fixCart()
    {
        return view('frontend.load.fix-cart');
    }

    public function checkoutCart(Request $request)
    {

        $provider = '';
        foreach (Cart::content() as $cont) {
            $prov = User::where('id', $cont->options->vendorId)
                ->latest()
                ->first();
            $provider = $prov;
        }

      if($provider && $provider->ic_status == 0 &&  $provider->ic_provider_id == null ){
        $bh = BusinessHourUpdate::where(['provider_id'=> $provider->id , 'saloon_id' => null])->first();
      }else{
        $bh = BusinessHourUpdate::where(['provider_id'=> $provider->id , 'saloon_id' => $provider->ic_provider_id] )->first();
      }
      if($bh == null){
        return response()->json([
            'Time Schedule  Not Found'
        ], 404);
      }

        $date = Carbon::now();
        $day = $date->englishDayOfWeek;

        if($day == "Saturday"){
            $schedule = [
                'start' => date('Y-m-d') . ' ' . $bh->sat_s,
                'end' => date('Y-m-d') . ' ' . $bh->sat_e,
            ];
        }elseif($day == "Sunday"){
            $schedule = [
                'start' => date('Y-m-d') . ' ' . $bh->san_s,
                'end' => date('Y-m-d') . ' ' . $bh->san_e,
            ];
        }elseif($day == "Monday"){
            $schedule = [
                'start' => date('Y-m-d') . ' ' . $bh->mon_s,
                'end' => date('Y-m-d') . ' ' . $bh->mon_e,
            ];
        }elseif($day == "Tuesday"){
            $schedule = [
                'start' => date('Y-m-d') . ' ' . $bh->tus_s,
                'end' => date('Y-m-d') . ' ' . $bh->tus_e,
            ];
        }elseif($day == "Wednesday"){
            $schedule = [
                'start' => date('Y-m-d') . ' ' . $bh->wen_s,
                'end' => date('Y-m-d') . ' ' . $bh->wen_e,
            ];
        }elseif($day == "Thursday"){
            $schedule = [
                'start' => date('Y-m-d') . ' ' . $bh->thus_s,
                'end' => date('Y-m-d') . ' ' . $bh->thus_e,
            ];
        }elseif($day == "Friday"){
            $schedule = [
                'start' => date('Y-m-d') . ' ' . $bh->fri_s,
                'end' => date('Y-m-d') . ' ' . $bh->fri_e,
            ];
        }


        $start = Carbon::instance(new DateTime($schedule['start']));
        $end = Carbon::instance(new DateTime($schedule['end']));


        if($provider && $provider->ic_status == 0 &&  $provider->ic_provider_id == null ){
            $events = Appointment::where('provider_id' , $bh->provider_id)->select('start_time', 'end_time')->get();
        }else{
            $events = Appointment::where(['provider_id' => $provider->ic_provider_id , 'ic_id' => $bh->provider_id])->select('start_time', 'end_time')->get();
        }


        $total_min = 0;
        foreach (Cart::content() as $service) {
            $tmm = $service->options->service_total_min;
            $total_min = $total_min + $tmm;
        }

        $minSlotHours = floor($total_min / 60);
        $remMIN = $total_min % 60;


        $minInterval = CarbonInterval::hour($minSlotHours)->minutes($remMIN);


        $reqSlotHours = 0;
        $reqSlotMinutes = $total_min;
        $data['reqInterval'] = CarbonInterval::hour($reqSlotHours)->minutes($reqSlotMinutes);


        $data['events'] = $events;
        $data['slots'] = new DatePeriod($start, $minInterval, $end);


        $data['provider'] = $provider;
        $data['toDate'] = new DateTime($schedule['start']);


        return view('frontend.load.checkout', $data);
    }
    public function checkoutAjax(Request $request)
    {

        $provider = '';
        foreach (Cart::content() as $cont) {
            $prov = User::where('id', $cont->options->vendorId)
                ->latest()
                ->first();
            $provider = $prov;
        }
        
        if ($provider && $provider->ic_status == 0 && $provider->ic_provider_id == null ){
            $bh = BusinessHourUpdate::where(['provider_id'=> $provider->id , 'saloon_id' => null])->first();
        }else{
            $bh = BusinessHourUpdate::where(['provider_id'=> $provider->id , 'saloon_id' => $provider->ic_provider_id] )->first();
        }
        if($bh == null){
            return response()->json([
                'Time Schedule  Not Found'
            ], 404);
        }



        $paymentDate = date($request->start);
        $day = Carbon::createFromFormat('Y-m-d', $paymentDate)->format('l');


        if($day == "Saturday"){
            $schedule = [
                'start' => $request->start . ' ' . $bh->sat_s,
                'end' => $request->start . ' ' . $bh->sat_e,
            ];
        }elseif($day == "Sunday"){
            $schedule = [
                'start' => $request->start . ' ' . $bh->san_s,
                'end' => $request->start . ' ' . $bh->san_e,
            ];
        }elseif($day == "Monday"){
            $schedule = [
                'start' => $request->start . ' ' . $bh->mon_s,
                'end' => $request->start . ' ' . $bh->mon_e,
            ];
        }elseif($day == "Tuesday"){
            $schedule = [
                'start' => $request->start . ' ' . $bh->tus_s,
                'end' => $request->start . ' ' . $bh->tus_e,
            ];
        }elseif($day == "Wednesday"){
            $schedule = [
                'start' => $request->start . ' ' . $bh->wen_s,
                'end' => $request->start . ' ' . $bh->wen_e,
            ];
        }elseif($day == "Thursday"){
            $schedule = [
                'start' => $request->start . ' ' . $bh->thus_s,
                'end' => $request->start . ' ' . $bh->thus_e,
            ];
        }elseif($day == "Friday"){
            $schedule = [
                'start' => $request->start . ' ' . $bh->fri_s,
                'end' => $request->start . ' ' . $bh->fri_e,
            ];
        }

        $start = Carbon::instance(new DateTime($schedule['start']));
        $end = Carbon::instance(new DateTime($schedule['end']));

        if($provider && $provider->ic_status == 0 && $provider->ic_provider_id == null ){
            $events = Appointment::where('provider_id' , $bh->provider_id)->select('start_time', 'end_time')->get();
        }else{
            $events = Appointment::where(['provider_id' => $provider->ic_provider_id , 'ic_id' => $bh->provider_id])->select('start_time',  'end_time')->get();
        }





        $total_min = 0;
        foreach (Cart::content() as $service) {
            $tmm = $service->options->service_total_min;
            $total_min = $total_min + $tmm;
        }

        $minSlotHours = floor($total_min / 60);
        $remMIN = $total_min % 60;

        $minInterval = CarbonInterval::hour($minSlotHours)->minutes($remMIN);




        $reqSlotHours = 0;
        $reqSlotMinutes = $total_min;

        $data['reqInterval'] = CarbonInterval::hour($reqSlotHours)->minutes($reqSlotMinutes);
        $data['events'] = $events;
        $data['slots'] = new DatePeriod($start, $minInterval, $end);




        $provider = '';
        foreach (Cart::content() as $cont) {
            $prov = User::where('id', $cont->options->provider_id)
                ->latest()
                ->first();
            $provider = $prov;
        }

        $data['provider'] = $provider;
        $data['toDate'] = new DateTime($schedule['start']);

        $html_view = view('frontend.load.checkout', $data)->render();
        return response()->json($html_view);
    }

    public function checkRev()
    {
        $provider = '';
        foreach (Cart::content() as $cont) {
            $prov = User::where('id', $cont->options->provider_id)
                ->latest()
                ->first();
            $provider = $prov;
        }

        $data['provider'] = $provider;

        return view('frontend.load.checkout-review', $data );
    }

    public function cartdelete($id)
    {
        $data = Cart::remove($id);
        return response()->json(Cart::count());
    }

    public function distance(Request $request)
    {

        $provider = '';
        foreach (Cart::content() as $cont) {
            $prov = User::where('id', $cont->options->provider_id)
                ->latest()
                ->first();
            $provider = $prov;
        }

        $lat1 = $provider->latitude;
        $long1 = $provider->longitude;

        $lat2 = $request->lat; // user's longitude
        $long2 = $request->long; // user's longitude

        $theta = $long1 - $long2;
        $miles = (sin(deg2rad($lat1))) * sin(deg2rad($lat2)) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $result['miles'] = $miles * 60 * 1.1515;
        $result['feet'] = $result['miles'] * 5280;
        $result['yards'] = $result['feet'] / 3;
        $result['kilometers'] = $result['miles'] * 1.609344;
        $result['meters'] = $result['kilometers'] * 1000;

        // Calculate per km

        $travel_fee = $result['kilometers'] * $provider->travel_fee;

        $fee = number_format($travel_fee);

        if($request->lat == 0){
            $fee = 0;
        }else{
            $fee = number_format($travel_fee);
        }

        Session::put('travel_fee', $fee);


        return response()->json($fee);
    }
    public function currentLocation(Request $request)
    {
        $provider = '';
        foreach (Cart::content() as $cont) {
            $prov = User::where('id', $cont->options->provider_id)
                ->latest()
                ->first();
            $provider = $prov;
        }

        $lat1 = $request->lat;
        $long1 = $request->lon;

        $geocoder = new \OpenCage\Geocoder\Geocoder('ccca77a9827e42a7a4559d0aa80e88ef');
        $result = $geocoder->geocode("$lat1,$long1"); # latitude,longitude (y,x)
        $mainLoc = $result['results'][0]['formatted'];



        $lat2 = $request->lat; // user's longitude
        $long2 = $request->long; // user's longitude

        $theta = $long1 - $long2;
        $miles = (sin(deg2rad($lat1))) * sin(deg2rad($lat2)) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $result['miles'] = $miles * 60 * 1.1515;
        $result['feet'] = $result['miles'] * 5280;
        $result['yards'] = $result['feet'] / 3;
        $result['kilometers'] = $result['miles'] * 1.609344;
        $result['meters'] = $result['kilometers'] * 1000;

        // Calculate per km

        $travel_fee = $result['kilometers'] * $provider->travel_fee;

        $fee = number_format($travel_fee);


        Session::put('travel_fee', $fee);


        return response()->json($fee);
    }



}
