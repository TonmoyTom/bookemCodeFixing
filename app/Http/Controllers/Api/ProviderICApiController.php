<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderICApiController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(UserResource::collection(auth()->user()->IC));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'address' => 'required|max:150',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'image' => 'mimes:jpg,jpeg,png,webp,gif,svg'
        ]);

        $data = new User();
        $data->role = 2;
        $data->usertype = 1;
        $data->providertype = 2;
        $data->ic_provider_id = Auth::user()->id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->password = bcrypt($request->password);
        $ic_image = $request->file('image');
        if ($ic_image) {
            $imageName = time() . '_' . uniqid() . '.' . $ic_image->getClientOriginalExtension();
            $ic_image->move(public_path('uploaded/provider/ic'), $imageName);
            $data->image = '/uploaded/provider/ic/' . $imageName;
        }
        $data->save();
        return $this->sendSuccess('Independent Contractor Created Successfull!');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->sendResponse(new UserResource(auth()->user()->IC->where('id', $id)->first()));
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
            'name' => 'required|max:50',
            'address' => 'required|max:150',
            'email' => 'required|email|unique:users,email,' . $id,
            'image' => 'mimes:jpg,jpeg,png,webp,gif,svg'
        ]);

        $user =  User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        if ($request->password != 0) {
            $user->password = bcrypt($request->password);
        }

        $ic_image = $request->file('image');
        if ($ic_image) {
            if (file_exists(public_path($user->image))) {
                unlink(public_path($user->image));                
            }
            $imageName = time() . '_' . uniqid() . '.' . $ic_image->getClientOriginalExtension();
            $ic_image->move(public_path('uploaded/provider/ic'), $imageName);
            $user->image = '/uploaded/provider/ic/' . $imageName;
        }
        $user->save();
        return $this->sendSuccess('Independent Contractor Created Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  User::findOrFail($id);
        if ($user->image && file_exists(public_path($user->image))) {
            unlink(public_path($user->image));                
        }
        $user->delete();
        return $this->sendSuccess('Independent Contractor Deleted Successfull!');
    }
}
