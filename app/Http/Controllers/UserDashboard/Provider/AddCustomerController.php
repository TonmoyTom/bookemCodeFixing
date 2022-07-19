<?php

namespace App\Http\Controllers\UserDashboard\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;

class AddCustomerController extends Controller
{
    public function index(){
        $datas = User::where('usertype',2)->get();
        return view('dashboard.provider.add-customer.list-customer',compact('datas'));

    }
    public function create(){
        return view('dashboard.provider.add-customer.create-customer');
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
        $data->usertype = 2;  
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

        $notification = array(
            'message' => 'Customer Created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function show($id)
    {
        $dataIcshow= User::find($id);
       return view('dashboard.provider.add-customer.show-customer',compact('dataIcshow'));
    }

    public function edit($id)
    {
        $dataIcedit= User::find($id);
        return view('dashboard.provider.add-customer.edit-customer',compact('dataIcedit'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
           
            'email' => 'required|'
           
        ]);

        $data =  User::find($id);
       
        $data->name = $request->name;
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

        $notification = array(
            'message' => 'Customer Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('provider.add.customer.index')->with($notification);
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
    
}
