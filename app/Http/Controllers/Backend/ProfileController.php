<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.admin.profile');
    }
    public function edit()
    {
        return view('backend.admin.edit-profile');
    }

    public function update(Request $request)
    {
        $data = User::where('id',Auth::user()->id)->first();
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'image' => 'mimes:jpeg,jpg,png',
            'name' => 'required',
        ]);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/admin'), $imageName);
            $data->image = '/uploaded/admin/' . $imageName;
        }
        $data->save();
        $notification = array(
            'message' => 'Successfully profile updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile.index')->with($notification);
    }

    public function editPassword()
    {
        return view('backend.admin.edit-password');
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        
        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            $notification = array(
                'message' => 'Successfully password changed.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.profile.index')->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry! Your current password dost not match.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
