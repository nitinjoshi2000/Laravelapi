<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api;

class ApiController extends Controller
{
    public function index()
    {
        $data = Api::all();
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

    public function insertapi(Request $data)
    {

        $file = $data->file('image');
    	$filename = 'image'. time().'.'.$data->image->extension();
    	$file->move("upload/",$filename);
        $a = new api;
        $a->username = $data->username;
        $a->password = $data->password;
        $a->image = $filename;
        $a->save();

    }

    public function view($id)
    {
        $a = Api::find($id);
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
            $a =  Api::find($data->id);
            $a->username = $data->username;
            $a->password = $data->password;
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
            $a = Api::find($data->id);
            $a->username = $data->username;
            $a->password = $data->password;
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
    	$data = Api::find($id);
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
