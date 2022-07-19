<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $document = Document::all();
      return response()->json($document);
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
            'title'          => 'required',
            'document_type'  => 'required',
            'document_for'   => 'required',
            'status'        => 'required'
            
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = new Document();
           
            $data->title = $request->title;
            $data->document_type = $request->document_type;
            $data->document_for = $request->document_for;
            $data->status = $request->status;
           
            $data->save();
            return response()->json([
                'message' => 'Document Inserted Successfully'
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
        $document = Document::find($id);
        return response()->json($document);
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
            'title'          => 'required',
            'document_type'  => 'required',
            'document_for'   => 'required',
            'status'        => 'required'
            
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = Document::find($id);
           
            $data->title = $request->title;
            $data->document_type = $request->document_type;
            $data->document_for = $request->document_for;
            $data->status = $request->status;
           
            $data->save();
            return response()->json([
                'message' => 'Document Updated Successfully'
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
        $document = Document::find($id);
        $document->delete();
 
        return response()->json([
         'message' => 'Document Deleted Successfully'
     ], 200);
    }
}
