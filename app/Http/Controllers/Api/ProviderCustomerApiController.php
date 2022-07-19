<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class ProviderCustomerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(UserResource::collection(auth()->user()->providerCustomers));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->userValidation($request);

        $this->saveUser($request);
    }

    private function userValidation($request, $id = null)
    {
        $this->validate($request, [
            'name' => 'required',           
            'email' => 'required|email|unique:users,email'. $request->isMethod('put') ? ',' . $id : '',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ]);
    }


    private function saveUser($request, $id = null)
    {
        $user = $request->isMethod('put') ? User::findOrFail($id) : new User();
        $user->role = 2;
        $user->usertype = 2;  
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);

        $ic_image = $request->file('image');
        if ($ic_image) {           
            $imageName = time() . '_' . uniqid() . '.' . $ic_image->getClientOriginalExtension();
            $ic_image->move(public_path('uploaded/customer'), $imageName);
            $user->image = '/uploaded/customer/' . $imageName;
        }
        $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
