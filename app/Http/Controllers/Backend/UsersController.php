<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Cache;

class UsersController extends Controller
{
    public function index(){
        $data['data'] = User::where('role',2)->latest()->get();
        return view('backend.users.index-users',$data);
    }
    
    public function destroy($id){
        User::find($id)->delete();
        $notification = array(
            'message' => 'User deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
    public function userOnlineStatus()
    {
        $users = User::all();
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
            else
                echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        }
    }
    
    
}
