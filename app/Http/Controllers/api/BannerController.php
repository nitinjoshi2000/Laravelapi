<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $data = Banner::all();
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
        $a = new Banner;
        $a->image = $filename;
        $a->save();

    }

    public function view($id)
    {
        $a = Banner::find($id);
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
            $a =  Banner::find($data->id);
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
            $a = Banner::find($data->id);
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
    	$data = Banner::find($id);
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
