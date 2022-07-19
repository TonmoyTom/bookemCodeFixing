<?php

namespace App\Http\Controllers\UserDashboard\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscribtionController extends Controller
{
    public function index(){
        $data['subscriptions'] = Subscription::where('user_id',Auth::user()->id)->get();
        return view('dashboard.provider.subscribtion.index',$data);
    }
}
