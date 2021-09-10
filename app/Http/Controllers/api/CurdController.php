<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curd;

class CurdController extends Controller
{
    public function index()
    {
        $data = Curd::all();
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
        $a = new Curd;
        $a->name = $data->name;
        $a->email = $data->email;
        $a->address = $data->address;
        $a->number = $data->number;
        $a->gender = $data->gender;
        $a->course = $data->course;
        $a->college = $data->college;
        $a->qualification = $data->qualification;
        $a->branch = $data->branch;
        $a->semester = $data->semester;
        $a->save();

    }

    public function view($id)
    {
        $a = Curd::find($id);
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
        if ($data)
        {
            $a =  Curd::find($data->id);
            $a->name = $data->name;
            $a->email = $data->email;
            $a->address = $data->address;
            $a->number = $data->number;
            $a->gender = $data->gender;
            $a->course = $data->course;
            $a->college = $data->college;
            $a->qualification = $data->qualification;
            $a->branch = $data->branch;
            $a->semester = $data->semester;
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
            $a = Curd::find($data->id);
            $a->name = $data->name;
            $a->email = $data->email;
            $a->address = $data->address;
            $a->number = $data->number;
            $a->gender = $data->gender;
            $a->course = $data->course;
            $a->college = $data->college;
            $a->qualification = $data->qualification;
            $a->branch = $data->branch;
            $a->semester = $data->semester;
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
    	$data = Curd::find($id);
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
