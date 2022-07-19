<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\User;
use App\Models\BusinessCategory;

class RegisterController extends Controller
{

    public function registerStore(Request $request)
    {   

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile'=>'required',
            'address'=>'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $data = new User;
        $data->role = 2;
        $data->usertype = 2;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
         $data->password = bcrypt($request->password);
        
        $data->save();

        Auth::login($data);
        return redirect('user/dashboard');
    }
    public function vandorregisterStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'business_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $data = new User;
        $data->role = 2;
        $data->usertype = 1;
        $data->providertype = 1;
        // $data->ic_provider_id =Auth::user()->id;
        $data->name = $request->name;
        $data->business_name = $request->business_name;
        $data->business_url = Str::slug($request->business_name);
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->password = bcrypt($request->password);
        $data->save();

        //Business Category
        $business_category = $request->business_category;
        if (!empty($business_category)) {
            foreach ($business_category as $category) {
                $mycolor = new BusinessCategory();
                $mycolor->provider_id = $data->id;
                $mycolor->category_id = $category;
                $mycolor->save();
            }
        }

        Auth::login($data);
        return redirect('user/dashboard');
    }



}
