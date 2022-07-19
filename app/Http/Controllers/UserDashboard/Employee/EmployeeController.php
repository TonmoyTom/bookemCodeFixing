<?php

namespace App\Http\Controllers\UserDashboard\Employee;

use App\EmployeeService;
use App\Expreinces;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\BusinessCategory;
use App\Models\Category;
use App\User;
use Carbon\Carbon;
use App\Models\AppointmentItem;
use App\Models\CustomerReview;
use App\Models\CouponPayment;
use App\Models\ProviderReview;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $datas = User::where('providertype',3)->where('ic_provider_id' , auth()->id())->get();
        return view('dashboard.provider.employee.index',compact('datas'));
    }

    public function create(){

        $data = Service::where('provider_id' , auth()->id())->get();
        return view('dashboard.provider.employee.create', compact('data'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $data = new User;
        $data->role = 2;
        $data->providertype = 3;
        $data->ic_provider_id = auth()->id();
        $data->business_name = $request->business_name;
        $data->business_url = Str::slug($request->name.Str::random(15), '-');
        $data->business_about = $request->business_about;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->password = bcrypt($request->password);

        $ic_image = $request->file('image');
        if ($ic_image) {

            $imageName = time() . '_' . uniqid() . '.' . $ic_image->getClientOriginalExtension();
            $ic_image->move(public_path('uploaded/customer'), $imageName);
            $data->image = '/uploaded/customer/' . $imageName;
        }

        $data->save();
        $services = $request->business_category;

        if (!empty($services)) {
            foreach ($services as $service) {
                EmployeeService::create([
                    'user_id' => $data->id,
                    'service_id' => $service,
                ]);
            }
        }

        $expreience = Expreinces::create([
            "user_id" => $data->id,
            'experinces' => $request->experinces,
            'experince_from' => Carbon::parse($request->experince_from)->format('Y-m-d'),
            'experince_to' =>   now()->format('Y-m-d') ,
        ]);

        $notification = array(
            'message' => 'Employe  Created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('add.employee.index')->with($notification);
    }

    public function show($id)
    {
        $dataIcshow= User::with('empolyeeServices.services','exprineces')->find($id);
        $date = Carbon::parse($dataIcshow->exprineces->experince_from);
        $now = Carbon::parse($dataIcshow->exprineces->experince_to);
        $diff = $date->diffInYears($now);
       return view('dashboard.provider.employee.show',compact('dataIcshow', 'diff'));
    }

    public function edit($id)
    {
        $categories = Service::where('provider_id' , auth()->id())->get();;
        $dataIcedit= User::with('exprineces')->find($id);
        $selectCategory = EmployeeService::select('service_id')->where('user_id', $id)->orderBy('id', 'asc')->get()->toArray();
        return view('dashboard.provider.employee.edit',compact('dataIcedit' , 'categories' , 'selectCategory'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|'

        ]);

        $data =  User::find($id);
        $data->name = $request->name;
        $data->business_url = $request->name.Str::random(40). '-';
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        if($request->password != 0){

            $data->password = bcrypt($request->password);
        }

        $ic_image = $request->file('image');
        if ($ic_image) {

            $imageName = time() . '_' . uniqid() . '.' . $ic_image->getClientOriginalExtension();
            $ic_image->move(public_path('uploaded/customer'), $imageName);
            $data->image = '/uploaded/customer/' . $imageName;
        }
        $data->save();

        $business_category = $request->business_category;
        if (!empty($business_category)) {
            $businessCategoryIds =EmployeeService::where('user_id' , $id)->pluck('id');
            $businessCategoryDelete =EmployeeService::whereIn('id' , $businessCategoryIds)->delete();
            foreach ($business_category as $category) {
                EmployeeService::create([
                    'user_id' => $data->id,
                    'service_id' => $category,
                ]);
            }
        }

        $expreience = Expreinces::where('user_id', $id )->first();
        $expreience->update([
            'experinces' => $request->experinces,
            'experince_from' => Carbon::parse($request->experince_from)->format('Y-m-d'),
            'experince_to' =>  now()->format('Y-m-d') ,
        ]);

        $notification = array(
            'message' => 'Customer Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('add.employee.index')->with($notification);
    }


    public function destroy($id)
    {
        $data =  User::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Customer Deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function employeeindex(){
        $data['appointments'] = Appointment::where('provider_id', auth()->user()->ic_provider_id)->whereIn('service_status',[0,1])->latest()->get();

        return view('dashboard.employee-appointment.index', $data);
    }

    public function employeeshow($id)
    {
        $data['data'] = Appointment::find($id);
        $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
        $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('dashboard.employee-appointment.show', $data);
    }

    public function employeeappiontClose($id)
    {
        $data = Appointment::findOrFail($id);

        $data->service_status = 3;
        $data->save();
        $notification = array(
            'message' => 'Appointment canceled Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function employeecancelindex(){
        $data['appointments'] = Appointment::where('user_id', auth()->user()->ic_provider_id)->where('service_status',3)->get();

        return view('dashboard.employee-appointment.close-appointment.index', $data);
    }

    public function employeecancelshow($id)
    {
        $data['data'] = Appointment::find($id);
        $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
        $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('dashboard.employee-appointment.close-appointment.show', $data);
    }

    public function employeeappiontRebok($id)
    {
        $data = Appointment::findOrFail($id);

        $data->service_status = 0;

        $data->save();

        $notification = array(
            'message' => 'Appointment Rebook Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
