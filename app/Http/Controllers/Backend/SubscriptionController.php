<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;

class SubscriptionController extends Controller
{
    public function index(){
        dd('asdf');
        $data['subscriptions'] = Subscription::latest()->get();
        return view('backend.subscription.index',$data);
    }
}
