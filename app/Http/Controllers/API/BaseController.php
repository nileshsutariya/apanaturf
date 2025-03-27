<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class BaseController extends Controller
{
    public function sendresponse($result, $message)
    {
        $data = Http::get('http://localhost/apanaturf');
        // dd($data->body());
        $status = $data->status();
        if ($data->successful()) {
            return response()->json([
                'success' => true,
                'status' => $status,   
                'message' => $message,
                'data' => $result  
            ], $status);
        }
        return response()->json([
            'success' => false,
            'status' => $status,
            'message' => 'API request failed'
        ], $status);
    }

    public function senderror($error, $errorMessages = [],  $status = 422)
    {
        if (isset($errorMessages['id_not_found'])) {
            $status = 404; 
        };

        return response()->json([
            'success' => false,
            'status' => $status,
            'message' => $errorMessages,
            'data' => $error
        ], $status);
    }

}
