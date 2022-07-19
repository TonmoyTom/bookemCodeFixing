<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['user' => auth()->user()], 200);

    }




    public function store(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i', 
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $user = new User();
            $user->role = 2;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'message' => 'Successfully Register!'
            ], 200);
        }


    }




    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required',
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);


    }



    public function logout(Request $request)
    {

        $token = $request->user()->token();
        $token->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);


    }

    



    public function update(Request $request,$id)
    {


        $user = User::find($id);
        $user->role = 2;
        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->phone_no = $request->phone_no;
        $user->credit_limit = $request->credit_limit;
        $user->address = $request->address;
        $user->save();
        return response($user);

    }


    //Category controller 
  
    //SubCategory controller 
    public function subcategory()
    {
        $subcategory = Subcategory::all();
        return response()->json($subcategory);
    }
}
