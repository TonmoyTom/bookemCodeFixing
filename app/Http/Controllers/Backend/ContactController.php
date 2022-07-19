<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $data['data'] = Contact::latest()->get();
        return view('backend.contact.index',$data);
    }

    public function destroy($id){
        Contact::find($id)->delete();
        $notification = array(
            'message' => 'Contact deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
