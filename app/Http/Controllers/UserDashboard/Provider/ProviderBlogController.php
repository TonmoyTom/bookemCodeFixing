<?php

namespace App\Http\Controllers\UserDashboard\Provider;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use Auth;

class ProviderBlogController extends Controller
{
    public function index()
    {
       $data['blogs'] = Blog::where('user_id',Auth::user()->id)->latest()->get();
       $data['blogcategorys'] = BlogCategory::where('user_id',Auth::user()->id)->latest()->get();
       $data['blogcat'] = BlogCategory::where('user_id',Auth::user()->id)->get();
        
        return view('dashboard.provider.blogs.blogs', $data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:blogs,title',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $blog = new Blog;
        $blog->title                   = $request->title;
        $blog->user_id                 = Auth::user()->id;
        $blog->category_id             = $request->category_id;
        $blog->slug                    = Str::slug($request->title);
        $blog->description             = $request->description;
        $blog->status                  = $request->status;
        $blog->author                  = 2;

        // Image
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/blog'), $imageName);
            $blog->image = '/uploaded/blog/' . $imageName;
        }

        $blog->save();

        $notification = array(
            'message' => 'Blog created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:blogs,title,'.$id,
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $blog = Blog::find($id);
        $blog->title                   = $request->title;
        $blog->category_id             = $request->category_id;
        $blog->slug                    = Str::slug($request->title);
        $blog->description             = $request->description;
        $blog->status                  = $request->status;

        // Image
        $image = $request->file('image');
        if ($image) {
            $image_path = public_path($blog->image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/blog'), $imageName);
            $blog->image = '/uploaded/blog/' . $imageName;
        }

        $blog->save();

        $notification = array(
            'message' => 'Blog updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }




    public function destroy($id)
    {
        $blog = Blog::find($id);
        $image_path = public_path($blog->image);
        @unlink($image_path);
        $blog->delete();

        $notification = array(
            'message' => 'Blog deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function blog_status(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->status = $request->status;
        $blog->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
