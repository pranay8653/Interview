<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function create()
     {
        $data = Admin::select('id', 'name')->get();
        return view('create_blog', compact('data'));
     }

    public function store(Request $request)
     {
        $data = $request->validate([
            'title' => ['required'],
            'file'  => ['required', 'mimes:png,jpg,jpeg'],
            'text'  => ['required'],
            'admin_id' => ['required']
        ]);

        $file_path = 'assets/upload/blog';
        File::isDirectory($file_path) or File::makeDirectory($file_path, 0777, true,true);
        $file_name = Carbon::now()->timestamp;
        $file_extension = $request['file']->getClientOriginalExtension();
        $data['file']->move($file_path,$file_name.'.'.$file_extension);

        $data = Blog::create([

            'title' => $request['title'],
            'text' => $request['text'],
            'admin_id'=> $request['admin_id'],
            'file' => $file_name.'.'.$file_extension,
        ]);

        return redirect()->route('show.blogs');
     }

     public function show()
      {
        $blog = Blog::with('admin')->paginate(2);
        return view('Admin.show_blog', compact('blog'));

      }
     public function show2()
      {
        $blog = Blog::with('admin')->paginate(2);
        return view('Admin.show_blog2', compact('blog'));

      }

      public function edit($id)
       {
        $blog = Blog::with('admin')->find($id);
        $data = Admin::select('id','name')->get();
        return view('Admin.edit_blog', compact('blog', 'data'));
       }

      public function destroy($id)
       {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('show.blogs');
       }


     public function update(Request $request, $id)
      {
        $blog = Blog::find($id);

        // $data = $request->validate([
        //     // 'title' => ['required'],
        //     'file'  => ['required', 'mimes:png,jpg,jpeg'],
        //     // 'text'  => ['required'],
        //     // 'admin_id' => ['required']
        // ]);

        // $file_path = 'assets/upload/blog';
        // File::isDirectory($file_path) or File::makeDirectory($file_path, 0777, true,true);
        // $file_name = Carbon::now()->timestamp;
        // $file_extension = $request['file']->getClientOriginalExtension();
        // $blog['file']->move($file_path,$file_name.'.'.$file_extension);
        $blog->update([
            'title' => $request['title'],
            'text' => $request['text'],
            'admin_id'=> $request['admin_id'],
            // 'file' => $file_name.'.'.$file_extension,
        ]);


        return redirect()->route('show.blogs');
      }
}
