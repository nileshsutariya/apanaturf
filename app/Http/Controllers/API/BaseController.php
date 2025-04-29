<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class BaseController extends Controller
{
    public function sendresponse($data, $message = "", $status = 200)
    {
        return response()->json([
            'success' => true,
            'status' => $status,
            'message' => $message,
            'data' => $data 
        ], $status);
    }

    public function senderror($data, $message = "", $status = 400)
    {
        if (isset($errorMessages['id_not_found'])) {
            $status = 404; 
        }
        elseif (isset($errorMessages['server_error'])) {
            $status = 500; 
        }

        return response()->json([
            'success' => false,
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $status);
    }

}
