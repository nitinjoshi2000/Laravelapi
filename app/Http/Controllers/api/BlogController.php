<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::all();
        // return view() not in  api
        if($data != null) {
            return response()->json($data = [
                'status' => 200,
                'msg' => 'success',
                'api' => $data
            ]);
        }
        else
        {
            return response()->json($data = [
                'status' => 400,
                'msg' => 'Data Not Found'
             ]);
        }
    }

    public function insert(Request $data)
    {

        $file = $data->file('image');
    	$filename = 'image'. time().'.'.$data->image->extension();
    	$file->move("upload/",$filename);
        $a = new blog;
        $a->title = $data->title;
        $a->description = $data->description;
        $a->author_name = $data->author_name;
        $a->image = $filename;
        $a->save();

    }

    public function view($id)
    {
        $a = Blog::find($id);
        if($a != null) {
            return response()->json($data = [
                'status' => 200,
                'msg' => 'success',
                'api' => $a
            ]);
        }
        else
        {
            return response()->json($data = [
                'status' => 400,
                'msg' => 'Data Not Found'
             ]);
        }
    }

    public function update(Request $data)
    {
        if ($data->hasFile('image'))
        {
            $file = $data->file('image');
            $filename = 'image'. time().'.'.$data->image->extension();
            $file->move("upload/",$filename);
            $a =  Blog::find($data->id);
            $a->title = $data->title;
            $a->description = $data->description;
            $a->author_name = $data->author_name;
            $a->image = $filename;
            $a->save();
            if($a != null) {
                return response()->json($data = [
                    'status' => 200,
                    'msg' => 'success',
                    'api' => $a
                ]);
            }
            else
            {
                return response()->json($data = [
                    'status' => 400,
                    'msg' => 'Data Not Found'
                 ]);
            }
    	}
    	else
        {
            $a = Blog::find($data->id);
            $a->title = $data->title;
            $a->description = $data->description;
            $a->author_name = $data->author_name;
            $a->save();
            if($a != null) {
                return response()->json($data = [
                    'status' => 200,
                    'msg' => 'success',
                    'api' => $a
                ]);
            }
            else
            {
                return response()->json($data = [
                    'status' => 400,
                    'msg' => 'Data Not Found'
                 ]);
            }
        }
    }

    public function delete($id)
    {
    	$data = Blog::find($id);
    	$deleted = $data->delete();
    	if($deleted != null) {
            return response()->json($data = [
                'status' => 200,
                'msg' => 'success',
                'api' => $data
            ]);
        }else {
            return response()->json($data = [
                'status' => 400,
                'msg' => 'Data Not Found'
             ]);
        }
    }
}
