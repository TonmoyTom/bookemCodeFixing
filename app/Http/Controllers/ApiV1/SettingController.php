<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $setting = Setting::all();
       return response()->json($setting);
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'mimes:jpg,jpeg,png',
            'emai' => 'email',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        
        else{
            $setting = Setting::find($id);

        $setting->site_slogan               =  $request->site_slogan;
        $setting->facebook_link             =  $request->facebook_link;
        $setting->twitter_link              =  $request->twitter_link;
        $setting->instagram_link            =  $request->instagram_link;
        $setting->linkedin_link             =  $request->linkedin_link;
        $setting->youtube_link              =  $request->youtube_link;
  
        $setting->phone                     =  $request->phone;
        $setting->email                     =  $request->email;
        $setting->fax                       =  $request->fax;
        
        $setting->address                   =  $request->address;
         $setting->terms_condition           =  $request->terms_condition;
        $setting->privacy_policy            =  $request->privacy_policy;
        $setting->copyright                 =  $request->copyright;

        //Logo
        $image = $request->file('logo');
        if ($image) {
            $image_path = public_path($setting->logo);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/logo'), $imageName);
            $setting->logo = '/uploaded/logo/' . $imageName;
        }

        $setting->save();

        return response()->json([
            'message' => 'Setting Updated Successfully '
        ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
