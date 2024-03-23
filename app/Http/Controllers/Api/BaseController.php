<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($data, $message = null, $code = null)
    {
        return response()->json(
            [
                'success' => true,
                'message' => !is_null($message)? $message : 'Success' ,
                'data' => $data
            ],
            !is_null($code) ?  (int)$code : 200
        );
    }
    public function sendError($data, $message, $code = null)
    {
        return response()->json(
            [
                'success' => false,
                'message' => $message,
                'data' => $data
            ],
            !is_null($code) ?  (int)$code : 400
        );
    }
}
