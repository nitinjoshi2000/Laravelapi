<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index()
    {
        $data = category::all();
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
        $a = new category();
        $a->title = $data->title;
        $a->save();

    }

    public function view($id)
    {
        $a = category::find($id);
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
            $a =  category::find($data->id);
            $a->title = $data->title;
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
            $a = category::find($data->id);
            $a->title = $data->title;
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
    	$data = category::find($id);
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
