<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class BaseController extends Controller
{
    public function sendresponse($result, $message)
    {
        $data = Http::get('http://192.168.1.169/apanaturf/');
        $status = $data->status();
        if ($data->successful()) {
            return response()->json([
                'success' => true,
                'status' => $status,
                'message' => $message,
                'data' => $result 
            ], $status);
        }
        if ($data->failed()) {
            return response()->json([
                'success' => false,
                'status' => $status,
                'message' => 'API request failed'
            ], $status);
        }
    }


    public function senderror($error, $errorMessages = [],  $status = 422)
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
            'message' => $errorMessages,
            'data' => $error
        ], $status);
    }

}
