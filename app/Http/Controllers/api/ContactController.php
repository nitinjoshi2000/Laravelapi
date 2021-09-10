<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::all();
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
        $a = new Contact;
        $a->name = $data->name;
        $a->email = $data->email;
        $a->phone = $data->phone;
        $a->message = $data->message;
        $a->save();

    }

    public function view($id)
    {
        $a = Contact::find($id);
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
            $a =  Contact::find($data->id);
            $a->name = $data->name;
            $a->email = $data->email;
            $a->phone = $data->phone;
            $a->mesage = $data->message;
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
            $a = Contact::find($data->id);
            $a->name = $data->name;
            $a->email = $data->email;
            $a->phone = $data->phone;
            $a->mesage = $data->message;
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
    	$data = Contact::find($id);
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
