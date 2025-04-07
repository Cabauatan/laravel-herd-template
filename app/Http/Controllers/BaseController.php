<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = [
            // 'gatewayApi' => 'Ticketing',
            'author' => 'MIS PROGRAMMER',
            'version' => 'v1.0',
            'response' => true,
            'data' => $result,
            'message' => $message
        ];
        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessage, $code = 404)
    {
        $response = [
            'response' => false,
            'message' => $error
        ];
        if (!empty($errorMessage)) {
            $response['data'] = $errorMessage;
        }
        return response()->json($response, $code);
    }
}