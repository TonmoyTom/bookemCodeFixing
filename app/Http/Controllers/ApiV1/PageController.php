<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use App\PageContent;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return response()->json($pages);
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
            'name' => 'required',
            'status' => 'required' 
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = new Page();
           
            $data->name = $request->name;
            $data->slug = Str::slug( $request->name);
            $data->status = $request->status;
            $data->save();
            return response()->json([
                'message' => 'Page Created Successfully'
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
        $pages = Page::find($id);
        return response()->json($pages);
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
            'name' => 'required',
            'status' => 'required' 
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = Page::find($id);
           
            $data->name = $request->name;
            $data->slug = Str::slug( $request->name);
            $data->status = $request->status;
            $data->save();
            return response()->json([
                'message' => 'Page Update Successfully'
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
        $data = PageContent::find($id);
        $data->delete();
        return response()->json([
            'message' => 'PageContent Deleted Successfully'
        ], 200);
    }
}
