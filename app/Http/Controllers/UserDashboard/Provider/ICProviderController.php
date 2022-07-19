<?php

namespace App\Http\Controllers\UserDashboard\Provider;

use App\Http\Controllers\Controller;
use App\Models\BusinessHour;
use App\BusinessHourUpdate;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Validator;

class ICProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $dataIcs = User::where('usertype',1)->where('providertype',2)->where('ic_provider_id',Auth::user()->id)->get();

       return view('dashboard.provider.provider-ic.list-ic',compact('dataIcs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $dataIcs = User::when(request()->has('search'), function ($query) {
            $query->where('email', 'LIKE', request()->get('search'));
        })->where('usertype',1)->where('providertype' , 2 )->where('ic_provider_id' , null)->get();
        return view('dashboard.provider.provider-ic.create-ic' , compact('dataIcs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        $data =  User::find($id);
        $data->update([
            'ic_provider_id' => auth()->id(),
            'ic_status' =>1
        ]);
        $userBusinessHoure = BusinessHourUpdate::where('provider_id',$data->ic_provider_id)->first();
        $businessHoure =  BusinessHourUpdate::find($request->id);
        $notification = array(
            'message' => 'IC Provider Update & Create successfully!',
            'alert-type' => 'success'
        );
        if($request->id){
            if($request->no_change){
                $businessHoure =  BusinessHourUpdate::find($request->id);
                $businessHoure->update([
                    'sat_s'	=>  $userBusinessHoure->sat_s ,
                    'sat_e'	=>  $userBusinessHoure->sat_e,
                    'san_s'	=>  $userBusinessHoure->san_s,
                    'san_e'	=>   $userBusinessHoure->san_e,
                    'mon_s'	=>   $userBusinessHoure->mon_s,
                    'mon_e'	=>   $userBusinessHoure->mon_e,
                    'tus_s'	=>   $userBusinessHoure->tus_s,
                    'tus_e'	=>   $userBusinessHoure->tus_e,
                    'wen_s'	=>   $userBusinessHoure->wen_s,
                    'wen_e'	=>   $userBusinessHoure->wen_e,
                    'thus_s'=>   $userBusinessHoure->thus_s,
                    'thus_e'=>   $userBusinessHoure->thus_e,
                    'fri_s'	=>   $userBusinessHoure->fri_s,
                    'fri_e'	=>   $userBusinessHoure->fri_e,
                ]);
                return redirect()->back()->with($notification);
            }

           $businessHoure->update([
                'sat_s'	=> ($request->sat_close) ? null : Carbon::parse($request->sat_s)->format('H:i:s') ,
                'sat_e'	=> ($request->sat_close) ? null : Carbon::parse($request->sat_e)->format('H:i:s'),
                'san_s'	=> ($request->sun_close) ? null : Carbon::parse($request->san_s)->format('H:i:s'),
                'san_e'	=> ($request->sun_close) ? null :  Carbon::parse($request->san_e)->format('H:i:s'),
                'mon_s'	=> ($request->mon_close) ? null :  Carbon::parse($request->mon_s)->format('H:i:s'),
                'mon_e'	=> ($request->mon_close) ? null :  Carbon::parse($request->mon_e)->format('H:i:s'),
                'tus_s'	=> ($request->tus_close) ? null :  Carbon::parse($request->tus_s)->format('H:i:s'),
                'tus_e'	=> ($request->tus_close) ? null :  Carbon::parse($request->tus_e)->format('H:i:s'),
                'wen_s'	=> ($request->wnd_close) ? null :  Carbon::parse($request->wen_s)->format('H:i:s'),
                'wen_e'	=> ($request->wnd_close) ? null :  Carbon::parse($request->wen_e)->format('H:i:s'),
                'thus_s'=> ($request->thus_close) ? null :  Carbon::parse($request->thus_s)->format('H:i:s'),
                'thus_e'=> ($request->thus_close) ? null :  Carbon::parse($request->thus_e)->format('H:i:s'),
                'fri_s'	=> ($request->fri_close) ? null :  Carbon::parse($request->fri_s)->format('H:i:s'),
                'fri_e'	=> ($request->fri_close) ? null :  Carbon::parse($request->fri_e)->format('H:i:s'),
           ]);
        }else{
            if($request->no_change){
                 BusinessHourUpdate::create([
                    'sat_s'	=> $userBusinessHoure->sat_s,
                    'sat_e'	=> $userBusinessHoure->sat_e,
                    'san_s'	=> $userBusinessHoure->san_s,
                    'san_e'	=> $userBusinessHoure->san_e,
                    'mon_s'	=> $userBusinessHoure->mon_s,
                    'mon_e'	=> $userBusinessHoure->mon_e,
                    'tus_s'	=> $userBusinessHoure->tus_s,
                    'tus_e'	=> $userBusinessHoure->tus_e,
                    'wen_s'	=> $userBusinessHoure->wen_s,
                    'wen_e'	=> $userBusinessHoure->wen_e,
                    'thus_s'=> $userBusinessHoure->thus_s,
                    'thus_e'=> $userBusinessHoure->thus_e,
                    'fri_s'	=> $userBusinessHoure->fri_s,
                    'fri_e'	=> $userBusinessHoure->fri_e,
                    'provider_id' =>$id,
                    'saloon_id' =>Auth::user()->id,
                 ]);
            }else{
                BusinessHourUpdate::create([
                    'sat_s'	=> ($request->sat_close) ? null : Carbon::parse($request->sat_s)->format('H:i:s') ,
                    'sat_e'	=> ($request->sat_close) ? null : Carbon::parse($request->sat_e)->format('H:i:s'),
                    'san_s'	=> ($request->sun_close) ? null : Carbon::parse($request->san_s)->format('H:i:s'),
                    'san_e'	=> ($request->sun_close) ? null :  Carbon::parse($request->san_e)->format('H:i:s'),
                    'mon_s'	=> ($request->mon_close) ? null :  Carbon::parse($request->mon_s)->format('H:i:s'),
                    'mon_e'	=> ($request->mon_close) ? null :  Carbon::parse($request->mon_e)->format('H:i:s'),
                    'tus_s'	=> ($request->tus_close) ? null :  Carbon::parse($request->tus_s)->format('H:i:s'),
                    'tus_e'	=> ($request->tus_close) ? null :  Carbon::parse($request->tus_e)->format('H:i:s'),
                    'wen_s'	=> ($request->wnd_close) ? null :  Carbon::parse($request->wen_s)->format('H:i:s'),
                    'wen_e'	=> ($request->wnd_close) ? null :  Carbon::parse($request->wen_e)->format('H:i:s'),
                    'thus_s'=> ($request->thus_close) ? null :  Carbon::parse($request->thus_s)->format('H:i:s'),
                    'thus_e'=> ($request->thus_close) ? null :  Carbon::parse($request->thus_e)->format('H:i:s'),
                    'fri_s'	=> ($request->fri_close) ? null :  Carbon::parse($request->fri_s)->format('H:i:s'),
                    'fri_e'	=> ($request->fri_close) ? null :  Carbon::parse($request->fri_e)->format('H:i:s'),
                    'provider_id' =>$id,
                    'saloon_id' =>Auth::user()->id,
                ]);
            }

        }


        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataIcshow= User::with('businessCategories.category')->find($id);
        $vendorService = User::with('businessCategories.category')->find($dataIcshow->ic_provider_id);
        $businessHourUpdate = BusinessHourUpdate::where('provider_id', $id)->where('saloon_id' , auth()->id())->first();
       return view('dashboard.provider.provider-ic.show-ic',compact('dataIcshow' , 'vendorService' , 'businessHourUpdate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataIcedit= User::find($id);
        return view('dashboard.provider.provider-ic.edit-ic',compact('dataIcedit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',

            'email' => 'required|'

        ]);

        $data =  User::find($id);

        $data->name = $request->name;
        $data->business_name = $request->business_name;
        $data->business_url = Str::slug($request->business_name);
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        if($request->password != 0){

            $data->password = bcrypt($request->password);
        }

        $ic_image = $request->file('image');
        if ($ic_image) {

            $imageName = time() . '_' . uniqid() . '.' . $ic_image->getClientOriginalExtension();
            $ic_image->move(public_path('uploaded/provider/ic'), $imageName);
            $data->image = '/uploaded/provider/ic/' . $imageName;
        }
        $data->save();

        $notification = array(
            'message' => 'IC Provider Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('ic.provider.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data =  User::where( 'id',$id)->first();
        $businessHour = BusinessHourUpdate::where(['provider_id' =>  $id, 'saloon_id' => $data->ic_provider_id])->first();
        $data->update([
            'ic_provider_id' => null,
            'ic_status' => 0
        ]);
        $businessHour->delete();
        $notification = array(
            'message' => 'IC Provider Access  Cencel!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
