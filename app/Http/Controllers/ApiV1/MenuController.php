<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return response()->json($menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'icon' => 'required',
            'menu_type' => 'required' ,
            'menu_slug' => 'required', 
            'menu_bg_color' => 'required', 
            'menu_order' => 'required'
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = new Menu();
           
            $data->icon = $request->icon;
            $data->menu_type = $request->menu_type;
            $data->menu_slug = $request->menu_slug;
            $data->menu_bg_color = $request->menu_bg_color;
            $data->menu_order = $request->menu_order;
            $data->save();
            return response()->json([
                'message' => 'Menu Created Successfully'
            ], 200);
        }
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
        $menus = Menu::find($id);
        return response()->json($menus);
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
        $validator = Validator::make($request->all(), [
            'icon' => 'required',
            'menu_type' => 'required' ,
            'menu_slug' => 'required', 
            'menu_bg_color' => 'required', 
            'menu_order' => 'required'
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = Menu::find($id);
           
            $data->icon = $request->icon;
            $data->menu_type = $request->menu_type;
            $data->menu_slug = $request->menu_slug;
            $data->menu_bg_color = $request->menu_bg_color;
            $data->menu_order = $request->menu_order;
            $data->save();
            return response()->json([
                'message' => 'Menu Updated Successfully'
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
        $menus = Menu::find($id);
        $menus->delete();
      return response()->json([
          'message' => 'Menu Deleted Successfully'
      ], 200);
    }
}
